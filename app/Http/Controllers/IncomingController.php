<?php

namespace App\Http\Controllers;

use App\Incoming;
use Illuminate\Http\Request;

class IncomingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incomings = Incoming::all();
        return view('incoming.index', compact('incomings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('incoming.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasfile('incomingFile'))
        {
            foreach($request->file('incomingFile') as $file)
            {
                $incoming = new Incoming();
                // $incoming->fileName = 'File';
                // $incoming->save();

                $incomingAll = Incoming::latest()->first();
                
                if($incomingAll)
                $lastId = ($incomingAll->id) + 1;
                else
                $lastId = 1;

                $name=$lastId.$file->getClientOriginalName();

                $uploadPath = 'Incoming/';
                $file->move($uploadPath, $name);
  
                $imageURL = $name;

                // $updateFile = Incoming::find($lastId);
                $incoming->fileName = $imageURL;

                $incoming->save(); 
            }
        }
        else
        {
            return redirect()->route('incoming.create');
        }

        return redirect()->route('incoming.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Incoming  $incoming
     * @return \Illuminate\Http\Response
     */
    public function show(Incoming $incoming)
    {
        return view('incoming.show', compact('incoming'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Incoming  $incoming
     * @return \Illuminate\Http\Response
     */
    public function edit(Incoming $incoming)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Incoming  $incoming
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Incoming $incoming)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Incoming  $incoming
     * @return \Illuminate\Http\Response
     */
    public function destroy(Incoming $incoming)
    {
        $incoming->delete();

        return redirect()->route('incoming.index');
    }

    public function draganddrop(Request $request) {

        if($request->hasfile('incomingDDFile'))
        {
            $incoming = new Incoming();

            $file = $request->file('incomingDDFile');

            $incomingAll = Incoming::latest()->first();
                
            if($incomingAll)
                $lastId = ($incomingAll->id) + 1;
            else
                $lastId = 1;

            $name=$lastId.$file->getClientOriginalName();

            $uploadPath = 'Incoming/';
            $file->move($uploadPath, $name);
  
            $imageURL = $name;

                // $updateFile = Incoming::find($lastId);
            $incoming->fileName = $imageURL;

            $incoming->save(); 
        }

        else
        {
            return redirect()->route('incoming.create');
        }

        return redirect()->route('incoming.index');
    }
}
