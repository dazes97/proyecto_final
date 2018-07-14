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
	Gestionar Usuario
@stop
@section('content')
<div class="card">
	<div class="card-body">
		<form method="POST" action="{{ route('usuario.update',$user->id) }}">
			@csrf
			{{ method_field('PATCH') }}
			<div class="form-row">
				<div class="form-group col-6">
					<label>Nombre</label>
					<input type="text" name="name" class="form-control" value="{{$user->name}}" required>
				</div>
				<div class="form-group col-6">
					<label>Apellidos</label>
					<input type="text" name="lastname" class="form-control" value="{{$user->lastname}}" required>
				</div>
				<div class="form-group col-6">
					<label>Email</label>
					<input type="email" name="email" class="form-control" value="{{$user->email}}" required readonly>
				</div>
				<div class="form-group col-6">
					<label>C.I.</label>
					<input type="number" name="ci" class="form-control" placeholder="Cedula de Identidad" value="{{$user->ci}}" required>
				</div>
				<div class="form-group col-6">
					<label>Contraseña</label>
					<input type="password" name="password" class="form-control" placeholder="Contraseña">
				</div>
				<div class="form-group col-6">
					<label>Fecha de Nacimiento</label>
					<input type="date" name="birthday" class="form-control" placeholder="Fecha de nacimiento" value="{{$user->birthday}}" required>
				</div>


			</div>
			<div class="form-row">
				<div class="form-group col-4">
					<label>Direccion</label>
					<input type="text" name="address" class="form-control" placeholder="Ingrese su direccion" value="{{$user->address}}">
				</div>
				<div class="form-group col-4">
					<label>Telefono</label>
					<input type="number" name="phone" class="form-control" placeholder="Numero de Telefono" value="{{$user->phone}}">
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