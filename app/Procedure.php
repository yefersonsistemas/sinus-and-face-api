<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Procedure extends Model
{
    protected $table = 'procedures';

    protected $fillable = [
        'name', 'description', 'price', 'specialitie_id', 'branch_id'
    ];

    public function person()
    {
       return $this->belongsTo('App\Person');
    }

    public function doctors()
    {
        return $this->belongsToMany('App\Employe');
    }
    public function branch()
    {
        return $this->belongsTo('App\Branch');
    }

    public function employe()
    {
        return $this->belongsToMany('App\Employe','procedure_employe')
       ->withPivot('employe_id','id');
    }

    public function billing()
    {
        return $this->belongsTo('App\Billing');
    }

    public function speciality()
    {
        return $this->belongsTo('App\Speciality');
    }
}
