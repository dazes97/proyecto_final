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
		<form method="POST" action="{{ route('tareas.store') }}">
			@csrf
			<div class="form-row">
				<div class="form-group col-12">
					<label>Descripcion de la tarea</label>
					<input type="text" name="description" class="form-control" placeholder="Ingrese Descripcion" required>
				</div>
				<div class="form-group col-12">
					<label>Fecha de Inicio</label>
					<input type="date" name="start_date" class="form-control" placeholder="">
				</div>
				<div class="form-group col-12">
					<label>Fecha de Finalizacion</label>
					<input type="date" name="finish_date" class="form-control" placeholder="">
				</div>
				<input type="hidden" name="user_id" value="{{Auth()->id()}}">
				<input type="hidden" name="client_id" value="{{Auth()->user()->client_id}}">
				<div class="form-group col-12">
					<p>Tipo de Tarea</p>
					<select name="task_type_id" id="task_type_id">
						@foreach($type_task as $type)
							<option value="{{$type->id}}">{{$type->name}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group col-12">
					<p>Asignar a:</p>
					<select name="user_destiny" id="user_destiny">
						@foreach($users as $user)
							<option value="{{$user->id}}">{{$user->name." ".$user->lastname}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="d-flex flex-row-reverse">
				<button type="submit" class="btn btn-success"><i class="fa fa-pencil"></i> Asignar Tarea</button>
			</div>
		</form>
	</div>
</div>
@stop
@section('scripts')
@stop