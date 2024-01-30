<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CovidFlag;

class CovidFlagController extends Controller
{
    /**
     * Display a listing of the Covid flags.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $covidFlags = CovidFlag::all();
        return response()->json($covidFlags);
    }

    /**
     * Store a newly created Covid flag in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'positive' => 'required|boolean',
            'user_id' => 'required|exists:users,id'
        ]);

        // Create a new CovidFlag instance
        $covidFlag = CovidFlag::create([
            'positive' => $request->positive,
            'user_id' => $request->user_id,
        ]);

        // Return a JSON response with the newly created CovidFlag and a status code of 201 (Created)
        return response()->json($covidFlag, 201);
    }

    /**
     * Display the specified Covid flag.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Find the CovidFlag by its ID
        $covidFlag = CovidFlag::findOrFail($id);

        // Return a JSON response with the CovidFlag data
        return response()->json($covidFlag);
    }

    /**
     * Update the specified Covid flag in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Find the CovidFlag by its ID
        $covidFlag = CovidFlag::findOrFail($id);

        // Validate the incoming request data
        $request->validate([
            'positive' => 'required|boolean',
        ]);

        // Update the CovidFlag instance with the new data
        $covidFlag->update([
            'positive' => $request->positive,
        ]);

        // Return a JSON response with the updated CovidFlag
        return response()->json($covidFlag);
    }

    /**
     * Remove the specified Covid flag from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the CovidFlag by its ID and delete it
        CovidFlag::findOrFail($id)->delete();

        // Return a JSON response with a success message
        return response()->json(['message' => 'Covid flag deleted successfully']);
    }
}
