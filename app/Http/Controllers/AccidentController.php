<?php

namespace App\Http\Controllers;

use App\Accident;
use Illuminate\Http\Request;

class AccidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = [
            "result" => "Success",
            "data" => Accident::all(),
            "errorMessage" => null
        ];
        return response()->json($response);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Accident  $acident
     * @return \Illuminate\Http\Response
     */
    public function show(Accident $acident)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Accident  $acident
     * @return \Illuminate\Http\Response
     */
    public function edit(Accident $acident)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Accident  $acident
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Accident $acident)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Accident  $acident
     * @return \Illuminate\Http\Response
     */
    public function destroy(Accident $acident)
    {
        //
    }
}