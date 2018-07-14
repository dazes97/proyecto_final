@extends('template.template')
@section('stylelibrary')
    <!-- Bootstrap responsive table CSS -->
    <link href="{{ asset('template/assets/node_modules/tablesaw-master/dist/tablesaw.css') }}" rel="stylesheet">
@stop
@section('style')
    <style>
        .icon-size{
            font-size: 1.5em;
        }
    </style>
@stop
@section('nameCU')
    INICIO
@stop
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
        <div class="card-body">

            <h4 class="card-title">Ultimos Contenidos</h4>
            <table class="table browser m-t-30 no-border">
                <tbody>
                @foreach($contents as $item)
                    <div class="row">
                <tr>
                    <td>
                        <div class="col-md-6">
                            <figure class="figure m-0">
                                <img src="{{ asset($item->image_url) }}" class="img-fluid" alt="A generic square placeholder image with rounded corners in a figure.">
                            </figure>
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->title }}</h5>
                                <p class="card-text scrollspy-example">
                                    {{ $item->description }}
                                </p>
                            </div>
                            <div class="">
                                <a href="{{ route('contenido.show',$item->id) }}" class="btn btn-info">
                                    mostrar mas ...
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
                    </div>
                @endforeach

                </tbody>
            </table>

        </div>
    </div>
        </div>
        <div class="col-md-6">
            <div class="card">
        <div class="card-body">

            <h4 class="card-title">Tareas Asignadas</h4>
            <table class="table browser m-t-30 no-border">
                <tbody>
                <tr>
                    @foreach($my_tasks as $my_task)
                        <td>{{$my_task->description}}</td>
                    @endforeach
                </tr>
                </tbody>
            </table>

        </div>
    </div>
        </div>
    </div>
    <br>
    <h2>Favoritos</h2>
    <br>
    <div class="row">
        <div class="col-md-6">
            @foreach($favorites as $favorite)
                <a href="{{$favorite->url}}"><button class="btn-dark">{{$favorite->name}}</button></a>
            @endforeach
        </div>
    </div>
@stop
@section('scripts')
    <!-- This is data table -->
    <script src="{{ asset('template/assets/node_modules/datatables/jquery.dataTables.min.js') }}"></script>
    <!-- start - This is for export functionality only -->
    <script src="{{ asset('cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js') }}"></script>
    <script src="{{ asset('cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js') }}"></script>
    <!-- end - This is for export functionality only -->
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
            $(document).ready(function() {
                var table = $('#example').DataTable({
                    "columnDefs": [{
                        "visible": false,
                        "targets": 2
                    }],
                    "order": [
                        [2, 'asc']
                    ],
                    "displayLength": 25,
                    "drawCallback": function(settings) {
                        var api = this.api();
                        var rows = api.rows({
                            page: 'current'
                        }).nodes();
                        var last = null;
                        api.column(2, {
                            page: 'current'
                        }).data().each(function(group, i) {
                            if (last !== group) {
                                $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                                last = group;
                            }
                        });
                    }
                });
                // Order by the grouping
                $('#example tbody').on('click', 'tr.group', function() {
                    var currentOrder = table.order()[0];
                    if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                        table.order([2, 'desc']).draw();
                    } else {
                        table.order([2, 'asc']).draw();
                    }
                });
            });
        });
        $('#example23').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    </script>
@stop