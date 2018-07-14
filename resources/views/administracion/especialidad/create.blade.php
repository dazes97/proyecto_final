@extends('template.template')
@section('stylelibrary')
@stop
@section('style')
<style>
	/* 
		estilos css personalizados que se apliquen en la vista 
	*/
</style>
@stop
@section('nameCU')
	Gestionar Especialidad
@stop
@section('content')
<div class="card">
	<div class="card-body">
		<form method="POST" action="{{ route('especialidad.store') }}">
			@csrf
			<div class="form-row">
				<div class="form-group col-12">
					<label>Nombre de la especialidad</label>
					<input type="text" name="name" class="form-control" placeholder="Ingrese nombre" required>
				</div>
				<div class="form-group col-12">
					<label>Descripcion</label>
					<input type="text" name="description" class="form-control" placeholder="Ingrese Descripcion">
				</div>
			</div>
			<div class="d-flex flex-row-reverse">
				<button type="submit" class="btn btn-success"><i class="fa fa-pencil"></i> Guardar</button>
			</div>
		</form>
	</div>
</div>
@stop
@section('scripts')
@stop