@extends('template.template')
@section('styleLibrary')
<link rel="stylesheet" href="{{ asset('template/assets/node_modules/dropify/dist/css/dropify.min.css') }}">
@stop
@section('style')
<style>
	.scrollspy-example {
    position: relative;
    height: 5.8em;
    margin-top: .5rem;
    overflow: auto;
	}
</style>
@stop
@section('nameCU')
<h4 class="text-themecolor">Gestionar Contenido</h4>
@stop
@section('buttonCU')
@stop
@section('content')
<div class="card">
    <div class="card-body">
    	<form method="POST" action="{{ route('contenido.store') }}" enctype="multipart/form-data">
    		@csrf
	    	<div class="row">
	        	<div class="col-md-5 col-lg-5">
		            <label>Imagen</label>
		            <input type="file" id="input-file-now-custom-2" name="image" class="dropify" data-height="400">
				</div>
	            <div class="col-md-7 col-lg-7">
					<div class="form-group">
						<label>Titulo</label>
						<input type="text" name="title" class="form-control" placeholder="Ingrese el titulo" required>
					</div>
					<div class="form-group mb-1">
						<label>Contenido</label>
						<textarea class="form-control" placeholder="Ingrese la descripcion" name="description"rows="5" required></textarea>
					</div>
					<div class="form-group mb-1">
						<a href="#!" data-toggle="modal" data-target="#exampleModal">
							<i class="fa fa-plus"></i> Agregar Archivos
						</a>
					</div>
					<div class="form-group scrollspy-example" style="height:150px;">
						<table class="table">
							<thead>
								<tr>
									<th>Accion</th>
									<th>Titulo</th>
									<th>Referencia</th>
								</tr>
							</thead>
							<tbody id="nodoArchivo">
							</tbody>
						</table>
					</div>
				</div>
				<div class="col">
					<button type="submit" class="btn btn-primary">Guardar</button>
				</div>
			</div>
		</form>
    </div>
</div>

<div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Archivos Almacenados</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pt-0">
      	<div class="table-responsive">
	        <table id="myTable" class="table table-bordered table-striped">
	            <thead>
	                <tr>
	                    <th>Titulo</th>
	                    <th>Referencia</th>
	                    <th>Tipo</th>
	                    <th>Accion</th>
	                </tr>
	            </thead>
	            <tbody>
	            	@php
	            		$files = App\File::all()->where('client_id',Auth()->user()->client_id);
	            	@endphp
	            	@foreach ($files as $item)
	            		<tr>
		                    <td>{{ $item->metadata->title }}</td>
		                    <td>{{ $item->metadata->reference }}</td>
		                    <td>{{ $item->typeFile->name }}</td>
		                    <td>
		                    	<a href="#!" class="btn btn-info btn-sm" onclick="AgregarArchivo({{ $item->id }},'{{ $item->metadata->title }}','{{ $item->metadata->reference }}')">
		                    		<i class="fa fa-reply"></i>
		                    	</a>
		                    </td>
		                </tr>
	            	@endforeach
	            </tbody>
	        </table>
    	</div>
  	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@stop
@section('scripts')
<script src="{{ asset('template/assets/node_modules/dropify/dist/js/dropify.min.js') }}"></script>
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
    });
</script>
<script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();
    });
    var i = 1;
    function AgregarArchivo(id, titulo, referencia){
    	/*var nodo = document.createElement("tr");
    	var row ='<td>'+
    				'<input type=hidden value='+id+'/>'+
    				'<a href="#!" onclick="Eliminar(this)" class="btn btn-danger btn-sm"><i class="fa fa-times-circle"></i></a>'+
    			  '</td>'+
    			  '<td>'+titulo+'</td>'+
    			  '<td>'+referencia+'</td>';
    	nodo.innerHTML = row;
    	var nodoPadre = document.getElementById("nodoArchivo");
    	nodoPadre.appendChild(nodo);*/
    	var nodoPadre = document.getElementById("nodoArchivo");
    	var row = nodoPadre.insertRow(0);
 		row.innerHTML = '<td>'+
    				'<input type=hidden name=files['+ i +'] value='+id+'>'+
    				'<a href="#!" onclick="Eliminar(this)" class="btn btn-danger btn-sm"><i class="fa fa-times-circle"></i></a>'+
    			  '</td>'+
    			  '<td>'+titulo+'</td>'+
    			  '<td>'+referencia+'</td>';
    	i++;
    }
    function Eliminar( fila ){
    	var nodo = fila.parentNode.parentNode;
    	nodo.parentNode.removeChild(nodo);
    	console.log(nodo);
    	return;
    }
</script>
@stop