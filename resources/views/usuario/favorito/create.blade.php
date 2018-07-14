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
	Administrar Favorito
@stop
@section('content')
<div class="card">
	<div class="card-body">
		<form method="POST" action="{{ route('favoritos.store') }}">
			@csrf
			<div class="form-row">
				<div class="form-group col-12">
					<label>Nombre</label>
					<input type="text" name="name" class="form-control" placeholder="Ingrese Nombre" required>
				</div>

				<div class="form-group col-12">
					<p>Seleccione C.U.</p>
					<select name="url" id="url">
						@if(Auth()->user()->isAdmin())
							<option value="{{route('usuario.index')}}">Gestionar Usuario</option>
							<option value="{{route('suscripcion.index')}}">Gestionar Suscripcion</option>
							<option value="{{route('especialidad.index')}}">Gestionar Especialidad</option>
							<option value="{{route('backup.index')}}">Gestionar Backup</option>
						@endif
							<option value="{{route('estructura.index')}}">Gestionar Estructura</option>
							<option value="{{route('tareas.index')}}">Gestionar Tarea</option>
							<option value="{{route('actividad.index')}}">Visualizar Actividades</option>
							<option value="{{route('paciente.index')}}">Gestionar Paciente</option>
							<option value="{{route('favoritos.index')}}">Administrar Favorito</option>
							<option value="{{route('contenido.index')}}">Gestionar Contenido</option>
							<option value="{{route('historial.index')}}">Visualizar Historial Clinico</option>
							<option value="{{route('repositorio.index')}}">Gestionar Repositorio</option>
					</select>
				</div>
			</div>
			<input type="hidden" name="user_id" value="{{Auth()->id()}}">
			<div class="d-flex flex-row-reverse">
				<button type="submit" class="btn btn-success"><i class="fa fa-pencil"></i> Registrar Favorito</button>
			</div>
		</form>
	</div>
</div>
@stop
@section('scripts')
@stop