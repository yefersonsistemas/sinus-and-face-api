@extends('dashboard.layouts.app')

@section('cites','active')
@section('approved','active')
@section('inrol','d-block')
@section('dire','d-none')

@php
    use Carbon\Carbon;
@endphp

@section('css')
    <link rel="stylesheet" href="{{ asset('assets\plugins\datatable\dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets\plugins\datatable\fixedeader\dataTables.fixedcolumns.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets\plugins\datatable\fixedeader\dataTables.fixedheader.bootstrap4.min.css') }}">
@endsection

@section('title','Citas confirmadas')

@section('content')

<style>
    .dataTables_filter label{
        color: #434a54;
    }
    .dataTables_filter label input:focus{
        border: 2px solid #00506b;
    }

    .btn-repro{
        background: #ff8000;
        color: #fff;
    }
</style>

<div class="section-body  py-4">
    <div class="container-fluid">
        <div class="row clearfix justify-content-center">
            {{-- Contadores --}}
            <div class="col-lg-3 col-md-6 col-sm-12 ">
                <div class="card">
                    <div class="card-body">
                        <h6>Total De Citas Agendadas</h6>
                        <h3 class="pt-3"><i class="fa fa-address-book"></i> <span class="counter">{{ $citasAnual }}</span></h3>
                        {{-- <h5>$1,25,451.23</h5> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 ">
                <div class="card">
                    <div class="card-body">
                        <h6>Total De Citas Del Mes</h6>
                        <h3 class="pt-3"><i class="fa fa-calendar"></i> <span class="counter">{{ $citasDelMes }}</span></h3>
                        {{-- <h5>$3,80,451.00</h5> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 ">
                <div class="card">
                    <div class="card-body">
                        <h6>Citas Para Hoy</h6>
                        <h3 class="pt-3"><i class="fa fa-users"></i> <span class="counter">{{ $citasDelDia }}</span></h3>
                        {{-- <span><span class="text-danger mr-2"><i class="fa fa-long-arrow-up"></i> 65.27%</span> Since last month</span>                                --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 ">
                <div class="card">
                    <div class="card-body">
                        <h6>Atendidos Hoy</h6>
                        <h3 class="pt-3"><i class="fa fa-user"></i> <span class="counter">{{ $atendidos }}</span></h3>
                        {{-- <span><span class="text-danger mr-2"><i class="fa fa-long-arrow-up"></i> 165.27%</span> Since last month</span>                                --}}
                    </div>
                </div>
            </div>

            <div class="col-lg-12 mt-10">
                <div class="table-responsive mb-4">
                    <table class="table table-hover js-basic-example dataTable table_custom spacing5">
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>C??dula</th>
                                <th>Nombre</th>
                                <th class="fecha">Fecha</th>
                                <th>Doctor</th>
                                <th>Especialidad</th>
                                <th>Acciones</th>
                                {{-- <th class="text-center">E/S</th>
                                <th class="text-center">EC/SC</th> --}}
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Foto</th>
                                <th>C??dula</th>
                                <th>Nombre</th>
                                <th class="fecha">Fecha</th>
                                <th>Doctor</th>
                                <th>Especialidad</th>
                                <th>Acciones</th>
                                {{-- <th class="text-center">E/S</th>
                                <th class="text-center">EC/SC</th> --}}
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($approved as $reservation)
                                @if ($reservation->status == 'Aprobada')
                                    <tr style="height:40px;">
                                        <td style="text-align: center; font-size:10px; height:40px;">
                                            @if (  ($reservation->patient->image->path))
                                        
                                                <img class="rounded circle" width="100%" height="100%" src="{{ Storage::url($reservation->patient->image->path) }}" alt="">
                                            @else
                                                <img src="" alt="" width="100%" height="100%">
                                            @endif
                                            <div class="text-center">
                                                @if ($reservation->patient->historyPatient == null)
                                                    <a href="{{ route('checkin.history', [$reservation->id,0]) }}">Generar</a>
                                                    {{-- <a href="{{ route('checkin.history', $reservation->patient_id) }}">Generar</a> --}}
                                                @else
                                                    @if($reservation->patient->inputoutput->isEmpty())
                                                        <a href="{{ route('checkin.history', [$reservation->id, 0] ) }}">Ver Historia</a>
                                                    @else
                                                        <a href="{{ route('checkin.history', [$reservation->id, 1] ) }}">Ver Historia</a>
                                                    @endif
                                                @endif
                                            </div>
                                        </td>
                                        <td>{{ $reservation->patient->type_dni }}-{{ $reservation->patient->dni }}</td>
                                        <td>{{ $reservation->patient->name }} {{ $reservation->patient->lastname }}</td>
                                        <th>{{ Carbon::parse($reservation->date)->format('d-m-Y') }}</th>
                                        <td>{{ $reservation->person->name }} {{ $reservation->person->lastname }}</td>
                                        <td>{{ $reservation->speciality->name }}</td>

                                        <td style="display: inline-block">
                                            <a href="{{ route('reservation.edit', $reservation->id) }}" class="btn btn-warning">R</a>
                                            <button type="button" class="btn btn-repro" data-toggle="modal" data-target="#exampleModal" data-whatever="Suspender cita de: {{ $reservation->patient->name }} {{ $reservation->patient->lastname }}" data-id="{{ $reservation->id }}" data-type="Suspendida">S</button>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-whatever="Cancelar cita de: {{ $reservation->patient->name }} {{ $reservation->patient->lastname }}" data-id="{{ $reservation->id }}" data-type="Cancelada">C</button>
                                        </td>

                                        {{-- <td>
                                            <!--Si no a llegado a las instalaciones-->
                                            @if($reservation->patient->inputoutput->isEmpty())
                                                <div>
                                                    <a href="{{ route ('checkin.statusIn', $reservation->patient_id) }}" class="btn btn-repro">E</a>
                                                </div>
                                            @endif

                                            <!--Si esta dentro de las instalaciones-->
                                            @if(!empty($reservation->patient->inputoutput->first()->inside)  && empty($reservation->patient->inputoutput->first()->outside))
                                                <div>
                                                    <button disabled href="{{ route ('checkin.statusIn', $reservation->patient_id) }}" class="btn btn-success">E</button>
                                                </div>
                                            @endif

                                            <!--Si ya se fue de las instalaciones-->
                                            @if(!empty($reservation->patient->inputoutput->first()->inside_office) && !empty($reservation->patient->inputoutput->first()->outside))
                                                <div>
                                                    <button href="{{ route ('checkin.insideOffice', $reservation) }}" class="btn btn-outside primero" disabled>E</button>
                                                </div>
                                            @endif
                                        </td>

                                        <td>
                                            <!--Si no ha llegado a las instalaciones-->
                                            @if(empty($reservation->patient->inputoutput->first()->inside_office) && empty($reservation->patient->inputoutput->first()->inside))
                                                <div>
                                                    <button href="{{ route ('checkin.insideOffice', $reservation) }}" class="btn btn-repro primero" disabled>E</button>
                                                </div>
                                            @endif

                                            <!--Si esta en espera-->
                                            @if(empty($reservation->patient->inputoutput->first()->inside_office) && !empty($reservation->patient->inputoutput->first()->inside))
                                                <div>
                                                    <a href="{{ route ('checkin.insideOffice', $reservation) }}" class="btn btn-repro primero">E</a>
                                                </div>
                                            @endif

                                            <!--Si esta dentro del consultorio-->
                                            @if(!empty($reservation->patient->inputoutput->first()->inside_office) && !empty($reservation->patient->inputoutput->first()->inside) && empty($reservation->patient->inputoutput->first()->outside_office))
                                                <div>
                                                    <button disabled href="{{ route ('checkin.insideOffice', $reservation) }}" class="btn btn-success primero">E</button>
                                                </div>
                                                @endif

                                                <!--Si salio del consultorio-->
                                                @if(!empty($reservation->patient->inputoutput->first()->inside) && !empty($reservation->patient->inputoutput->first()->inside_office) && !empty($reservation->patient->inputoutput->first()->outside_office))
                                                <div>
                                                    <button disabled href="{{ route ('checkin.insideOffice', $reservation) }}" class="btn btn-outside primero">E</button>
                                                </div>
                                            @endif
                                        </td> --}}
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- modals --}}

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content  row">
            <div class="modal-header p-2" >
                <h5 class="col-11 modal-title text-center"id="exampleModalLabel">Paciente </h5>
                <button type="button" class="btn btn-azuloscuro" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('reservation.status') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="reservation_id" class="reservation_id">
                        <input type="hidden" name="type" class="type">
                        <label for="message-text" class="col-form-label">Motivo:</label>
                        <textarea class="form-control" name="motivo" id="message-text"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-azuloscuro">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- modals --}}
@endsection

@section('scripts')
<script src="{{ asset('assets\bundles\dataTables.bundle.js') }}"></script>
<script src="{{ asset('assets\js\table\datatable.js') }}"></script>
<script src="{{ asset('assets\plugins\jquery-steps\jquery.steps.js') }}"></script>





{{-- SCRIPT PARA MENSAJE CON BOTON HACIA ATRAS DEL NAVEGADOR --}}
{{-- <script>
    var submitted = false;

     $(document).ready(function() {
       $("form").submit(function() {
         submitted = true;
       });

       window.onbeforeunload = function () {
         if (!submitted) {
           return 'Do you really want to leave the page?';
         }
       }
     });
    </script> --}}
    {{--FIN SCRIPT PARA MENSAJE CON BOTON HACIA ATRAS DEL NAVEGADOR --}}




    
    <script>
        $('#exampleModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var recipient = button.data('whatever'); // Extract info from data-* attributes
            var id  = button.data('id');
            var type = button.data('type');

            if (type == 'Reprogramada') {
                $('#fecha').html('<label>Seleccionar nueva fecha</label> <div class="input-group"> <input data-provide="datepicker" name="date" data-date-autoclose="true" class="form-control"> </div>');
                $('.reservation_id').val(id);
                $('.type').val(type);
            }
            insertDates(type, id);
            var modal = $(this);
            modal.find('.modal-title').text(recipient);
            $('.reservation_id').val(id);
            $('.type').val(type);

        });

        $('#modalReprogramadas').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var recipient = button.data('whatever'); // Extract info from data-* attributes
            var id  = button.data('id');
            var type = button.data('type');

            var modal = $(this);
            modal.find('.modal-title').text(recipient);
            insertDates(type, id);
        });

        function insertDates(type, id){
            $('#reservation_id').val(id);
            $('#type').val(type);
        }

    </script>
@endsection
