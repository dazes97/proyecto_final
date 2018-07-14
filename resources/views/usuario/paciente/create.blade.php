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
	Gestionar Paciente
@stop
@section('content')
<div class="card">
	<div class="card-body">
		<form method="POST" action="{{ route('paciente.store') }}">
			@csrf
			<div class="form-row">
				<div class="form-group col-6">
					<label>Nombre Completo</label>
					<input type="text" name="name" class="form-control" placeholder="Ingrese su nombre"></input>
				</div>
				<div class="form-group col-6">
					<label>Fecha de Nacimiento</label>
					<input type="date" name="birthdate" class="form-control" placeholder="fecha"></input>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-6">
					<label>Lugar de Nacimiento</label>
					<input type="text" name="birthplace" class="form-control" placeholder="Santa Cruz - Bolivia"></input>
				</div>
				<div class="form-group col-6">
					<label>CI</label>
					<input type="tel" name="ci" class="form-control" placeholder="Ingrese su ci"></input>
				</div>
			</div>
			
			<div class="form-row">
				<div class="form-group col-4">
					<label>Edad</label>
					<input type="tel" name="age" class="form-control" placeholder="Ingrese su edad"></input>
				</div>
				<div class="form-group col-4">
					<label>Telefono</label>
					<input type="text" name="phone" class="form-control" placeholder="76955889"></input>
				</div>
				<div class="form-group col-4">
					<label>Genero</label>
					<select name="gender" class="form-control">
						<option value="h">Hombre</option>
						<option value="m">Mujer</option>
					</select>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-6">
					<label>Nacionalidad</label>
					<input type="text" name="nationality" class="form-control" placeholder="Boliviana"></input>
				</div>
				<div class="form-group col-6">
					<label>Direccion</label>
					<input type="text" name="address" class="form-control" placeholder="Barrio las Americas..."></input>
				</div>
			</div>
			<div class="d-flex flex-row-reverse">
				<button type="submit" class="btn btn-danger ml-2"><i class="fa fa-pencil"></i> Cancelar</button>
				<button type="submit" class="btn btn-success"><i class="fa fa-pencil"></i> Guardar</button>
			</div>
		</form>
	</div>
</div>
@stop
@section('scripts')
@stop