<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Billing extends Model //facturacion
{
    protected $table = 'billings';

    protected $fillable = [ //saldo
        'procedure_employe_id', 'person_id', 'patient_id', 'type_payment_id', 'type_currency_id', 'branch_id'
    ];

    public function employe()
    {
        return $this->hasone('App\Employe');
    }

    public function patients()
    {
        return $this->belongsTo('App\Patient');
    }

    public function payments()
    {
        return $this->belongsTo('App\Payment');
    }

    public function procedure()
    {
        return $this->hasmany('App\Procedure');
    }

    public function person()
    {
        return $this->hasmany('App\Person');
    }

    public function typepaymnets()
    {
        return $this->hasmany('App\TypePayments');
    }

    public function typecurrency()
    {
        return $this->hasmany('App\TypeCurrency');
    }

    public function branch()
    {
        return $this->belongsTo('App\Branch');
    }
}
