<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Patients;
use App\Mediciens;
use App\Examenes;
use App\Diagnostic;
use App\Carbon\Carbon;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patients::whereDate('date', Carbon::now()->format('d/m/Y'))->get();

        return response()->json([
            'patient' => $patients,
        ]);
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

    public function history_patient(Request $request){
        $patients = Patient::where('id', $request->id);
        $exam = Exam::all();   //se selecciona mediante un buscador
        $procedure = Procedure::all();
        $surgery = Surgery::all(); //informacion para posible cirugia cuando lo seleccione

        //  event(new Consult($surgery)); //se activa cuando seleccionan la cirugia

        return response()->json([
            'patient' => $patients,
            'exam' => $exam,
            'procedure' => $procedure,
        ]);

    }

    public function create_diagnostic(CreateDiagnosticRequest $request){

        $diagnostic = Diagnostic::create([
            'petient_id' => $request->patient_id,
            'description' => $request->description,
            'reason' => $request->reason,
            'treatment' => $request->treatment,
            'annex' => $request->annex,
            'next_cite' => $request->next_cite,
            'employe_id' => $request->employe_id,
        ]);

            return response()->json([
                'message' => 'diagnostico agregado',
            ]);
    }

    public function create_recipe(Request $request){
        $patients = Patient::where('id', $request->id);  //para mostrar los datos basicos del paciente
        $medicines = Medicine::all();  //suponiendo q esten cargadas se seleccionara las q necesitan 
        
        return response()->json([
            'patients' => $patients,
            'medicines' => $medicines,
        ]);
    }

    //falta calculo del doctor p/paciente pago semanal
}
