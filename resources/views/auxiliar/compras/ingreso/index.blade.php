@extends ('auxiliar.layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Entradas <a href="almacen-ingreso-crear"><button class="btn btn-success">Nueva Entrada</button></a></h3>
		@include('compras.ingreso.search')
	</div>
</div>
<div id="mover">
<form action="{{asset('php/excel/entradas.php')}}" method="get" accept-charset="utf-8">
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
					<th>Proveedor</th>
					<th>Comprobante</th>
					<th>Total</th>
					<th>Estado</th>
					<th>Opciones</th>
				</thead>
               @foreach($ingresos as $ing)
				<tr>
					<td>{{ $ing->fecha_hora}}</td>
					<td>{{ $ing->nombre}}</td>
					<td>{{ $ing->tipo_comprobante.': '.$ing->serie_comprobante.'-'.$ing->num_comprobante}}</td>
					<td>{{ $ing->total}}</td>
					<td>{{ $ing->estado}}</td>
					<td>
						<a href="{{URL::action('IngresoController@show',$ing->idingreso)}}"><button class="btn btn-primary">Detalle</button></a>
                         <a href="" data-target="#modal-delete-{{$ing->idingreso}}" data-toggle="modal"><button class="btn btn-danger">Cancelar</button></a>
					</td>
				</tr>
				@include('auxiliar.compras.ingreso.modal')
				@endforeach
			</table>
		</div>
		{{$ingresos->render()}}
	</div>
</div>

@endsection