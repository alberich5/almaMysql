@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Salidas <a href="almacen-venta-crear"><button class="btn btn-success">Nuevo Salida</button></a></h3>
		@include('ventas.venta.search')
	</div>
</div>
<div id="mover">
<form action="{{asset('php/excel/salidas.php')}}" method="get" accept-charset="utf-8">
	<input type="hidden" name="fecha" value="<?php echo date("Y-m-d"); ?>">
	<i class="fa fa-download" aria-hidden="true"><input type="submit" name="" value="excel" class=" btn btn-info"></i>
</form>
			
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Fecha</th>
					<th>Cliente</th>
					<th>Comprobante</th>
					<th>Total</th>
					<th>Estado</th>
					<th>Opciones</th>
				</thead>
               @foreach ($ventas as $ven)
				<tr>
					<td>{{ $ven->fecha_hora}}</td>
					<td>{{ $ven->nombre}}</td>
					<td>{{ $ven->tipo_comprobante.': '.$ven->serie_comprobante.'-'.$ven->num_comprobante}}</td>
					<td>{{ $ven->total_venta}}</td>
					<td>{{ $ven->estado}}</td>
					<td>
						<a href="{{URL::action('VentaController@show',$ven->idventa)}}"><button class="btn btn-primary">Detalle</button></a>
                         <a href="" data-target="#modal-delete-{{$ven->idventa}}" data-toggle="modal"><button class="btn btn-danger">Cancelar</button></a>
					</td>
				</tr>
				@include('ventas.venta.modal')
				@endforeach
			</table>
		</div>
		{{$ventas->render()}}
	</div>
</div>

@endsection