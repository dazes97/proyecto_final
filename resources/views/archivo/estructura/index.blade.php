@extends('template.template')
@section('styleLibrary')
<link rel="stylesheet" href="{{ asset('template/assets/node_modules/dropify/dist/css/dropify.min.css') }}">
@stop
@section('style')
<style>
	.elemento-estructura{
		border: 0.5px solid #0000002b;
		border-radius: 0.2em;
		/*background: #21252917;*/
	}
	.size-icon{
		font-size: 3em;
	}
	.size-icon-upload{
		font-size: 1.5em;
	}
</style>
@stop
@section('nameCU')
Gestionar Estructura
@stop
@section('content')
<div class="card">
	<div class="card-body">
		<form method="POST" action="{{ route('estructura.store') }}">
			@csrf
			<input type="hidden" name="node" value="{{ $parent }}">
			<div class="form-group row my-0">
				<div class="col-12 col-md-3">
					<label>Nombre</label>
					<input type="text"  class="form-control" name="name" placeholder="Paciente, Historia Clinica, Labo..." required>
				</div>
				<div class="col-12 col-md-3">
					<label>Descripcion</label>
					<textarea name="description" rows="1" class="form-control" placeholder="Informacion sobre todos..."></textarea>
				</div>
				<div class="col-12 col-md-3">
					<label>Pacientes</label>
					<select name="patient_id" class="form-control listPatients">
						<option selected value="-1">------->>>><<<<------</option>
						@foreach ($patient as $pa)
							<option value="{{ $pa->id }}">{{ $pa->name }}</option>
						@endforeach
					</select>
				</div>
				<div class="col-12 col-md-3 d-none" id="patient">
					<label>Almacenamiento</label>
					<select name="type_structure_id" class="form-control">
						@foreach ($type as $t)
							<option value="{{ $t->id }}">{{ $t->name }}</option>
						@endforeach
					</select>
				</div>
				<div class="col-12 col-md d-flex flex-wrap align-items-center justify-content-center">
					<a href="">
						<button type="submit" class="btn btn-primary mt-2"><i class="fa fa-plus size-icon-upload"></i></button>
					</a>
					<a href="#!" class="btn btn-info mt-2 ml-2" data-toggle="modal" data-target=".upload-modal-lg">
						<i class="fa fa-cloud-upload size-icon-upload"></i>
					</a>
				</div>
			</div>
		</form>
	</div>
</div>
<div class="card">
	<div class="card-body">
		@foreach ($nodo as $item)
			<div class="row elemento-estructura py-0">
				<a href="{{ route('estructura.show',$item->id) }}" class="col-2 col-md-1 d-flex justify-content-center align-self-center px-auto pl-lg-2">
					<i class="fa fa-folder-open-o size-icon"></i>
				</a>
				<div class="col-10 col-md-4 pt-2">
					<h4 class="font-weight-bold">{{ $item->name }}</h4 class="bold">
				</div>
				<div class="col-10 col-md-6 pt-2">
					<p>{{ $item->description }}</p>
				</div>
				<div class="col-2 col-md-1 d-flex align-self-center justify-content-center">
					<i class="fa fa-list"></i>
				</div>
			</div>
		@endforeach

		@foreach ($file as $fi)
			<div class="row elemento-estructura py-0">
				<a href="{{ asset($fi->file->uri) }}" class="col-2 col-md-1 d-flex justify-content-center align-self-center px-auto pl-lg-2">
					<i class="fa fa-file-{{ $fi->file->typeFile->name }}-o size-icon"></i>
				</a>
				<div class="col-10 col-md-4 pt-3">
					<h4 class="font-weight-bold">{{ $fi->file->metadata->title }}</h4 class="bold">
				</div>
				<div class="col-9 col-md-5 pt-3">
					<p>{{ $fi->file->metadata->reference }}</p>
				</div>
				<div class="col-3 col-md-2 pt-3 d-flex align-self-center justify-content-center">
					<p>{{ $fi->file->metadata->date }}</p>
				</div>
			</div>
		@endforeach
	</div>
</div>
<!--Carga de documento-->
<div class="modal fade upload-modal-lg" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    	<form method="POST" action="{{ route('cargar.store') }}" enctype="multipart/form-data">
    		@csrf
    		<input type="hidden" name="node" value="{{ $parent }}">
    		<input type="hidden" name="direction" value="{{ $direction }}">
	    	<div class="form-row px-3 mt-3">
	    		<div class="form-group mb-1 col-12 col-md-6">
	    			<label>Titulo</label>
	    			<input type="text" class="form-control" name="title">
	    		</div>
	    		<div class="form-group mb-1 col-12 col-md-6">
	    			<label>Tipo de Archivo</label>
	    			<select class="form-control" name="type_file_id">
	    				@php
	    					$type = App\TypeFile::all();
	    				@endphp
	    				@foreach ($type as $t)
	    					<option value="{{ $t->id }}"> {{ $t->name }}</option>
	    				@endforeach	
	    				
	    			</select>
	    		</div>
	    	</div>
    		<div class="form-group mb-1 col-12 px-3">
	    			<label>Referencia</label>
	    			<input type="text" class="form-control" name="reference">
	    		</div>
	     	<div class="card">
	            <div class="card-body">
	                <h4 class="card-title">Elige tu Archivo</h4>
	                <input type="file" id="input-file-now-custom-2" name="file" class="dropify" data-height="500"/>
	            </div>
	        </div>
	        <div class="d-flex justify-content-center mb-3">
	        	<button type="submit" class="btn btn-info"><i class="fa fa-pencil"></i> Guardar</button>
	        </div>
        </form>
    </div>
  </div>
</div>
@stop
@section('scripts')
<!-- jQuery file upload -->
<script src="{{ asset('template/assets/node_modules/dropify/dist/js/dropify.min.js') }}"></script>
    <script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();
        $('.listPatients').change(function(){
        	var id = $(this).val();
        	var item = $(this).parent().next();
        	if( id != -1){
        		item.removeClass('d-none');
        		item.addClass('d-display');
        	}else{
        		item.removeClass('d-display');
        		item.addClass('d-none');
        	}
        });
    });
    </script>
@stop