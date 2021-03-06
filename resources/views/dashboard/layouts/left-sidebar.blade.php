
<style>
    .bg-indigo{
        /* margin-top: 0px; */
    }
</style>

<div id="left-sidebar" class="sidebar">
    <div class="container mt--20">

        @if(count(Auth::user()->getRoleNames()) > 1)
        {{-- <h5 class="brand-name">{{ ucfirst(Auth::user()->getRoleNames()[11]) }}<a href="#" class="menu_option float-right"><i class="icon-grid font-16" data-toggle="tooltip" data-placement="left" title="Grid & List Toggle"></i></a></h5> --}}
        <h5 class="brand-name">Director<a href="#" class="menu_option float-right"><i class="icon-grid font-16" data-toggle="tooltip" data-placement="left" title="Grid & List Toggle"></i></a></h5>
        @else
        <h5 class="brand-name">{{ ucfirst(Auth::user()->getRoleNames()[0]) }}<a href="#" class="menu_option float-right"><i class="icon-grid font-16" data-toggle="tooltip" data-placement="left" title="Grid & List Toggle"></i></a></h5>
        @endif

        <nav id="left-sidebar-nav" class="sidebar-nav">
            <ul class="metismenu">
                {{-- @role('recepcion')
                    <li class="g_heading">Recepcion</li>
                    <li class=""><a href="index.html"><i class="icon-home"></i><span>Dashboard</span></a></li>
                    <li class="@yield('cites')">
                        <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="icon-tag"></i><span>Citas</span></a>
                        <ul>
                            <li class="@yield('all')"><a href="{{ route('citas.index') }}">Citas</a></li>
                            <li class="@yield('newCite')"><a href="{{ route('reservations.create') }}">Nueva Cita</a></li>
                        </ul>
                    </li>
                    <li><a href="app-calendar.html"><i class="icon-calendar"></i><span>Calendar</span></a></li>
                    <li><a href="app-chat.html"><i class="icon-speech"></i><span>Chat</span></a></li>
                    <li><a href="app-contact.html"><i class="icon-notebook"></i><span>Contact</span></a></li>
                    <li><a href="app-blog.html"><i class="icon-globe"></i><span>Blog</span></a></li>

                    <div class="card bg-indigo" style="background-color: #00506b;">
                        <div class="card-header">
                            <h3 class="card-title text-white">Fechas</h3>
                        </div>
                        <div class="card-body text-center">
                            <div class="inline-datepicker datepicker-reception fill_bg"></div>
                        </div>
                    </div>
                @endrole --}}

                <!-- Se agreg?? el @yield('inrol') para lograr el funcionamiento del left-sidebar y nav-bar-->
                @role('IN')
                    <div class="">
                        @role('director')
                        <div class="checkIn animated fadeIn d-none  @yield('inrol')" >
                        @endrole
                        <li class="g_heading">Check-IN</li>
                        <li class="">
                            <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="fa fa-users"></i>&nbsp;&nbsp;<span>Pacientes</span></a>
                            <ul>
                                <li class="@yield('day')"><a href="{{ route('checkin.day') }}"><i class="fa fa-calendar-check-o"></i>&nbsp;&nbsp;Citas Del Dia</a></li>
                                <li class="@yield('approved')"><a href="{{ route('checkin.approved') }}"><i class="fa fa-check"></i>&nbsp;&nbsp;Citas Confirmadas</a></li>
                                <li class="@yield('pending')"><a href="{{ route('checkin.pending') }}"><i class="fa fa-hourglass"></i>&nbsp;&nbsp;Citas Pendientes</a></li>
                                <li class="@yield('all')"><a href="{{ route('checkin.index') }}"><i class="fa fa-list"></i>&nbsp;&nbsp;Todas Las Citas</a></li>
                                <li class="@yield('newCite')"><a href="{{ route('reservations.create') }}"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Nueva Cita</a></li>
                                <li class="@yield('record')"><a href="{{ route('checkin.record') }}"><i class="fa fa-inbox"></i>&nbsp;&nbsp;Historial de citas</a></li>
                                {{-- <li class="@yield('newCite')"><a href="{{ route('checkin.') }}">Nueva Cita</a></li> --}}
                            </ul>

                        </li>
                        <li class="@yield('medicoss')">
                                <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="fa fa-user-md"></i>&nbsp;&nbsp;<span>M??dicos</span></a>
                                <ul>
                                    {{-- <li>
                                        <a href="{{ route('checkin.doctor') }}">M??dicos del d??a</a>
                                    </li> --}}
                                    <li class="@yield('medicos')">
                                        <a href="{{ route('checkin.doctor_todos') }}"><i class="fa fa-users"></i> &nbsp;&nbsp;Todos los m??dicos</a>
                                    </li>
                                    <li class="@yield('all')">
                                        <a href="{{ route('checkin.consultorio') }}">Asistencia</a>
                                    </li>
                            </li>
                        </li>
                        {{-- <div class="card bg-indigo" style="background-color: #00506b;">
                            <div class="card-body text-center">
                                <div class="inline-datepicker datepicker-reception fill_bg"></div>
                            </div>
                        </div> --}}
                    </div>
                @endrole

                <!-- Se agreg?? el @yield('docrol') para lograr el funcionamiento del left-sidebar y nav-bar-->
                @role('doctor')
                    <div class="">
                        @role('director')
                        <div class="doctor animated fadeIn d-none @yield('docrol')">
                        @endrole


                        <li class="g_heading">Doctor</li>
                        <li class="@yield('doctor')"><a href=" {{ route('doctor.index')  }} "><i class="fe fe-calendar"></i>&nbsp;&nbsp;<span>Citas de Pacientes</span></a></li>
                        <li class="@yield('cirugia')"><a href="{{ route('doctor.lista_cirugias') }}"><i class="fa fa-list"></i>&nbsp;&nbsp;<span>Lista de Cirug??as</span></a></li>
                        {{-- <li><a href=" {{ route('doctor.recordpago') }}"><i class="fe fe-list"></i><span>Record de Ingresos</span></a></li> --}}
                    </div>
                @endrole
                    {{-- FIN DEL MODULO DE LOS DOCTORES --}}


                <!-- Se agreg?? el @yield('outrol') para lograr el funcionamiento del left-sidebar y nav-bar-->

                @role('OUT')
                <div class="">
                    @role('director')
                    <div class="checkOut animated fadeIn d-none @yield('outrol')">
                    @endrole

                    <li class="g_heading">Check-OUT</li>
                    <li  class="@yield('citas')"><a href="{{ route('checkout.index') }}"><i class="fa fa-users"></i>&nbsp;&nbsp;<span>Citas del d??a</span></a></li>
                    <li class="@yield('facturacion')"><a href="{{ route('checkout.facturacion') }}"><i class="fa fa-money"></i>&nbsp;&nbsp;<span>Facturaci??n</span></a></li>
                    <li class="@yield('cirugias')"><a href="{{ route('checkout.index_cirugias') }}"><i class="fa fa-hospital-o"></i>&nbsp;&nbsp;<span>Cirug??as</span></a></li>
                    <li @yield('cites')>
                    <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="fa fa-users"></i>&nbsp;&nbsp;<span>Agendar Cirugia</span></a>
                        <ul>
                            <li class="@yield('agendar')"><a href="{{ route('checkout.programar-cirugia') }}"><i class="fa fa-calendar"></i>&nbsp;&nbsp;<span>Hospitalaria</span></a></li>
                            <li class="@yield('newCite')"><a href="{{ route('checkout.agendar-ambulatoria') }}"><i class="fa fa-calendar"></i>&nbsp;&nbsp;<span>Ambulatoria</span></a></li>
                        </ul>
                    </li>
                    <li class="@yield('facturacion')"><a href="{{ route('checkout.lista_cirugias') }}"><i class="fa fa-list"></i>&nbsp;&nbsp;<span>Lista de Cirug??as</span></a></li>
                </div>
                @endrole


                @role('director')
                <div class="director animated fadeIn @yield('dire')">
                    <li class="g_heading">Director</li>
                    <li ><a href="{{ route('employe.index') }}"><i class="fa fa-users"></i>&nbsp;&nbsp;Lista de Empleados</a></li>
                    <li>
                        <a href="{{ route('checkin.doctor') }}"><i class="fa fa-user-md"></i>&nbsp;&nbsp;M??dicos del d??a</a>
                    </li>
                    <li><a href="{{ route('all.register') }}"><i class="fa fa-eye"></i>&nbsp;&nbsp;Lista de Registros</a></li>

                    <li class="">
                        <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;<span>Registrar</span></a>
                        <ul>
                            <li><a href="{{ route('position.create') }}"><i class="fa fa-black-tie"></i>&nbsp;&nbsp;Cargo</a></li>
                            <li ><a href="{{ route('clase.create') }}"><i class=""></i>&nbsp;&nbsp;Clase del Doctor</a></li>
                            <li><a href="{{ route('service.create') }}"><i class="fa fa-ambulance"></i>&nbsp;&nbsp;Servicio</a></li>
                            <li><a href="{{ route('speciality.create') }}"><i class="fa fa-flask"></i>&nbsp;&nbsp;Especialidad</a></li>
                            <li><a href="{{ route('procedure.create') }}"><i class="fa fa-hotel"></i>&nbsp;&nbsp;Procedimiento</a></li>
                            <li><a href="{{ route('employe.create') }}"><i class="fa fa-user-plus"></i>&nbsp;&nbsp;Empleado</a></li>
                            <li><a href="{{ route('doctores.create') }}"><i class="fa fa-user-md"></i>&nbsp;&nbsp;Doctor</a></li>
                            <li><a href="{{ route('classification.create') }}"><i class=""></i>&nbsp;&nbsp;Tipo de cirug??a</a></li>
                            <li><a href="{{ route('surgery.create') }}"><i class="fa fa-medkit"></i>&nbsp;&nbsp;Cirugias</a></li>
                            <li><a href="{{ route('allergy.create') }}"><i class=""></i>&nbsp;&nbsp;Alergias</a></li>
                            <li><a href="{{ route('disease.create') }}"><i class="fa fa-heartbeat"></i>&nbsp;&nbsp;Enfermedades</a></li>
                            <li><a href="{{ route('medicine.create') }}"><i class="fa fa-eyedropper"></i>&nbsp;&nbsp;Medicina</a></li>
                            <li><a href="{{ route('exam.create') }}"><i class="fa fa-file-text"></i>&nbsp;&nbsp;Ex??menes</a></li>
                            <li><a href="{{ route('type-area.create') }}"><i class="fe fe-home"></i>&nbsp;&nbsp;Tipo de Area</a></li>
                            <li><a href="{{ route('consultorio.create') }}"><i class="icon-home"></i>&nbsp;&nbsp;Area</a></li>
                            <li><a href="{{ route('payment.create') }}"><i class=""></i>&nbsp;&nbsp;Tipos de pagos</a></li>
                        </ul>
                    </li>

                    <li><a href="{{ route('visitantes') }}"><i class="fa fa-users"></i>&nbsp;&nbsp;Lista de Visitantes</a></li>
                </div>
                @endrole


                    <!-- Se agreg?? el @yield('enrol') para lograr el funcionamiento del left-sidebar y nav-bar-->
                @role('enfermeria')
                <div class="">
                    @role('director')
                    <div class="enfermeria animated fadeIn d-none @yield('enrol')">
                    @endrole

                    <li class="g_heading">Enfermeria</li>
                    <li class="@yield('facturacion')"><a href="{{ route('lista_cirugias') }}"><i class="fa fa-list"></i>&nbsp;&nbsp;<span>Lista de Cirug??as</span></a></li>
                </div>
                @endrole



                <!-- Se agreg?? el @yield('iorol') para lograr el funcionamiento del left-sidebar y nav-bar-->
                @role('in-out')
                <div class="">
                    @role('director')
                    <div class="inout animated fadeIn d-none @yield('iorol')">
                    @endrole
                <li class="g_heading">In-Out</li>
                <li @yield('cites')>
                    <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="fa fa-users"></i>&nbsp;&nbsp;<span>Pacientes</span></a>
                        <ul>
                            <li class="@yield('dia')"><a href="{{ route('in-out.day') }}"><i class="fa fa-list"></i><span>Cirugias del Dia</span></a></li>
                            <li class="@yield('lista')"><a href="{{ route('in-out.index') }}"><i class="fa fa-list"></i><span>Todas las Cirugias</span></a></li>
                          </ul>
                    </li>
                <li class="@yield('agendar')"><a href="{{ route('in-out.agendar_cirugia') }}"><i class="fa fa-calendar"></i>&nbsp;&nbsp;<span>Agendar Cirugias</span></a></li>
                {{-- <li class="@yield('facturacion')"><a href="{{ route('in-out.facturacion') }}"><i class="fa fa-money"></i>&nbsp;&nbsp;<span>Facturacion</span></a></li> --}}
                </div>
                @endrole



                <!-- Se agreg?? el @yield('farmarol') para lograr el funcionamiento del left-sidebar y nav-bar-->
                @role('farmaceuta')
                <div class="">
                    @role('director')
                    <div class=" animated fadeIn d-none farma @yield('farmarol')">
                    @endrole
                    <li class="@yield('farma')">
                        <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="fa fa-thermometer"></i>&nbsp;&nbsp;<span>Insumos</span></a>
                        <ul>
                            <li class="@yield('stock')"><a href="{{ route('farmaceuta.index') }}"><i class="fa fa-list"></i>&nbsp;Stock</a></li>
                            <li class="@yield('stock1')"><a href="{{ route('farmaceuta.lista_lote') }}"><i class="fa fa-list-alt"></i>&nbsp;Stock por lotes</a></li>
                            <li class="@yield('stock2')"><a href="{{ route('farmaceuta.asignacion') }}"><i class="fa fa-user-plus"></i>&nbsp;Asignaci??n</a></li>
                            <li class="@yield('stock3')"><a href="{{ route('farmaceuta.create') }}"><i class="fa fa-archive"></i>&nbsp;Registrar</a></li>
                            <li class="@yield('stock4')"><a href="{{ route('farmaceuta.historial') }}"><i class="fa fa-clock-o">&nbsp;</i>Historial de lotes</a></li>
                        </ul>
                    </li>
                </div>
                @endrole

            </ul>
        </nav>
    </div>
</div>
