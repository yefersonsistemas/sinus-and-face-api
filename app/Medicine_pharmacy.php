<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine_pharmacy extends Model
{
    protected $table = 'medicine_pharmacy';

    protected $fillable = [
        'medicine_id', 'marca','laboratory', 'presentation', 'measure', 'quantity_Unit','branch_id'
    ];

    public function medicine()
    {
         return $this->belongsTo('App\Medicine','medicine_id');
    }

    public function surgery() 
    {
        return $this->belongsToMany('App\Surgery','surgery_medicine_pharmacy')
        ->withPivot('surgery_id','id');
    }

}
