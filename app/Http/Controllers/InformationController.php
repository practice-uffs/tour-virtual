<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InformationController extends Controller
{
    protected static $rules = [
        'component' => 'required',
        'group' => 'required',
        'campus' => 'required',
        'identifier_360' => 'required',
        'title' => 'required',
        'description' => 'required',
        'cover_image' => 'required',

    ];
    protected static $feedback = [
        'required' => "Campo :attribute é necessario"
    ];
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function index(Request $request)
    {

        $data = Information::with('informationDetail')->get();
        return view('information.index', ['data' => $data, 'request', $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function create()
    {
        return view('information.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|Response
     */
    public function store(Request $request)
    {
        $request->validate(InformationController::$rules, InformationController::$feedback);
        Information::create($request->all());
        return redirect()->route('information.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Information  $information
     * @return Response
     */
    public function show(Information $information)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function edit(Information $information)
    {
        return view('information.edit', ['information' => $information]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\RedirectResponse|Response
     */
    public function update(Request $request, Information $information)
    {
        $request->validate(InformationController::$rules, InformationController::$feedback);
        $information->update($request->all());
        return redirect()->route('information.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\RedirectResponse|Response
     */
    public function destroy(Information $information)
    {   Detail::where('id_information', $information->getAttribute('id'))->delete();
        $information->delete();
        return redirect()->route('information.index');
    }
}

