@extends('template.template')
@section('styleLibrary')
	
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
Historial Clinico
@stop
@section('content')
<div class="card">
	<div class="card-body">
		<div class="d-flex justify-content-center my-3">
			<h3 class="font-weight-bold text-muted">{{ $pa->name }}</h3>
		</div>
		@foreach ($str as $item)
			<div class="row elemento-estructura py-0">
				<a href="{{ route('historial.show',["id"=>$item->id,"patient"=>$pa->id]) }}" class="col-2 col-md-1 d-flex justify-content-center align-self-center px-auto pl-lg-2">
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
				<a href="{{ asset($fi->uri) }}" class="col-2 col-md-1 d-flex justify-content-center align-self-center px-auto pl-lg-2">
					<i class="fa fa-file-{{ $fi->typeFile->name }}-o size-icon"></i>
				</a>
				<div class="col-10 col-md-4 pt-3">
					<h4 class="font-weight-bold">{{ $fi->metadata->title }}</h4 class="bold">
				</div>
				<div class="col-9 col-md-5 pt-3">
					<p>{{ $fi->metadata->reference }}</p>
				</div>
				<div class="col-3 col-md-2 pt-3 d-flex align-self-center justify-content-center">
					<p>{{ $fi->metadata->date }}</p>
				</div>
			</div>
		@endforeach
	</div>
</div>
@stop
@section('scripts')
@stop