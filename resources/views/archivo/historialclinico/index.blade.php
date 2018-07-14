@extends('template.template')
@section('styleLibrary')
@stop
@section('style')
<style>
	/* 
		estilos css personalizados que se apliquen en la vista 
	*/
</style>
@stop
@section('nameCU')
Historial Clinico
@stop
@section('content')
<div class="card">
	<div class="card-body">
		<form method="POST" action="{{ route('historial.store') }}">
			@csrf
			<div class="row  d-md-flex justify-content-center pt-md-4">
				<div class="form-group col-sm-7">
					<label class="col-12 col-md-4">Elija el Paciente</label>
					<select name="patient" class="form-control col-12 col-md-7">
						@foreach ($patient as $p)
							<option value="{{ $p->id }}"> {{ $p->name }}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group mt-sm-4 pt-sm-2 mt-md-2 mt-lg-0 pt-lg-0">
					<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
				</div>
			</div>
		</form>
	</div>
</div>
@stop
@section('scripts')
@stop