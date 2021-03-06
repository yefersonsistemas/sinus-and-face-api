@extends('dashboard.layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets\plugins\datatable\dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets\plugins\datatable\fixedeader\dataTables.fixedcolumns.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets\plugins\datatable\fixedeader\dataTables.fixedheader.bootstrap4.min.css') }}">

@endsection

@section('title','Lista de empleados')


@section('content')
@can('ver lista de empleados')
<div class="section-body  py-4">
    <div class="container-fluid">

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="col-lg-12">
                    <div><a href="{{route('employes.pdf')}}" target="_blank" class="btn btn-info text-white float-right mb-2 mt--10 col-2"  data-toggle="tooltip" data-placement="left" title="Imprimir lista de empleados">IMPRIMIR LISTA</a>
                    </div>
                    <div class="table-responsive mb-4">

                        <table class="table table-hover js-basic-example dataTable table_custom spacing5 table-image">
                            <thead>
                                <tr>
                                    <th>Foto</th>
                                    <th>Cedula</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Cargo</th>
                                    <th>Acción</th>
                                    <th class="justify-content-center text-center">Imprimir</th>
                                    {{-- <th>visitante</th> --}}
                                    {{-- <th>Esepcialidad</th> --}}
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Foto</th>
                                    <th>Cedula</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Cargo</th>
                                    <th>Acción</th>
                                    <th class="justify-content-center text-center">Imprimir</th>
                                     {{-- <th>visitante</th> --}}
                                    {{-- <th>Esepcialidad</th> --}}
                                </tr>
                            </tfoot>
                            <tbody>

                                @foreach ($employes as $employe)
                                    <tr>

                                        <td>
                                            @if (!empty($employe->image->path))
                                                <img class="img-fluid" style="max-width:100%; height:3em" src="{{ Storage::url($employe->image->path) }}" alt="">
                                            @else
                                                <img src="" alt="">
                                            @endif
                                        </td>
                                        <td>{{ $employe->person->type_dni }} - {{ $employe->person->dni }}</td>
                                        <td>{{ $employe->person->name }}</td>
                                        <td>{{ $employe->person->lastname }}</td>
                                        <td>{{ $employe->position->name }}</td>
                                        <td>
                                            @if ($employe->position->name == 'doctor')
                                                <form action="{{ route('empleado.delete', $employe) }}" method="POST">
                                                <a href="{{ route('doctores.edit', $employe->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                                <button title="Eliminar" class=" btn btn-danger" ><i class="fa fa-eraser"></i></i></button>
                                                @method('delete')
                                                @csrf
                                            </form>
                                            @elseif ($employe->position->name != 'doctor')
                                                <form action="{{ route('empleado.delete', $employe) }}" method="POST">
                                                <a href="{{ route('empleado.edit', $employe->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                                <button title="Eliminar" class=" btn btn-danger" ><i class="fa fa-eraser"></i></i></button>
                                                @method('delete')
                                                @csrf
                                            </form>
                                            @endif
                                        </td>
                                    <td class="justify-content-center text-center"><a href="{{route('employe.pdf', $employe->id)}}" target="_blank" class="btn btn-info text-white"  data-toggle="tooltip" data-placement="left" title="Imprimir"><i class="fe fe-printer"></i></a></td>
                                        {{-- <td>
                                            @if ( $employe->position->name == 'doctor')
                                                @foreach ($employe->speciality as $speciality)
                                                {{ $speciality->name }}
                                                @endforeach
                                            @endif
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endcan
@endsection

@section('scripts')
<script src="{{ asset('assets\bundles\dataTables.bundle.js') }}"></script>
<script src="{{ asset('assets\js\table\datatable.js') }}"></script>

@endsection
