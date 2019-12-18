@extends('dashboard.layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets\css\style.css') }}">
{{-- <link rel="stylesheet" href="{{ asset('assets\plugins\multi-select\css\multi-select.css') }}"> --}}
<link rel="stylesheet" href="{{ asset('assets\plugins\dropify\css\dropify.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets\css\brandMaster.css') }}">

@endsection

@section('title','Registro de Empleados')

@section('content')
<div class="section-body py-4">
    <div class="container-fluid">
        <form action="{{route('employe.store')}}" method='POST' enctype="multipart/form-data" class="row d-flex justify-content-center">
            @csrf
                <div class="card p-4 col-lg-12 col-md-12 col-sm-12">
                    <div class="card p-4">

                        <div class="row d-flex justify-content-between">
                            <div class="form-group col-lg-3 col-md-3">
                                <label class="form-label">Foto</label>
                                <div class=" mb-2">
                                    <input id="image" type="file" class="dropify" name="image" data-default-file="">
                                </div>
                            </div>

                            <div class="col-lg-9 col-md-7 d-flex justify-content-between">
                               <div class="row">
                                    <div class="form-group col-lg-4">
                                            <label class="form-label">Documento de Identidad</label>
                                            <div class="input-group ">
                                                <div class="input-group-prepend">
                                                    <select name="type_dni" class="custom-select input-group-text form-control" value=" {{ old('type_dni') }}" required>
                                                        <option value="0">...</option>
                                                        <option value="N">N</option>
                                                        <option value="E">E</option>
                                                    </select>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Documento de Identidad" value=" {{ old('dni') }}" required name="dni">
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-4 ">
                                            <div class="form-group">
                                                <label class="form-label">Nombre</label>
                                                <input type="text" class="form-control" placeholder="Nombre" name="name" value="{{ old('name') }}" required>
                                            </div>
                                        </div>
                        
                                        <div class="col-lg-4">
                                            <div class="form-group"> 
                                                <label class="form-label">Apellido</label>
                                                <input type="text" class="form-control" placeholder="Apellido" name="lastname" value="{{ old('lastname') }}" required>
                                            </div>
                                        </div>
        
                                        <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-label">Direccion</label>
                                                    <input type="text" name="address" id="address" class="form-control" placeholder="Direccion" value="{{ old('address') }}" required>
                                                </div>
                                            </div>
                    
                                            
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-label"> Teléfono </label>
                                                    <input type="text" class="form-control" placeholder="Telefono" name="phone" value="{{ old('phone') }}" required>
                                                </div>
                                            </div>
                                            
                                        
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-label"> Correo Electronico </label>
                                                <input type="email" placeholder="name@example.com" class="form-control" name="email" value="{{ old('email') }}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    <div class="row d-flex justify-content-between">
                    
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label">Cargo</label>
                                <select name="position_id" id="id" class="custom-select input-group-text bg-white form-control">
                                    <option value="0">Ninguna selección</option>
                                    @foreach ($position as $position)
                                    <option value={{$position->id}}>{{$position->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
        
                    <div class="btn-group-toggle mb-2 mt-3 d-flex justify-content-end" style="text-align:center">
                            <button type="submit" class="btn mr-2 pr-4 pl-4 text-white bg-verdePastel" >Enviar</button>
                            <button type="reset" class="btn btn-azuloscuro mr-2 pr-4 pl-4">Limpiar</button>
                    </div>
                </div>
        </form>
    </div>
</div>
@endsection


@section('scripts')
<script src="{{ asset('assets\plugins\bootstrap-multiselect\bootstrap-multiselect.js') }}"></script>

<script src="{{ asset('assets\plugins\dropify\js\dropify.min.js') }}"></script>
<script src="{{ asset('assets\js\form\form-advanced.js') }}"></script>

@endsection


    