<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreComicRequest;
use App\Models\Comic;
use Illuminate\Http\Request;
use Mockery\Generator\StringManipulation\Pass\Pass;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreComicRequest $request)
    {   
        $form_input = $request->validated();

        $comic = Comic::create($form_input);


        return redirect()->route('comics.show', ['comic'=>$comic->id] )->with('message', 'Comic created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comic = Comic::findOrFail($id);

        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comic= Comic::findOrFail($id);
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $errorMessages = [
            'title.required' => 'Title field is required!',
            'description.required' => 'please provide a descrpiption',
            'thumb.url' => 'The thumb must be an url',
            'price.numeric' => 'Please insert a numeric value',
            'series.required' => 'Required field',
            'sale_date.date' => 'Insert a valid date',
            'type.required' => 'This field is required',
        ];

        $validated_form_update = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'thumb' => 'required|url',
            'price' => 'required|numeric',
            'series' => 'required|max:255',
            'sale_date' => 'required|date',
            'type' => 'required'
        ], $errorMessages);

        $comic = Comic::findOrFail($id);
        $comic->update($validated_form_update);

        return redirect()->route('comics.show', ['comic' => $comic->id])->with('message', 'Updated');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comic = Comic::findorFail($id);
        $comic->delete();

        return redirect()->route('comics.index')->with('message', 'Record deleted successfully');
       
    }
}
