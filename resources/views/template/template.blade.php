<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">



<!-- Mirrored from eliteadmin.themedesigner.in/demos/bt4/eliteadmin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 May 2018 16:57:02 GMT -->
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('template/assets/images/favicon.png')}}">
    <title>MedicalDocs | Sistema de Gestion Documental para entornos clinicos</title>
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="{{asset('template/assets/node_modules/morrisjs/morris.css')}}" rel="stylesheet">
    <!--Toaster Popup message CSS -->
    <link href="{{asset('template/assets/node_modules/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
    @yield('styleLibrary')
    <!-- Custom CSS -->
    <link href="{{asset('template/dist/css/style.min.css')}}" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="{{asset('template/dist/css/pages/dashboard1.css')}}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
<style type="text/css">
    .container-radio {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 15px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default radio button */
.container-radio input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 20px;
    width: 20px;
    background-color: #eee;
    border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.container-radio:hover input ~ .checkmark {
    background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.container-radio input:checked ~ .checkmark {
    background-color: #2196F3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the indicator (dot/circle) when checked */
.container-radio input:checked ~ .checkmark:after {
    display: block;
}

/* Style the indicator (dot/circle) */
.container-radio .checkmark:after {
    top: 6px;
    left: 6px;
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: white;
}
    body{
            font-size: {{ (Auth()->user()->style == null)? 15:Auth()->user()->style->fontsize}}px;
        }
        .siPersonalizacion{
            background: {{ (Auth()->user()->style == null)? "":Auth()->user()->style->theme->navbar}};
        }
        .left-sidebar{
            background: {{ (Auth()->user()->style == null)? "":Auth()->user()->style->theme->asidebar }}
        }
</style>
    @yield('style')
</head>

<body class="skin-blue fixed-layout">
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <div class="loader">
        <div class="loader__figure"></div>
        <p class="loader__label">S.I.D.O.E.C.</p>
    </div>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark siPersonalizacion">
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html">
                    <!-- Logo icon --><b>
                        <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                        <!-- Dark Logo icon -->
                        <img src="{{asset('template/assets/images/logo-icon.png')}}" alt="homepage" class="dark-logo" />
                        <!-- Light Logo icon -->
                        <img src="{{asset('template/assets/images/logo-light-icon.png')}}" alt="homepage" class="light-logo" />
                    </b>
                    <!--End Logo icon -->
                    <!-- Logo text --><span>
                         <!-- dark Logo text -->
                         <img src="{{asset('template/assets/images/logo-text.png')}}" alt="homepage" class="dark-logo" />
                        <!-- Light Logo text -->
                         <img src="{{asset('template/assets/images/logo-light-text.png')}}" class="light-logo" alt="homepage" /></span> </a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <div class="navbar-collapse">
                <!-- ============================================================== -->
                <!-- toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav mr-auto">
                    <!-- This is  -->
                    <li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                    <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
                    <!-- ============================================================== -->
                    <!-- Search -->
                    <!-- ============================================================== -->
                    <li class="nav-item">
                        <form class="app-search d-none d-md-block d-lg-block">
                            <input type="text" class="form-control" placeholder="Buscar">
                        </form>
                    </li>
                </ul>
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
                <ul class="navbar-nav my-lg-0">
                    <!-- ============================================================== -->
                    <!-- Comment -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="ti-email"></i>
                            <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown">
                            <ul>
                                <li>
                                    <div class="drop-title">Notifications</div>
                                </li>
                                <li>
                                    <div class="message-center">
                                        <!-- Message -->
                                        <a href="javascript:void(0)">
                                            <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                                            <div class="mail-contnet">
                                                <h5>Luanch Admin</h5> <span class="mail-desc">Just see the my new admin!</span> <span class="time">9:30 AM</span> </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="javascript:void(0)">
                                            <div class="btn btn-success btn-circle"><i class="ti-calendar"></i></div>
                                            <div class="mail-contnet">
                                                <h5>Event today</h5> <span class="mail-desc">Just a reminder that you have event</span> <span class="time">9:10 AM</span> </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="javascript:void(0)">
                                            <div class="btn btn-info btn-circle"><i class="ti-settings"></i></div>
                                            <div class="mail-contnet">
                                                <h5>Settings</h5> <span class="mail-desc">You can customize this template as you want</span> <span class="time">9:08 AM</span> </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="javascript:void(0)">
                                            <div class="btn btn-primary btn-circle"><i class="ti-user"></i></div>
                                            <div class="mail-contnet">
                                                <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <a class="nav-link text-center link" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- ============================================================== -->
                    <!-- End Comment -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Messages -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="icon-note"></i>
                            <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                        </a>
                        <div class="dropdown-menu mailbox dropdown-menu-right animated bounceInDown" aria-labelledby="2">
                            <ul>
                                <li>
                                    <div class="drop-title">You have 4 new messages</div>
                                </li>
                                <li>
                                    <div class="message-center">
                                        <!-- Message -->
                                        <a href="javascript:void(0)">
                                            <div class="user-img"> <img src="{{asset('template/assets/images/users/1.jpg')}}" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                            <div class="mail-contnet">
                                                <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span> </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="javascript:void(0)">
                                            <div class="user-img"> <img src="{{asset('template/assets/images/users/2.jpg')}}" alt="user" class="img-circle"> <span class="profile-status busy pull-right"></span> </div>
                                            <div class="mail-contnet">
                                                <h5>Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span> </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="javascript:void(0)">
                                            <div class="user-img"> <img src="{{asset('template/assets/images/users/3.jpg')}}" alt="user" class="img-circle"> <span class="profile-status away pull-right"></span> </div>
                                            <div class="mail-contnet">
                                                <h5>Arijit Sinh</h5> <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span> </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="javascript:void(0)">
                                            <div class="user-img"> <img src="{{asset('template/assets/images/users/4.jpg')}}" alt="user" class="img-circle"> <span class="profile-status offline pull-right"></span> </div>
                                            <div class="mail-contnet">
                                                <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <a class="nav-link text-center link" href="javascript:void(0);"> <strong>See all e-Mails</strong> <i class="fa fa-angle-right"></i> </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- ============================================================== -->
                    <!-- End Messages -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- mega menu -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- End mega menu -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- User Profile -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown u-pro">
                        <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{asset('template/assets/images/users/1.jpg')}}" alt="user" class=""> <span class="hidden-md-down">{{ Auth()->user()->name }} &nbsp;<i class="fa fa-angle-down"></i></span> </a>
                        <div class="dropdown-menu dropdown-menu-right animated flipInY">
                            <!-- text-->
                            <a href="javascript:void(0)" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                            <!-- text-->
                            <a href="javascript:void(0)" class="dropdown-item"><i class="ti-wallet"></i> My Balance</a>
                            <!-- text-->
                            <a href="javascript:void(0)" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
                            <!-- text-->
                            <div class="dropdown-divider"></div>
                            <!-- text-->
                            <a href="javascript:void(0)" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
                            <!-- text-->
                            <div class="dropdown-divider"></div>
                            <!-- text-->
                            <a href="{{ route('logout') }}" class="dropdown-item"><i class="fa fa-power-off"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}</i></a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <!-- text-->

                        </div>
                    </li>
                    <!-- ============================================================== -->
                    <!-- End User Profile -->
                    <!-- ============================================================== -->
                    <li class="nav-item right-side-toggle"> <a class="nav-link  waves-effect waves-light" href="javascript:void(0)"><i class="ti-settings"></i></a></li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li class="user-pro"> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><img src="{{asset('template/assets/images/users/1.jpg')}}" alt="user-img" class="img-circle"><span class="hide-menu">{{Auth()->user()->name}}</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="javascript:void(0)"><i class="ti-user"></i> My Profile</a></li>
                            <li><a href="javascript:void(0)"><i class="ti-wallet"></i> My Balance</a></li>
                            <li><a href="javascript:void(0)"><i class="ti-email"></i> Inbox</a></li>
                            <li><a href="javascript:void(0)"><i class="ti-settings"></i> Account Setting</a></li>
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}</a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </ul>
                    </li>
                    <li class="nav-small-cap">&nbsp MODULOS</li>
                    @if(Auth()->User()->isAdmin())
                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-speedometer"></i><span class="hide-menu">Paquete Administracion</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{route('suscripcion.index')}}">Gestionar Suscripcion</a></li>
                            <li><a href="{{route('usuario.index')}}">Gestionar Usuario</a></li>
                            <li><a href="#">Gestionar Grupos</a></li>
                            <li><a href="#">Gestionar Privilegios</a></li>
                            <li><a href="{{route('backup.index')}}">Gestionar Backups</a></li>
                            <li><a href="{{route('especialidad.index')}}">Gestionar Especialidad Médica</a></li>
                        </ul>
                    </li>
                    @endif
                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu">Paquete Usuario</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{ route('estructura.index') }}">Gestionar Estructura</a></li>
                            <li><a href="{{route('tareas.index')}}">Gestionar Tarea</a></li>
                            <li><a href="#">Visualizar Notificaciones</a></li>
                            <li><a href="{{route('actividad.index')}}">Visualizar Actividades</a></li>
                            <li><a href="{{ route('paciente.index') }}">Gestionar Paciente</a></li>
                            <li><a href="{{route('favoritos.index')}}">Administrar Favorito</a></li>
                        </ul>
                    </li>
                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu">Paquete Archivo</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{ route('contenido.index') }}">Gestionar Contenido</a></li>         
                            <li><a href="#">Gestionar Version de Archivos</a></li>
                            <li><a href="{{ route('historial.index') }}">Visualizar Historial Clínico</a></li>
                            <li><a href="{{ route('repositorio.index') }}">Gestionar Repositorio</a></li>
                        </ul>
                    </li>
                    <!--
                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-email"></i><span class="hide-menu">Inbox</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="app-email.html">Mailbox</a></li>
                            <li><a href="app-email-detail.html">Mailbox Detail</a></li>
                            <li><a href="app-compose.html">Compose Mail</a></li>
                        </ul>
                    </li>
                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-palette"></i><span class="hide-menu">Ui Elements <span class="badge badge-pill badge-primary text-white ml-auto">25</span></span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="ui-cards.html">Cards</a></li>
                            <li><a href="ui-user-card.html">User Cards</a></li>
                            <li><a href="ui-buttons.html">Buttons</a></li>
                            <li><a href="ui-modals.html">Modals</a></li>
                            <li><a href="ui-tab.html">Tab</a></li>
                            <li><a href="ui-tooltip-popover.html">Tooltip &amp; Popover</a></li>
                            <li><a href="ui-tooltip-stylish.html">Tooltip stylish</a></li>
                            <li><a href="ui-sweetalert.html">Sweet Alert</a></li>
                            <li><a href="ui-notification.html">Notification</a></li>
                            <li><a href="ui-progressbar.html">Progressbar</a></li>
                            <li><a href="ui-nestable.html">Nestable</a></li>
                            <li><a href="ui-range-slider.html">Range slider</a></li>
                            <li><a href="ui-timeline.html">Timeline</a></li>
                            <li><a href="ui-typography.html">Typography</a></li>
                            <li><a href="ui-horizontal-timeline.html">Horizontal Timeline</a></li>
                            <li><a href="ui-session-timeout.html">Session Timeout</a></li>
                            <li><a href="ui-session-ideal-timeout.html">Session Ideal Timeout</a></li>
                            <li><a href="ui-bootstrap.html">Bootstrap Ui</a></li>
                            <li><a href="ui-breadcrumb.html">Breadcrumb</a></li>
                            <li><a href="ui-bootstrap-switch.html">Bootstrap Switch</a></li>
                            <li><a href="ui-list-media.html">List Media</a></li>
                            <li><a href="ui-ribbons.html">Ribbons</a></li>
                            <li><a href="ui-grid.html">Grid</a></li>
                            <li><a href="ui-carousel.html">Carousel</a></li>
                            <li><a href="ui-date-paginator.html">Date-paginator</a></li>
                            <li><a href="ui-dragable-portlet.html">Dragable Portlet</a></li>
                        </ul>
                    </li>
                    <li class="nav-small-cap">--- FORMS, TABLE &amp; WIDGETS</li>
                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-media-right-alt"></i><span class="hide-menu">Forms</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="form-basic.html">Basic Forms</a></li>
                            <li><a href="form-layout.html">Form Layouts</a></li>
                            <li><a href="form-addons.html">Form Addons</a></li>
                            <li><a href="form-material.html">Form Material</a></li>
                            <li><a href="form-float-input.html">Floating Lable</a></li>
                            <li><a href="form-pickers.html">Form Pickers</a></li>
                            <li><a href="form-upload.html">File Upload</a></li>
                            <li><a href="form-mask.html">Form Mask</a></li>
                            <li><a href="form-validation.html">Form Validation</a></li>
                            <li><a href="form-dropzone.html">File Dropzone</a></li>
                            <li><a href="form-icheck.html">Icheck control</a></li>
                            <li><a href="form-img-cropper.html">Image Cropper</a></li>
                            <li><a href="form-bootstrapwysihtml5.html">HTML5 Editor</a></li>
                            <li><a href="form-typehead.html">Form Typehead</a></li>
                            <li><a href="form-wizard.html">Form Wizard</a></li>
                            <li><a href="form-xeditable.html">Xeditable Editor</a></li>
                            <li><a href="form-summernote.html">Summernote Editor</a></li>
                            <li><a href="form-tinymce.html">Tinymce Editor</a></li>
                        </ul>
                    </li>
                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-accordion-merged"></i><span class="hide-menu">Tables</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="table-basic.html">Basic Tables</a></li>
                            <li><a href="table-layout.html">Table Layouts</a></li>
                            <li><a href="table-data-table.html">Data Tables</a></li>
                            <li><a href="table-footable.html">Footable</a></li>
                            <li><a href="table-jsgrid.html">Js Grid Table</a></li>
                            <li><a href="table-responsive.html">Responsive Table</a></li>
                            <li><a href="table-bootstrap.html">Bootstrap Tables</a></li>
                            <li><a href="table-editable-table.html">Editable Table</a></li>
                        </ul>
                    </li>
                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-settings"></i><span class="hide-menu">Widgets</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="widget-data.html">Data Widgets</a></li>
                            <li><a href="widget-apps.html">Apps Widgets</a></li>
                            <li><a href="widget-charts.html">Charts Widgets</a></li>
                        </ul>
                    </li>
                    <li class="nav-small-cap">--- EXTRA COMPONENTS</li>
                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-gallery"></i><span class="hide-menu">Page Layout</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="layout-single-column.html">1 Column</a></li>
                            <li><a href="layout-fix-header.html">Fix header</a></li>
                            <li><a href="layout-fix-sidebar.html">Fix sidebar</a></li>
                            <li><a href="layout-fix-header-sidebar.html">Fixe header &amp; Sidebar</a></li>
                            <li><a href="layout-boxed.html">Boxed Layout</a></li>
                            <li><a href="layout-logo-center.html">Logo in Center</a></li>
                        </ul>
                    </li>
                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-files"></i><span class="hide-menu">Sample Pages <span class="badge badge-pill badge-info">25</span></span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="starter-kit.html">Starter Kit</a></li>
                            <li><a href="pages-blank.html">Blank page</a></li>
                            <li><a href="javascript:void(0)" class="has-arrow">Authentication <span class="badge badge-pill badge-success pull-right">6</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="pages-login.html">Login 1</a></li>
                                    <li><a href="pages-login-2.html">Login 2</a></li>
                                    <li><a href="pages-register.html">Register</a></li>
                                    <li><a href="pages-register2.html">Register 2</a></li>
                                    <li><a href="pages-register3.html">Register 3</a></li>
                                    <li><a href="pages-lockscreen.html">Lockscreen</a></li>
                                    <li><a href="pages-recover-password.html">Recover password</a></li>
                                </ul>
                            </li>
                            <li><a href="pages-profile.html">Profile page</a></li>
                            <li><a href="pages-animation.html">Animation</a></li>
                            <li><a href="pages-fix-innersidebar.html">Sticky Left sidebar</a></li>
                            <li><a href="pages-fix-inner-right-sidebar.html">Sticky Right sidebar</a></li>
                            <li><a href="pages-invoice.html">Invoice</a></li>
                            <li><a href="pages-treeview.html">Treeview</a></li>
                            <li><a href="pages-utility-classes.html">Helper Classes</a></li>
                            <li><a href="pages-search-result.html">Search result</a></li>
                            <li><a href="pages-scroll.html">Scrollbar</a></li>
                            <li><a href="pages-pricing.html">Pricing</a></li>
                            <li><a href="pages-lightbox-popup.html">Lighbox popup</a></li>
                            <li><a href="pages-gallery.html">Gallery</a></li>
                            <li><a href="pages-faq.html">Faqs</a></li>
                            <li><a href="javascript:void(0)" class="has-arrow">Error Pages</a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="pages-error-400.html">400</a></li>
                                    <li><a href="pages-error-403.html">403</a></li>
                                    <li><a href="pages-error-404.html">404</a></li>
                                    <li><a href="pages-error-500.html">500</a></li>
                                    <li><a href="pages-error-503.html">503</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-pie-chart"></i><span class="hide-menu">Charts</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="chart-morris.html">Morris Chart</a></li>
                            <li><a href="chart-chartist.html">Chartis Chart</a></li>
                            <li><a href="chart-echart.html">Echarts</a></li>
                            <li><a href="chart-flot.html">Flot Chart</a></li>
                            <li><a href="chart-knob.html">Knob Chart</a></li>
                            <li><a href="chart-chart-js.html">Chartjs</a></li>
                            <li><a href="chart-sparkline.html">Sparkline Chart</a></li>
                            <li><a href="chart-extra-chart.html">Extra chart</a></li>
                            <li><a href="chart-peity.html">Peity Charts</a></li>
                        </ul>
                    </li>
                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-light-bulb"></i><span class="hide-menu">Icons</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="icon-material.html">Material Icons</a></li>
                            <li><a href="icon-fontawesome.html">Fontawesome Icons</a></li>
                            <li><a href="icon-themify.html">Themify Icons</a></li>
                            <li><a href="icon-weather.html">Weather Icons</a></li>
                            <li><a href="icon-simple-lineicon.html">Simple Line icons</a></li>
                            <li><a href="icon-flag.html">Flag Icons</a></li>
                        </ul>
                    </li>
                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-location-pin"></i><span class="hide-menu">Maps</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="map-google.html">Google Maps</a></li>
                            <li><a href="map-vector.html">Vector Maps</a></li>
                        </ul>
                    </li>
                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-align-left"></i><span class="hide-menu">Multi level dd</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="javascript:void(0)">item 1.1</a></li>
                            <li><a href="javascript:void(0)">item 1.2</a></li>
                            <li> <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">Menu 1.3</a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="javascript:void(0)">item 1.3.1</a></li>
                                    <li><a href="javascript:void(0)">item 1.3.2</a></li>
                                    <li><a href="javascript:void(0)">item 1.3.3</a></li>
                                    <li><a href="javascript:void(0)">item 1.3.4</a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:void(0)">item 1.4</a></li>
                        </ul>
                    </li>
                    <li class="nav-small-cap">--- SUPPORT</li>
                    <li> <a class="waves-effect waves-dark" href="http://eliteadmin.themedesigner.in/demos/bt4/documentation/documentation.html" aria-expanded="false"><i class="fa fa-circle-o text-danger"></i><span class="hide-menu">Documentation</span></a></li>
                    <li> <a class="waves-effect waves-dark" href="pages-login.html" aria-expanded="false"><i class="fa fa-circle-o text-success"></i><span class="hide-menu">Log Out</span></a></li>
                    <li> <a class="waves-effect waves-dark" href="pages-faq.html" aria-expanded="false"><i class="fa fa-circle-o text-info"></i><span class="hide-menu">FAQs</span></a></li>
                    -->
                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                    <div class="col-sm-5 col-md-5 align-self-center mb-2">
                        @yield('nameCU')
                    </div>
                    <div class="col-sm-7 col-md-7 d-sm-flex flex-row-reverse">
                        @yield('buttonCU')
                    </div>
            </div>
            @yield('content')

            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Info box -->
            <!-- ============================================================== -->


            </div>
            <!-- ============================================================== -->
            <!-- End Info box -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Over Visitor, Our income , slaes different and  sales prediction -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- Comment - table -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- End Page Content -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Right sidebar -->
            <!-- ============================================================== -->
            <!-- .right-sidebar -->
            <div class="right-sidebar">
                <div class="slimscrollright">
                    <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                    <form class="m-2" method="POST" action="{{ route('preferencia.store') }}">
                        @csrf
                        <div class="form-group">
                            <div class="col-12">
                                <label>Tamaño de letra</label>
                                <input type="number" name="fontsize" class="form-control" min="15">
                            </div>
                        </div>
                        <div class="form-group">
                            <h4>Temas</h4>
                            @php
                                $tema = App\Preference::all();
                            @endphp
                            @foreach ($tema as $t)
                                <label class="container-radio">{{ $t->name }}
                                  <input type="radio" name="theme" value="{{ $t->id }}">
                                  <span class="checkmark"></span>
                                </label>
                            @endforeach
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-pencil"></i> Enviar</button>
                        </div>
                    </form>
                    <!--
                    <div class="r-panel-body">
                        <ul id="themecolors" class="m-t-20">
                            <li><b>With Light sidebar</b></li>
                            <li><a href="javascript:void(0)" data-skin="skin-default" class="default-theme">1</a></li>
                            <li><a href="javascript:void(0)" data-skin="skin-green" class="green-theme">2</a></li>
                            <li><a href="javascript:void(0)" data-skin="skin-red" class="red-theme">3</a></li>
                            <li><a href="javascript:void(0)" data-skin="skin-blue" class="blue-theme working">4</a></li>
                            <li><a href="javascript:void(0)" data-skin="skin-purple" class="purple-theme">5</a></li>
                            <li><a href="javascript:void(0)" data-skin="skin-megna" class="megna-theme">6</a></li>
                            <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                            <li><a href="javascript:void(0)" data-skin="skin-default-dark" class="default-dark-theme ">7</a></li>
                            <li><a href="javascript:void(0)" data-skin="skin-green-dark" class="green-dark-theme">8</a></li>
                            <li><a href="javascript:void(0)" data-skin="skin-red-dark" class="red-dark-theme">9</a></li>
                            <li><a href="javascript:void(0)" data-skin="skin-blue-dark" class="blue-dark-theme">10</a></li>
                            <li><a href="javascript:void(0)" data-skin="skin-purple-dark" class="purple-dark-theme">11</a></li>
                            <li><a href="javascript:void(0)" data-skin="skin-megna-dark" class="megna-dark-theme ">12</a></li>
                        </ul>
                    </div>-->
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Right sidebar -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <footer class="footer">
        © 2018 Sistema de Gestion Documental en entornos clinicos
    </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{asset('template/assets/node_modules/jquery/jquery-3.2.1.min.js')}}"></script>
<!-- Bootstrap popper Core JavaScript -->
<script src="{{asset('template/assets/node_modules/popper/popper.min.js')}}"></script>
<script src="{{asset('template/assets/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{asset('template/dist/js/perfect-scrollbar.jquery.min.js')}}"></script>
<!--Wave Effects -->
<script src="{{asset('template/dist/js/waves.js')}}"></script>
<!--Menu sidebar -->
<script src="{{asset('template/dist/js/sidebarmenu.js')}}"></script>
<!--Custom JavaScript -->
<script src="{{asset('template/dist/js/custom.min.js')}}"></script>
<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->
<!--morris JavaScript -->
<script src="{{asset('template/assets/node_modules/raphael/raphael-min.js')}}"></script>
<script src="{{asset('template/assets/node_modules/morrisjs/morris.min.js')}}"></script>
<script src="{{asset('template/assets/node_modules/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
<!-- Popup message jquery
<script src="{{asset('template/assets/node_modules/toast-master/js/jquery.toast.js')}}"></script>
-->
<!-- Chart JS -->
<script src="{{asset('template/dist/js/dashboard1.js')}}"></script>
<script src="{{asset('template/assets/node_modules/toast-master/js/jquery.toast.js')}}"></script>
@yield('scripts')
</body>


<!-- Mirrored from eliteadmin.themedesigner.in/demos/bt4/eliteadmin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 May 2018 16:58:53 GMT -->
</html>