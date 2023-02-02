<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Fortify;
use App\Actions\Jetstream\DeleteUser;
use Illuminate\Support\ServiceProvider;
use Laravel\Jetstream\Jetstream;

class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->configurePermissions();
        $this->configureLogin();

        Jetstream::deleteUsersUsing(DeleteUser::class);
    }

    /**
     * 
     *
     * @return void
     */
    protected function configureLogin()
    {
        Fortify::authenticateUsing(function (Request $request) {
            $validator = $request->validate([
                'email' => 'required',
                'password' => 'required'
            ]);

            $credentials = [
                'user' => $request->input('email'),
                'password' => $request->input('password'),
            ];
    
            $auth = new \CCUFFS\Auth\AuthIdUFFS();
            $user_data = $auth->login($credentials);

            if(!$user_data) {
                return null;
            }

            $password = Hash::make($user_data->pessoa_id);

            $user = User::where(['uid' => $user_data->uid])->first();
            $data = [
                'uid' => $user_data->uid,
                'email' => $user_data->email,
                'name' => $user_data->name,
                'password' => $password
            ];

            if($user) {
                $user->update($data);
            } else {
                $user = User::create($data);
            }

            return $user;
        });
    }

    /**
     * Configure the permissions that are available within the application.
     *
     * @return void
     */
    protected function configurePermissions()
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::permissions([
            'create',
            'read',
            'update',
            'delete',
        ]);
    }
}
