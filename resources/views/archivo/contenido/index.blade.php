@extends('template.template')
@section('stylelibrary')
@stop
@section('style')
<style>
.scrollspy-example {
    position: relative;
    height: 5.8em;
    margin-top: .5rem;
    overflow: auto;
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
@foreach ($content as $item)
	<div class="card">
		<div class="row">
			<div class="col-6 col-md-6 col-lg-4 pr-md-0">
				<figure class="figure m-0">
				  <img src="{{ asset($item->image_url) }}" class="img-fluid" alt="A generic square placeholder image with rounded corners in a figure.">
				</figure>
			</div>
			<div class="col-12 col-md-6 col-lg-8 pl-md-0">
				<div class="card-body">
			      	<h5 class="card-title">{{ $item->title }}</h5>
			      	<p class="card-text scrollspy-example">
						{{ $item->description }}
			      	</p>
				</div>
				<div class="card-footer d-flex justify-content-end">
			      <a href="{{ route('contenido.show',$item->id) }}" class="btn btn-info">
			      	mostrar mas ...
			      </a>
			    </div>
	    	</div>
		</div>
	</div>
@endforeach

@stop
@section('scripts')
@stop