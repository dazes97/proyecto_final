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
		<form method="POST" action="{{ route('usuario.store') }}">
			@csrf
			<div class="form-row">
				<div class="form-group col-6">
					<label>Nombre</label>
					<input type="text" name="name" class="form-control" placeholder="Ingrese su nombre" required>
				</div>
				<div class="form-group col-6">
					<label>Apellidos</label>
					<input type="text" name="lastname" class="form-control" placeholder="Ingrese sus apellidos" required>
				</div>
				<div class="form-group col-6">
					<label>Email</label>
					<input type="email" name="email" class="form-control" placeholder="Ingrese Email" required>
				</div>
				<div class="form-group col-6">
					<label>C.I.(contraseña)</label>
					<input type="number" name="ci" class="form-control" placeholder="Cedula de Identidad" required>
				</div>
				<div class="form-group col-6">
					<label>Fecha de Nacimiento</label>
					<input type="date" name="birthday" class="form-control" placeholder="Fecha de nacimiento" required>
				</div>


			</div>
			<div class="form-row">
				<div class="form-group col-4">
					<label>Direccion</label>
					<input type="text" name="address" class="form-control" placeholder="Ingrese su direccion">
				</div>
				<div class="form-group col-4">
					<label>Telefono</label>
					<input type="number" name="phone" class="form-control" placeholder="Numero de Telefono">
				</div>
				<div class="form-group col-4">
					<label>Rol</label>
					<select id="role" name="role" class="form-control">
						<option value="2">Recepcionista</option>
						<option value="3">Encargado de Laboratorio</option>
						<option value="1">Doctor</option>
					</select>
				</div>
				<div class="form-group col-4" id="specialties" style="display: none">
					<label>Especialidad</label>
					<select id="specialty" name="specialty" class="form-control">
						@foreach($specialties as $specialty)
							<option value="{{$specialty->id}}">{{$specialty->name}}</option>
						@endforeach
					</select>
				</div>
				<script
						src="https://code.jquery.com/jquery-3.3.1.js"
						integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
						crossorigin="anonymous">

				</script>
				<script type="text/javascript">
                    $("#role").change(function(){
						if($(this).val() == 1){
                            $("#specialties").show();
                        }
						else{
                        $("#specialties").hide();
                        }
                    });
				</script>
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