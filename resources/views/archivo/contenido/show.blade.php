@extends('template.template')
@section('styleLibrary')
@stop
@section('style')
<style type="text/css">
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
<h4 class="text-themecolor">Gestionar Contenido</h4>
@stop
@section('buttonCU')
<a href="{{ route('contenido.create') }}" class="btn btn-primary">
	<i class="fa fa-plus"></i>
</a>
@stop
@section('content')
<div class="card">
	<div class="row">
		<div class="col-md-6">
			<figure class="figure m-0">
			  <img src="{{ asset($item->image_url) }}" class="img-fluid" alt="A generic square placeholder image with rounded corners in a figure.">
			</figure>
		</div>
		<div class="col-md-6">
			<div class="card-body">
		      	<h5 class="card-title">{{ $item->title }}</h5>
		      	<p class="card-text">
					{{ $item->description }}
		      	</p>
			</div>
    	</div>
    </div>
</div>
<div class="card">
	<div class="card-body">
		<div class="d-flex justify-content-center">
			<h3>Archivos adjuntos</h3>
		</div>
		@php
	    	$files = $item->files;
	    @endphp
		@foreach ($files as $fi)
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