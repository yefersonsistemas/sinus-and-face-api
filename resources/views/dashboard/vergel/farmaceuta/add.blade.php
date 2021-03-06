@extends('dashboard.layouts.app')

@section('cites','active')
@section('farmarol','d-block')
@section('dire','d-none')

@section('css')
<link rel="stylesheet" href="{{ asset('assets\css\style.css') }}">
<link rel="stylesheet" href="{{ asset('assets\plugins\dropify\css\dropify.min.css') }}">

@endsection

@section('title','Agregar Insumos')

@section('content')
<div class="section-body py-4">
    <div class="container-fluid">
        <form action="{{route('farmaceuta.add_lote',$medicine_pharmacy->id)}}" method='POST' enctype="multipart/form-data" class="row d-flex justify-content-center">
            @csrf
            @method('PUT')
            <div class="card p-4 col-lg-12 col-md-12 col-sm-12">
                <div class="card p-4">

                    <div class="row d-flex justify-content-between create-employee">
                        <div class="col-lg-12 col-md-12 d-flex justify-content-between">
                            <div class="row">
                                <div class="col-lg-4 ">
                                    <div class="form-group">
                                        <label class="form-label">Nombre de Insumo</label>
                                        <input type="text" class="form-control" placeholder="Nombre" name="name" disabled value="{{$medicine_pharmacy->medicine->name}}" required>
                                    </div>
                                </div>
                                <div class="col-lg-4 ">
                                    <div class="form-group">
                                        <label class="form-label">Marca</label>
                                        <input type="text" class="form-control" placeholder="Marca" name="marca" disabled value="{{ $medicine_pharmacy->marca }}" required>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label">Laboratorio</label>
                                        <input type="text" class="form-control" placeholder="Laboratorio" disabled name="laboratory" value="{{ $medicine_pharmacy->laboratory }}" required>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label">Presentaci??n</label>
                                        <input type="text" name="presentation" id="presentacion" class="form-control" disabled placeholder="presentacion" value="{{ $medicine_pharmacy->presentation }}" required>
                                    </div>
                                </div>


                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label">Medida</label>
                                        <input type="text" class="form-control" placeholder="Medida" name="measure" disabled value="{{ $medicine_pharmacy->measure }}" required>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label">Cantidad por Unidad</label>
                                        <input type="text" placeholder="Cantidad" class="form-control" name="quantify_Unit" disabled value="{{ $medicine_pharmacy->quantity_Unit }}" required>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label">Cantidad a Ingresar</label>
                                        <input type="text" placeholder="Stock" class="form-control" name="total" value="{{ old('total') }}" required>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label">Numero de Lote</label>
                                        <input type="text" placeholder="N??mero de lote" class="form-control" name="number_lot" value="{{ old('number_lot') }}" required>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label">Fecha de Vencimiento</label>
                                        {{-- <input type="text" placeholder="Fecha de Vencimiento" class="form-control" name="date_vence" value="{{ old('date_vence') }}" required> --}}
                                        <input id="fechas" placeholder="Fecha de Vencimiento" name="date_vence" data-provide="datepicker" value="{{ old('date_vence') }}" required autocomplete="off" data-date-autoclose="true" class="form-control datepicker" >
                                    </div>
                                </div>
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
                        {{-- <button type="reset" style="background:#a1a1a1" class="btn mr-2 pr-4 pl-4 text-white">Limpiar</button>  --}}
                        <button type="submit" class="btn mr-2 pr-4 pl-4 text-white btn-azuloscuro"><i class="fa fa-plus"></i>&nbsp;Guardar</button>
                    </div>
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
<script src="{{ asset('assets\plugins\bootstrap-datepicker\js\bootstrap-datepicker.min.js') }}"></script>

<script>
function disableBtn() {
  document.getElementById("boton").disabled = true;
}

function enableBtn() {
  document.getElementById("boton").disabled = false;
}
</script>


@endsection


