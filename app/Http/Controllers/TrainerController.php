<?php

namespace App\Http\Controllers;

use App\Models\Plants;
use App\Models\Trainer;
use App\Mail\QRcodeMail;
use Illuminate\Http\Request;
use BaconQrCode\Encoder\QrCode;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\TrainerRequest;
use App\Http\Requests\UpdateTrainerRequest;

class TrainerController extends Controller
{
    public function index()
    {
        $trainers = Trainer::all() ;
        return view('trainer.index',compact('trainers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $plants = Plants::get();
        return view('trainer.create',compact('plants'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TrainerRequest $request)
    {

        $trainer = Trainer::create($request->validated());

        Mail::to($trainer->email)->send(new QRcodeMail($trainer->QR_code));

        return redirect()->route('trainer.index')->with('success' , 'Added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Trainer $trainer)
    {
        $plants = Plants::get();
        return view('trainer.show',compact('trainer', 'plants'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trainer $trainer)
    {
        $plants = Plants::get();
        return view('trainer.edit',compact('trainer', 'plants'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTrainerRequest $request, Trainer $trainer)
    {
        $trainer->update($request->validated());
        return redirect()->route('trainer.index')->with('success' , 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Trainer::where('id' , $id)->delete();
        return redirect()->route('trainer.index')->with('success' , 'Deleted successfully');
    }
}
