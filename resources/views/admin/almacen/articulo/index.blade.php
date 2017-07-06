@extends ('admin.layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Articulos <a href="almacen-articulo-crear"><button class="btn btn-success">Nuevo Articulo</button></a></h3>
		@include('admin.almacen.articulo.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>Modelo</th>
					<th>Categoria</th>
					<th>Stock</th>
					<th>Imagen</th>
					<th>Estado</th>
					@if (Auth::user()->name == 'admin')
					<th>Opciones</th>
					@endif
				</thead>
               @foreach ($articulos as $art)
				<tr>
					<td>{{ $art->idarticulo}}</td>
					<td>{{ $art->nombre}}</td>
					<td>{{ $art->codigo}}</td>
					<td>{{ $art->categoria}}</td>
					<td>{{ $art->stock}}</td>
					<td>
						<img src="{{asset('imagenes/articulos/'.$art->imagen)}}" alt="{{ $art->nombre}}" height="100px" width="100px" class="img-thumbnail">
					</td>
					<td>{{ $art->estado}}</td>
					@if (Auth::user()->name == 'admin')
					<td>
						<a href="{{URL::action('ArticuloController@edit',$art->idarticulo)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$art->idarticulo}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
					@endif
				</tr>
				@include('admin.almacen.articulo.modal')
				@endforeach
			</table>
		</div>
		{{$articulos->render()}}
	</div>
</div>

@endsection

