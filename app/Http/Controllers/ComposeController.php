<?php

namespace App\Http\Controllers;

use App\Models\Compose;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class ComposeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('lecturer.compose');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        foreach ($request->courses as $course) {

            $request->merge(['course_id'=>$course,
            'user_id' => auth()->user()->id]);
            $composed = Compose::create($request->all());
            
            foreach ($request->file() as $file) {
                Storage::makeDirectory(auth()->id());
                $name = $file->getClientOriginalName();
                $path = Storage::putFileAs('public/'.auth()->id(), new File($file->path()),$name);
                $data = array('path' =>Storage::url($path) ,
                'name'=> $name,'user_id' => auth()->id());
                $composed->attachment()->create($data);
                
            }
        }
        
        return back()->with('message','Composer Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Compose  $compose
     * @return \Illuminate\Http\Response
     */
    public function show(Compose $compose)
    {
      
       return view('post',[ 'post' => $compose->find(request()->id) ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Compose  $compose
     * @return \Illuminate\Http\Response
     */
    public function edit(Compose $compose)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Compose  $compose
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Compose $compose)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Compose  $compose
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compose $compose)
    {
        $compose->whereId(request()->id)->delete();
        return back()->with('message','compose deleted');
    }
}
