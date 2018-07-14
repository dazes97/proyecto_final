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
	Gestionar Paciente
@stop
@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-flex flex-row-reverse">
			<a href="{{ route('paciente.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Nuevo</a>
		</div>
        <div class="table-responsive">
            <table id="myTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Nacionalidad</th>
                        <th>CI</th>
                        <th>Telefono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($paciente as $pa)
                        <tr>
                            <td>{{ $pa->name }}</td>
                            <td>{{ $pa->nationality }}</td>
                            <td>{{ $pa->ci }}</td>
                            <td>{{ $pa->phone }}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="#!" class="pr-1">
                                        <i class="fa fa-eye icon-size"></i>
                                    </a>
                                    <a href="{{ route('paciente.edit',$pa->id) }}" class="pr-1">
                                        <i class="fa fa-pencil icon-size"></i>
                                    </a>
                                    <a href="#!">
                                        <i class="fa fa-trash icon-size"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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