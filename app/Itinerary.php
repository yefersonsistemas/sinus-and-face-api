<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Itinerary extends Model  //guarda toda la informacion del paciente durante la consulta
{
    protected $table = 'itinerary';

    protected $procedure = [
        'id' => 'int',
        'procedure' => 'array'
    ];

    protected $fillable = [
        'patient_id', 'employe_id','doctor_id', 'status','procedure_id', 'procedureR_id', 'typesurgery_id','surgeryR_id', 
        'report_medico_id','exam_id', 'recipe_id', 'reservation_id', 'branch_id', 'reference_id','diagnostic_id', 'repose_id',
        'ambulatoria', 'hospitalaria'
    ];

    // protected $irinerary = 'itinerary';

    public function employe()
    {
        return $this->belongsTo('App\Employe','employe_id');
    }

    public function billing()
    {
        return $this->belongsTo('App\Billing','billing_id');
    }

    // public function patient()
    // {
    //     return $this->belongsTo('App\Patient', 'patient_id');
    // }

    public function doctor()
    {
        return $this->belongsTo('App\Doctor'); // hace referencia al precio de la consulta
    }

    public function procedure()
    {
        return $this->belongsTo('App\Procedure');
    }

    public function procedureR()
    {
        return $this->belongsTo('App\Procedure','procedureR_id');
    }

    public function reference()
    {
        return $this->belongsTo('App\Reference');
    }

    public function typesurgery()
    {
        return $this->belongsTo('App\Typesurgery','typesurgery_id');
    }

    public function surgeryR()
    {
        return $this->belongsTo('App\Typesurgery','surgeryR_id');
    }

    public function surgery()
    {
        return $this->belongsTo('App\Surgery');
    }

    public function person()
    {
        return $this->belongsTo('App\Person', 'patient_id');
    }

    public function speciality()
    {
        return $this->belongsTo('App\Specilaity');
    }

    public function exam()
    {
        return $this->belongsTo('App\Exam', 'exam_id');
    }

    public function recipe()
    {
        return $this->belongsTo('App\Recipe');
    }

    public function reservation()
    {
        return $this->belongsTo('App\Reservation');
    }

    public function diagnostic()
    {
        return $this->belongsTo('App\Diagnostic');
    }

    public function repose()
    {
        return $this->belongsTo('App\Repose');
    }

    public function report_medico()
    {
        return $this->belongsTo('App\ReportMedico');
    }

}
