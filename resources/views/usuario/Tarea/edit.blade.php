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
	Gestionar Tarea
@stop
@section('content')
	<div class="card">
		<div class="card-body">
			<form method="POST" action="{{ route('tareas.update',$task->id) }}">
				@csrf
				{{ method_field('PATCH') }}
				<div class="form-row">
					<div class="form-group col-12">
						<label>Descripcion de la tarea</label>
						<input type="text" name="description" class="form-control" placeholder="Ingrese Descripcion" value="{{$task->description}}" required>
					</div>
					<div class="form-group col-12">
						<label>Fecha de Finalizacion</label>
						<input type="date" name="finish_date" class="form-control" value="{{$task->finish_date}}">
					</div>
					<div class="form-group col-12">
						<p>Actualizar Estado</p>
						<select name="status" id="status">
							<option value="0">No Empezado</option>
							<option value="1">En Proceso</option>
							<option value="2">Terminado</option>
						</select>
					</div>
				</div>
				<div class="d-flex flex-row-reverse">
					<button type="submit" class="btn btn-success"><i class="fa fa-pencil"></i> Actualizar Tarea</button>
				</div>
			</form>
		</div>
	</div>
@stop
@section('scripts')
@stop