@extends ('auxiliar.layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Articulo</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
		</div>
	</div>
			
            {!!Form::open(['route'=>'almacen-articulo-store','method'=>'POST','autocomplete'=>'off','files'=>'true']) !!} 
            {{Form::token()}}
    <div class="row">
    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    		<div class="form-group">
            	<label for="nombre">Nombre</label>
            	<input type="text" name="nombre" required value="{{old('nombre')}}" class="form-control" placeholder="Nombre..." style="text-transform: uppercase;">
            </div>
    	</div>
    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    		<div class="form-group">
            	<label>Categoria</label>
            	<select name="idcategoria" class="form-control">
	            	@foreach($categorias as $cat)
	            		<option value="{{$cat->idcategoria}}">{{$cat->nombre}}</option>
	            	@endforeach
            	</select>
            	
            </div>
    	</div>
    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    		<div class="form-group">
            	<label for="codigo">Codigo</label>
            	<input type="text" name="codigo" required value="{{old('codigo')}}" class="form-control" placeholder="Codigo del articulo...">
            </div>
    	</div>

    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    		<div class="form-group">
            	<label for="descripcion">Descripcion</label>
            	<input type="text" name="descripcion"  value="{{old('descripcion')}}" class="form-control" placeholder="Descripcion del articulo..." style="text-transform: uppercase;">
            </div>
    	</div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="descripcion">Marca</label>
                <input type="text" name="marca"  value="{{old('marca')}}" class="form-control" placeholder="Marca del articulo..." style="text-transform: uppercase;">
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="descripcion">Fecha</label>
                <input type="date" name="fecha"  class="form-control" value="<?php echo date("Y-m-d");?>">
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="stock">Unidad</label>
                {!! Form::select('unidad', ['BLOC' => 'BLOC',
                                             'BOLSA' => 'BOLSA',
                                             'BOTE' => 'BOTE',
                                             'BULTO' => 'BULTO',
                                             'CAJA' => 'CAJA',
                                             'CIENTO' => 'CIENTO',
                                             'CONO' => 'CONO',
                                             'FOCO' => 'FOCO',
                                             'GALON' => 'GALON',
                                             'INHALADOR' => 'INHALADOR',
                                             'JUEGO' => 'JUEGO',
                                             'KIT' => 'KIT',
                                             'KG' => 'KG',
                                             'LITRO' => 'LITRO',
                                             'MCC' => 'MCC',
                                             'METRO' => 'METRO',
                                             'PAQUETE' => 'PAQUETE',
                                             'PAR' => 'PAR',
                                             'PIEZA' => 'PIEZA',
                                             'ROLLO' => 'ROLLO',
                                             'TUBO' => 'TUBO'],null,['class'=>'form-control']) !!}
            </div>
        </div>
    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    		<div class="form-group">
            	<label for="imagen">Imagen</label>
            	<input type="file" name="imagen"  class="form-control" >
            </div>
    	</div>
    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    		<div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
    	</div>
    </div>

			{!!Form::close()!!}		
            
@endsection