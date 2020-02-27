@extends('dashboard.layouts.app')

@section('cites','active')
@section('day','active')
@section('iorol','d-block')
@section('dire','d-none')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets\plugins\datatable\dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets\plugins\datatable\fixedeader\dataTables.fixedcolumns.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets\plugins\datatable\fixedeader\dataTables.fixedheader.bootstrap4.min.css') }}">
    
@endsection


@section('title','Citas del día')

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

<style type="text/css">
    .state{
        width: auto;
        height: auto;
        border-radius: 5px;}
</style>

<div class="section-body  py-4">
    <div class="container-fluid">
        <div class="row clearfix ">
            {{-- Contadores --}}
            <div class="col-lg-3 col-md-6 col-sm-12 ">
                <div class="card">
                    <div class="card-body">
                        <h6>Total De Citas Agendadas</h6>
                        <h3 class="pt-3"><i class="fa fa-address-book"></i> <span class="counter">     </span></h3>
                        {{-- <h3 class="pt-3"><i class="fa fa-address-book"></i> <span class="counter">{{ $citasAnual }}</span></h3> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 ">
                <div class="card">
                    <div class="card-body">
                        <h6>Total De Citas Del Mes</h6>
                        <h3 class="pt-3"><i class="fa fa-calendar"></i> <span class="counter">        </span></h3>
                        {{-- <h3 class="pt-3"><i class="fa fa-calendar"></i> <span class="counter">{{ $citasDelMes }}</span></h3> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 ">
                <div class="card">
                    <div class="card-body">
                        <h6>Citas Para Hoy</h6>
                        <h3 class="pt-3"><i class="fa fa-users"></i> <span class="counter">       </span></h3>
                        {{-- <h3 class="pt-3"><i class="fa fa-users"></i> <span class="counter">{{ $citasDelDia }}</span></h3> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 ">
                <div class="card">
                    <div class="card-body">
                        <h6>Atendidos Hoy</h6>
                        <h3 class="pt-3"><i class="fa fa-user"></i> <span class="counter">      </span></h3>
                        {{-- <h3 class="pt-3"><i class="fa fa-user"></i> <span class="counter">{{ $atendidos }}</span></h3> --}}
                    </div>
                </div>
            </div>
            
            <div class="col-lg-12 mt-10">
                <div class="table-responsive mb-4">
                    <table class="table table-hover js-basic-example dataTable table_custom spacing5">
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Paciente</th>
                                <th>Doctor</th>
                                <th>Cirugia</th>
                                <th>Quirofano</th>
                                <th>Fecha</th>
                                <th>Acciones</th>
                                <th class="text-center">Estaciones</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Foto</th>
                                <th>Paciente</th>
                                <th>Doctor</th>
                                <th>Cirugia</th>
                                <th>Quirofano</th>
                                <th>Fecha</th>
                                <th>Acciones</th>
                                <th class="text-center">Estaciones</th>
                            </tr>
                        </tfoot>
                        <tbody>  
                            @foreach ($day as $surgeries)
                            <tr style="height:40px;">
                                @foreach ( $surgeries->patient as $patient )

                                     <td style="text-align: center; font-size:10px; height:40px;">
                                        @if(!empty($patient->person->image->path)) 
                                         <img class="roundedcircle"width="100%"height="100%" src="{{ Storage::url($patient->person->image->path)}}" alt="">                                          
                                         @endif  
                                     </td> 
                                     @endforeach
                                    @foreach ( $surgeries->patient as $patient )
                                        <td> {{ $patient->person->name }} {{ $surgeries->employe->person->lastname }} </td> 
                                    @endforeach
                                    <td> {{ $surgeries->employe->person->name }} {{ $surgeries->employe->person->lastname }}</td>
                                    <td> {{ $surgeries->typesurgeries->name }} </td>
                                    <td> {{ $surgeries->area->name }}  </td>
                                    <td> {{ $surgeries->date }}  </td>
                                    <td style="display: inline-block">                                       
                                        {{-- @if ($reservation->patient->inputoutput->isEmpty()) --}}
                                        <a href="     " class="btn btn-warning">R</a>
                                        {{-- <a href="{{ route('reservation.edit', $reservation->id) }}" class="btn btn-warning">R</a> --}}
                                            <button type="button" class="btn btn-repro" data-toggle="modal" data-target="#exampleModal" data-whatever="Suspender cita de: " data-id="" data-type="Suspendida">S</button>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-whatever="Cancelar cita de: " data-id="" data-type="Cancelada">C</button>                                      
                                            {{-- <button type="button" class="btn btn-repro" data-toggle="modal" data-target="#exampleModal" data-whatever="Suspender cita de: {{ $reservation->patient->name }} {{ $reservation->patient->lastname }}" data-id="{{ $reservation->id }}" data-type="Suspendida">S</button>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-whatever="Cancelar cita de: {{ $reservation->patient->name }} {{ $reservation->patient->lastname }}" data-id="{{ $reservation->id }}" data-type="Cancelada">C</button> --}}
                                        {{-- @endif --}}

                                        {{-- @if (!empty($reservation->patient->inputoutput->first()->inside) && empty($reservation->patient->inputoutput->first()->inside_office) && empty($reservation->patient->inputoutput->first()->outside_office) && empty($reservation->patient->inputoutput->first()->outside)) --}}
                                      
                                       
                                        {{-- <a href="   " class="btn btn-warning">R</a> --}}


                                        {{-- <a href="{{ route('reservation.edit', $reservation->id) }}" class="btn btn-warning">R</a> --}}



                                            {{-- <button type="button" class="btn btn-repro" data-toggle="modal" data-target="#exampleModal" data-whatever="Suspender cita de:       " data-id="   " data-type="Suspendida">S</button>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-whatever="Cancelar cita de:      " data-id="  " data-type="Cancelada">C</button> --}}



                                            {{-- <button type="button" class="btn btn-repro" data-toggle="modal" data-target="#exampleModal" data-whatever="Suspender cita de: {{ $reservation->patient->name }} {{ $reservation->patient->lastname }}" data-id="{{ $reservation->id }}" data-type="Suspendida">S</button>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-whatever="Cancelar cita de: {{ $reservation->patient->name }} {{ $reservation->patient->lastname }}" data-id="{{ $reservation->id }}" data-type="Cancelada">C</button> --}}
                                        {{-- @endif --}}

                                        {{-- @if (!empty($reservation->patient->inputoutput->first()->inside_office) && !empty($reservation->patient->inputoutput->first()->inside)  && empty($reservation->patient->inputoutput->first()->outside_office) && empty($reservation->patient->inputoutput->first()->outside)) --}}
                                           
                                        
                                        
                                        {{-- <button disabled class="btn btn-warning">R</button>
                                            <button type="button" class="btn btn-repro" data-toggle="modal" data-target="#exampleModal" data-whatever="   " data-id="     " data-type="Suspendida">S</button>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-whatever="  " data-id="     " data-type="Cancelada">C</button> --}}



                                            {{-- <button type="button" class="btn btn-repro" data-toggle="modal" data-target="#exampleModal" data-whatever="Suspender cita de: {{ $reservation->patient->name }} {{ $reservation->patient->lastname }}" data-id="{{ $reservation->id }}" data-type="Suspendida">S</button>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-whatever="Cancelar cita de: {{ $reservation->patient->name }} {{ $reservation->patient->lastname }}" data-id="{{ $reservation->id }}" data-type="Cancelada">C</button> --}}
                                        {{-- @endif --}}

                                        {{-- @if (!empty($reservation->patient->inputoutput->first()->inside_office) && !empty($reservation->patient->inputoutput->first()->inside) && !empty($reservation->patient->inputoutput->first()->outside_office) && empty($reservation->patient->inputoutput->first()->outside)) --}}

                                        
{{--                                         
                                           Bueno     <button disabled class="btn btn-warning">R</button>
                                            <button type="button" class="btn btn-repro" disabled>S</button>
                                            <button type="button" class="btn btn-danger" disabled>C</button> --}}



                                        {{-- @endif --}}

                                        {{-- @if (!empty($reservation->patient->inputoutput->first()->inside_office) && !empty($reservation->patient->inputoutput->first()->inside) && !empty($reservation->patient->inputoutput->first()->outside_office) && !empty($reservation->patient->inputoutput->first()->outside)) --}}
                                           
{{--                                         
                                                 Bueno    <button disabled class="btn btn-warning">R</button>
                                            <button type="button" class="btn btn-repro" disabled>S</button>
                                            <button type="button" class="btn btn-danger" disabled>C</button> --}}



                                            {{-- @endif --}}
                                    </td>
                                    <td>


                                        <div class="container text-center" id="ID_element_0">
                                            {{-- El paciente ha ingresado a las instalaciones --}}											
                                            {{-- @if($reservation->patient->inputoutput->isEmpty())  											 --}}
                                                {{-- @if ($reservation->status == 'Aprobada')			 --}}
                                                <a href="   "  data-toggle="tooltip" data-placement="left" title="Marcar cuando el paciente llegue a las instalaciones" class="btn btn-danger state state_0" state="0" onclick="entradas($(this).attr('state'), 'ID_element_0')"></a>
                                                {{-- <a href="{{ route ('checkin.statusIn', $reservation->id) }}"  data-toggle="tooltip" data-placement="left" title="Marcar cuando el paciente llegue a las instalaciones" class="btn btn-danger state state_0" state="0" onclick="entradas($(this).attr('state'), 'ID_element_0')"></a> --}}
                                                {{-- @elseif($reservation->status != 'Aprobada') --}}
                                                <button type="button" class="btn btn-secondary state state_0" disabled></button>
                                                {{-- @endif --}}


                                                
                                                {{--     Bueno   <button class="btn btn-secondary state state_1" type="button" state="1" onclick="entradas($(this).attr('state'), 'ID_element_0')" disabled></button>
                                                <button class="btn btn-secondary state state_2" type="button" state="2" onclick="entradas($(this).attr('state'), 'ID_element_0')" disabled></button>
                                                <button class="btn btn-secondary state state_3" type="button" state="3" onclick="entradas($(this).attr('state'), 'ID_element_0')" disabled></button> --}}


                                            {{-- @endif --}}

                                            {{-- El paciente ha ingresado al consultorio --}}
                                            {{-- @if(!empty($reservation->patient->inputoutput->first()->inside) && empty($reservation->patient->inputoutput->first()->inside_office) && empty($reservation->patient->inputoutput->first()->outside_office) && empty($reservation->patient->inputoutput->first()->outside)) --}}
                                            <button class="btn btn-success state state_0" type="button" state="0" onclick="entradas($(this).attr('state'), 'ID_element_0')" disabled></button>


                                            <a href="   " data-toggle="tooltip" data-placement="left" title="Marcar cuando el paciente entre al consultorio" class="btn btn-danger state state_1" state="1" onclick="entradas($(this).attr('state'), 'ID_element_0')"></a>
                                            {{-- <a href="{{ route ('checkin.insideOffice', $reservation->id) }}" data-toggle="tooltip" data-placement="left" title="Marcar cuando el paciente entre al consultorio" class="btn btn-danger state state_1" state="1" onclick="entradas($(this).attr('state'), 'ID_element_0')"></a> --}}

                                           {{-- <button class="btn btn-success state state_1" type="button" state="1" onclick="entradas($(this).attr('state'), 'ID_element_0')" disabled></button> --}}

{{-- 
                                            <button class="btn btn-secondary state state_2" type="button" state="2" onclick="entradas($(this).attr('state'), 'ID_element_0')" disabled></button>
                                            <button class="btn btn-secondary state state_3" type="button" state="3" onclick="entradas($(this).attr('state'), 'ID_element_0')" disabled></button> --}}
                                           

                                            {{-- @endif --}}

                                            {{-- El paciente ha salido del consultorio --}}
                                            {{-- @if(!empty($reservation->patient->inputoutput->first()->inside_office) && !empty($reservation->patient->inputoutput->first()->inside)  && empty($reservation->patient->inputoutput->first()->outside_office) && empty($reservation->patient->inputoutput->first()->outside)) --}}
                                           
                                           
                                           
                                            {{--   Bueno  <button class="btn btn-success state state_0" type="button" state="0" onclick="entradas($(this).attr('state'), 'ID_element_0')" disabled></button>
                                            <button class="btn btn-success state state_1" type="button" state="1" onclick="entradas($(this).attr('state'), 'ID_element_0')" disabled></button>
                                            <button class="btn btn-secondary state state_2" type="button" state="2" onclick="entradas($(this).attr('state'), 'ID_element_0')" disabled></button>
                                            <button class="btn btn-secondary state state_3" type="button" state="3" onclick="entradas($(this).attr('state'), 'ID_element_0')" disabled></button> --}}



                                            {{-- @endif --}}

                                            {{-- El paciente no ha salido de las instalaciones --}}
                                            {{-- @if(!empty($reservation->patient->inputoutput->first()->inside_office) && !empty($reservation->patient->inputoutput->first()->inside) && !empty($reservation->patient->inputoutput->first()->outside_office) && empty($reservation->patient->inputoutput->first()->outside)) --}}
                                            
                                            
                                            {{--  Bueno <button class="btn btn-success state state_0" type="button" state="0" onclick="entradas($(this).attr('state'), 'ID_element_0')" disabled></button>
                                                <button class="btn btn-success state state_1" type="button" state="1" onclick="entradas($(this).attr('state'), 'ID_element_0')" disabled></button>
                                                <button class="btn btn-success state state_2" type="button" state="2" onclick="entradas($(this).attr('state'), 'ID_element_0')" disabled></button>
                                                <button class="btn btn-secondary state state_3" type="button" state="3" onclick="entradas($(this).attr('state'), 'ID_element_0')" disabled></button> --}}



                                            {{-- @endif --}}

                                            {{-- todos los recorridos realizados con exito --}}
                                            {{-- @if(!empty($reservation->patient->inputoutput->first()->inside_office) && !empty($reservation->patient->inputoutput->first()->inside) && !empty($reservation->patient->inputoutput->first()->outside_office) && !empty($reservation->patient->inputoutput->first()->outside)) --}}
                                               
                                            
                                            
                                            {{--   Bueno <button class="btn btn-success state state_0" type="button" state="0" onclick="entradas($(this).attr('state'), 'ID_element_0')" disabled></button>
                                                <button class="btn btn-success state state_1" type="button" state="1" onclick="entradas($(this).attr('state'), 'ID_element_0')" disabled></button>
                                                <button class="btn btn-success state state_2" type="button" state="2" onclick="entradas($(this).attr('state'), 'ID_element_0')" disabled></button>
                                                <button class="btn btn-success state state_3" type="button" state="3" onclick="entradas($(this).attr('state'), 'ID_element_0')" disabled></button> --}}




                                            {{-- @endif --}}
                                        </div>
                                    </td>
                                </tr>
                                {{-- @endif --}}
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
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Paciente </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                    <button type="button" class="btn btn-repro" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
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