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
		<form method="POST" action="{{ route('repositorio.store') }}">
			@csrf
			<div class="form-group row my-0">
				<div class="col-12 col-md-4">
					<label>Nombre</label>
					<input type="text"  class="form-control" name="name" placeholder="Modelo de informe clinicos, recetas ..." required>
				</div>
				<div class="col-12 col-md-6">
					<label>Descripcion</label>
					<textarea name="description" rows="1" class="form-control" placeholder="Descripcion del repositorio"></textarea>
				</div>
				<div class="col-12 col-md d-flex flex-wrap align-items-center justify-content-center">
					<a href="">
						<button type="submit" class="btn btn-primary mt-2"><i class="fa fa-plus size-icon-upload"></i></button>
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
				<a href="{{ route('repositorio.show',$item->id) }}" class="col-2 col-md-1 d-flex justify-content-center align-self-center px-auto pl-lg-2">
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