@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Reportes</h3>
	</div>
</div>
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	<label>INICIO</label>
	<input name="agree" type="checkbox" value="1" checked="arv">
	</div>
</div>
<div class="row">
	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
		<form action="{{asset('php/excel/kardes.php')}}" method="get" accept-charset="utf-8">
				{!! Form::label('kardes del mes:') !!}
	    		{!! Form::select('mes', ['JULIO' => 'JUNIO'],null,['class'=>'form-control']) !!}
				<input type="submit" name="" value="Descargar" class="btn btn-primary">
				
		</form>	
	</div>
</div>
@endsection