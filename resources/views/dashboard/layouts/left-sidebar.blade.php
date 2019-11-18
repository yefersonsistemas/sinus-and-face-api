<div id="left-sidebar" class="sidebar">
    <div class="container">
        <h5 class="brand-name">Sinus & Face System<a href="#" class="menu_option float-right"><i class="icon-grid font-16" data-toggle="tooltip" data-placement="left" title="Grid & List Toggle"></i></a></h5>
        <nav id="left-sidebar-nav" class="sidebar-nav">
            <ul class="metismenu">
                @role('recepcion')
                    <li class="g_heading">Recepcion</li>
                    <li class=""><a href="index.html"><i class="icon-home"></i><span>Dashboard</span></a></li>                        
                    <li class="@yield('cites')">
                        <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="icon-tag"></i><span>Citas</span></a>
                        <ul>
                            <li><a href="icons-feather.html">Nueva Cita</a></li>
                            <li><a href="icons-line.html">Agendadas</a></li>
                            <li><a href="icons-fontawesome.html">Suspendidas</a></li>
                            <li><a href="icons-flags.html">Canceladas</a></li>
                            <li class="@yield('all')"><a href="{{ route('reservation.index') }}">Ver Todas</a></li>
                        </ul>
                    </li>
                    <li><a href="app-calendar.html"><i class="icon-calendar"></i><span>Calendar</span></a></li>
                    <li><a href="app-chat.html"><i class="icon-speech"></i><span>Chat</span></a></li>
                    <li><a href="app-contact.html"><i class="icon-notebook"></i><span>Contact</span></a></li>
                    <li><a href="app-blog.html"><i class="icon-globe"></i><span>Blog</span></a></li>
                @endrole

                    {{-- MODULO DEL LOS DOCTORES --}}
                @role('doctor') 
                    {{-- <li>
                        <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="icon-lock"></i><span>Authentication</span></a>
                        <ul>
                            <li><a href="login.html">Login</a></li>
                            <li><a href="register.html">Register</a></li>
                            <li><a href="forgot-password.html">Forgot password</a></li>
                            <li><a href="404.html">404 error</a></li>
                            <li><a href="500.html">500 error</a></li>   
                        </ul>
                    </li> --}}
                    {{-- <li class="g_heading">Pages</li>
                    <li>
                        <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="icon-tag"></i><span>Icons</span></a>
                        <ul>
                            <li><a href="icons-feather.html">Feather Icons</a></li>
                            <li><a href="icons-line.html">Line Icons</a></li>
                            <li><a href="icons-fontawesome.html">Font Awesome</a></li>
                            <li><a href="icons-flags.html">Flags Icons</a></li>
                            <li><a href="icons-payments.html">Payments Icons</a></li>
                        </ul>
                    </li> --}}
                    {{-- <li>
                        <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="icon-bar-chart"></i><span>Charts</span></a>
                        <ul>
                            <li><a href="charts-apex.html">Charts Apex</a></li>
                            <li><a href="charts-e.html">EChart</a></li>
                            <li><a href="charts-c3.html">C3 Chart</a></li>
                            <li><a href="charts-knob.html">JQuery Knob</a></li>
                            <li><a href="charts-sparkline.html">Sparkline Chart</a></li>
                        </ul>
                    </li> --}}
                    {{-- <li>
                        <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="icon-layers"></i><span>Forms</span></a>
                        <ul>
                            <li><a href="form-elements.html">Basic Elements</a></li>
                            <li><a href="form-advanced.html">Advanced Elements</a></li>
                            <li><a href="form-validation.html">Form Validation</a></li>
                            <li><a href="form-wizard.html">Form Wizard</a></li>
                            <li><a href="form-summernote.html">Summernote</a></li>
                            
                        </ul>
                    </li> --}}
                    {{-- <li>
                        <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="icon-tag"></i><span>Tables</span></a>
                        <ul>
                            <li><a href="table-normal.html">Bootstrap Table</a></li>
                            <li><a href="table-datatable.html">Jquery Datatable</a></li>
                        </ul>
                    </li>                 --}}
                    <li class="g_heading">Funciones</li>
                    <li><a href=""><i class="fe fe-calendar"></i><span>Citas de Pacientes</span></a></li>
                    <li><a href=""><i class="fe fe-list"></i><span>Record de Ingresos</span></a></li>
                    {{-- <li><a href="page-gallery.html"><i class="icon-picture"></i><span>Gallery</span></a></li> --}}
                    {{-- <li>
                        <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="fe fe-file"></i><span>Pages</span></a>
                        <ul>
                            <li><a href="page-empty.html">Empty page</a></li>
                            <li><a href="page-profile.html">Profile</a></li>
                            <li><a href="page-search.html">Search Results</a></li>
                            <li><a href="page-timeline.html">Timeline</a></li>                                
                            <li><a href="page-invoices.html">Invoices</a></li>
                            <li><a href="page-pricing.html">Pricing</a></li>
                            <li><a href="page-carousel.html">Carousel</a></li>                        
                        </ul>
                    </li>       --}}
                @endrole
                {{-- FIN DEL MODULO DE LOS DOCTORES --}}
                
                

            </ul>
        </nav>
    </div>
</div>