<?php

namespace App\Http\Controllers\API;

use App\Exam;
use App\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $data = $request->validate([
            'name' => 'required',
        ]);

        $exam = Exam::create([
            'name'  => $data['name'],
            'branch_id' => 1,
        ]);

        return response()->json([
            'message' => 'Examen creado satisfactoriamente',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function exams(Request $request)
    {
        $patient = Patient::with('diagnostic.exam')->where('person_id', $request->person_id)->first();

        // $exam = Exam::get();
        // //dd($patient);
        // $pdf = PDF::loadView('pdf.exam', compact('exam')); //vista generada por el componente PDF
        //             //carpeta.namearchivo
        return response()->json([
            // 'Exams' => $pdf->download('exam.pdf'), 
            'exams' => $patient,
        ]);
    }

}
