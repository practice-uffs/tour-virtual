<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Parsedown;
use League\HTMLToMarkdown\HtmlConverter;
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
        $filter = $request->input('filter');
        if ($filter){
            $data = Information::with('informationDetail')->where('campus', $request->input('filter'))->orderBy('campus')->orderBy('title')->get();
        }
        else{
            $data = Information::with('informationDetail')->orderBy('campus')->orderBy('title')->get();
        }


        return view('information.index', ['data' => $data, 'request', $request->all(), 'filter' => $filter],);
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

        $md2html = new Parsedown();
        $input = $request->all();
        $input['description'] = $md2html->text( $input['description']);
        $request->validate(InformationController::$rules, InformationController::$feedback);
        $item = Information::create($input);
        $item_id = $item->id;
        if(isset($item_id) && isset($request->all()['boxid']))
            foreach ($request->all()['boxid'] as $detail){
                $detail = $md2html->text($detail);
                Detail::insert(['id_information' => $item_id, 'item' => $detail ]);
            }

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

        $htmlConverter = new HtmlConverter(); // Html to Markdown
        $information['description'] = $htmlConverter->convert($information['description']);

        $data =  Detail::where('id_information', $information->getAttribute('id'));
        $data = $data->get();
        foreach ($data as $k => $v){
            $data[$k]['item'] = $htmlConverter->convert($v['item']);
        }

        return view('information.edit', ['information' => $information, 'details' => $data]);
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

        $md2html = new Parsedown();

        $request->validate(InformationController::$rules, InformationController::$feedback);
        $input = $request->all();
        $input['description'] = $md2html->text($input['description']);

        $information->update($input);

        if(isset($request->all()['item'])){
            foreach ($request->all()['item'] as $key => $value){
                $value = $md2html->text($value);
                Detail::find($key)->update(['item' => $value]);
            }
        }
        if(isset($request->all()['remove'])){
            foreach ($request->all()['remove'] as $key => $value){
                Detail::find($key)->delete();
            }
        }

        if(isset($request->all()['addbox'])){
            foreach ($request->all()['addbox'] as $key => $value){
                if($value != "")
                    $value = $md2html->text($value);
                    Detail::insert(['item' => $value, 'id_information' => $information->id]);
            }
        }



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

