<?php

namespace App\Http\Controllers;

use App\Surgery;
use Illuminate\Foundation\Testing\WithoutEvents;
use Illuminate\Http\Request;
use PhpParser\Builder\Function_;

class InoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $day = Surgery::with('patient.person.image','typesurgeries','area','employe')->get();

       return view('dashboard.vergel.in-out.index',compact('day'));
    }

    public function agendar_cirugia()
    {

    return view('dashboard.vergel.in-out.agendar_cirugia');
    }
        
    public function facturacion()
    {

        return view('dashboard.vergel.in-out.facturacion');
    
    }

    public function factura()
    {

        return view('dashboard.vergel.in-out.factura');
    
    }
   
    public function imprimir_factura()
    {
    return view('dashboard.vergel.in-out.imprimir_factura');

    }
    public function day(){

    $day = Surgery::with('patient.person.image','typesurgeries','area','employe')->get();
    // dd($day);
    return view('dashboard.vergel.in-out.day',compact('day'));
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
}
