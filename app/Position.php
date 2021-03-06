<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $table = 'positions';

    protected $fillable = [ //cargo de empleado
        'name', 'branch_id'
    ];

    public function employe()
    {
        return $this->belongsTo('App\Employe');
    }

    public function visitor()
    {
        return $this->belongsTo('App\Visitor');
    }

    public function branch()
    {
        return $this->belongsTo('App\Branch');
    }

    public function typecleaning() 
    {
        return $this->belongsToMany('App\TypeCleaning');
    }

    public function person()
    {
        return $this->belongsTo('App\Person');
    }
}
