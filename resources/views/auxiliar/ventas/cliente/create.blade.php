@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Cliente</h3>
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
			
			{!!Form::open(array('url'=>'almacen-cliente-store','method'=>'POST','autocomplete'=>'off'))!!}
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
                <label for="direccion">Direccion</label>
                <input type="text" name="direccion"  value="{{old('direccion')}}" class="form-control" placeholder="Direccion..." style="text-transform: uppercase;">
            </div>
        </div>
    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    		<div class="form-group">
            	<label>Documento</label>
            	<select name="tipo_documento" class="form-control">
	            		<option value="departamento">Departamento</option>
                        <option value="tienda">Tienda</option>
                        <option value="persona">Persona</option>
                        <option value="vehiculo">Vehiculo</option>
            	</select>
            	
            </div>
    	</div>
    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    		<div class="form-group">
            	<label for="telefono">Telefono</label>
            	<input type="text" name="telefono"  value="{{old('telefono')}}" class="form-control" placeholder="Telefono del Cliente...">
            </div>
    	</div>
    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    		<div class="form-group">
            	<label for="email">Email</label>
            	<input type="text" name="email"  value="{{old('email')}}" class="form-control" placeholder="Email del cliente...">
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