<?php

namespace App\Http\Controllers;

use App\Models\Plants;
use Illuminate\Http\Request;

class PlantsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plants  = Plants::get() ;
        return view('plant.index',compact('plants')) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50|unique:plants',
        ]);
        Plants::create([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Plant Added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Plants $plants)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plants $plants)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plants $plants)
    {
        Plants::findOrFail($request->id)->update([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('msg','Plant updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        // $plants->delete();
        // return redirect()->back()->with('msg','Plant Deleted successfully');
        Plants::where('id' , $id)->delete();
        return redirect()->back()->with('success' , 'Plant Deleted successfully');
    }
}
