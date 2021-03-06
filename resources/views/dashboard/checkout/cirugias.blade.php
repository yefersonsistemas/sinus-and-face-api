@extends('dashboard.layouts.app')

@section('cites','active')
@section('all','active')
@section('outrol','d-block')
@section('dire','d-none')

@section('css')
<link rel="stylesheet" href="{{ asset('assets\plugins\datatable\dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet"
    href="{{ asset('assets\plugins\datatable\fixedeader\dataTables.fixedcolumns.bootstrap4.min.css') }}">
<link rel="stylesheet"
    href="{{ asset('assets\plugins\datatable\fixedeader\dataTables.fixedheader.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets\css\brandKen.css') }}">

@endsection

@section('title','Cirugías')
@section('cirugias','active')
@section('content')

<style>
    .dataTables_filter label {
        color: #434a54;
    }

    .dataTables_filter label input:focus {
        border: 2px solid #00506b;
    }
</style>

<div class="section-body  py-4">
    <div class="container-fluid">
        <div class="row clearfix justify-content-between">
            {{-- Contadores --}}
            <div class="col-lg-3 col-md-6 col-sm-12 ">
                <div class="card">
                    <div class="card-body">
                        <h6>Reservaciones confirmadas</h6>
                        <h3 class="pt-3"><i class="fa fa-address-book"></i> <span class="counter">2,250</span></h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 ">
                <div class="card">
                    <div class="card-body">
                        <h6>Pacientes por entrar</h6>
                        <h3 class="pt-3"><i class="fa fa-calendar"></i> <span class="counter">750</span></h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 ">
                <div class="card">
                    <div class="card-body">
                        <h6>Pacientes atendidos</h6>
                        <h3 class="pt-3"><i class="fa fa-users"></i> <span class="counter">25</span></h3>
                    </div>
                </div>
            </div>
            <div class="container mt--15">
                {{-- Tabs de citas --}}
                <ul class=" row nav nav-pills mb-3 d-flex justify-content-start mt-4" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active btn btn-outline-success" id="pills-profile-tab" data-toggle="pill"
                            href="#ambulatorias" role="tab" aria-controls="ambulatorias"
                            aria-selected="true">Ambulatorias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-primary" id="pills-home-tab" data-toggle="pill"
                            href="#hospitalarias" role="tab" aria-controls="hospitalarias"
                            aria-selected="false">Hospitalarias</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <!----------------------------lista de cirugias ambulatorias----------------------------->
                    @foreach ($cirugias_ambulatorias as $ambulatorias)
                        <div class=" row tab-pane animated bounceInRight fast show active" id="ambulatorias" role="tabpanel"
                            aria-labelledby="pills-profile-tab">
                            <div class="col-lg-12">
                                <div class="card mb-4">
                                    <div class="row card-body d-flex justify-content-between">
                                        @forelse ($ambulatorias->typeSurgeries as $surgery)
                                        <div class="col-sm-12 col-lg-3 m-2">
                                            <div class="card text-center card-img">
                                                <img src="assets\images\cirugia-abulatorira.jpg"
                                                    class="card-img-top img-thumbnail" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title" style="text-transform: none;">
                                                        {{ $surgery->name }}</h5>
                                                </div>
                                                <a href="{{ route('checkout.cirugias_detalles', [$surgery->id, 1] ) }}"
                                                    class="card-link card-footer btn btn-azuloscuro py-2">Ver más..</a>
                                            </div>
                                        </div>
                                        @empty
                                        <h3>NO hay nada</h3>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <!----------------------------lista de cirugias hospitalarias----------------------------->
                    @foreach ($cirugias_hospitalarias as $hospitalarias)
                        <div class=" row tab-pane fast animated bounceInRight show" id="hospitalarias"
                            role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="col-lg-12">
                                <div class=" mb-4 card ">
                                    <div class="row card-body d-flex justify-content-between">
                                        @forelse ($hospitalarias->typeSurgeries as $surgery)
                                            <div class="col-sm-12 col-lg-3 m-2">
                                                <div class="card text-center card-img">
                                                    <img src="assets\images\cirugia-hospitalaria.jpg"
                                                        class="card-img-top img-thumbnail" alt="...">
                                                    <div class="card-body">
                                                        <h5 class="card-title" style="text-transform: none;">
                                                            {{ $surgery->name }}</h5>
                                                    </div>
                                                    <a href="{{ route('checkout.cirugias_detalles', [$surgery->id,2] ) }}"
                                                        class="card-link card-footer btn btn-azuloscuro py-2">Ver más...</a>
                                                </div>
                                            </div>
                                        @empty
                                        <h3>NO hay nada</h3>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('assets\bundles\dataTables.bundle.js') }}"></script>
<script src="{{ asset('assets\js\table\datatable.js') }}"></script>
@endsection