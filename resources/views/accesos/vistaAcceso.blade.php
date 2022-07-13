<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

	<!-- Bootstrap CSS v5.2.0-beta1 -->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/bootstrap/bootstrap.css')}}">

	<style>
		.img-logo {
			object-fit: cover;
			object-position: center;
			width: 80px;
			margin-top: auto;
			margin-bottom: auto;
		}
	</style>

	<script src="{{asset('vue/vue.js')}}"></script>
</head>

<body style="background: #eaeaea; overflow: hidden;">

	<div id="auth">
		<div class="row p-4 p-lg-0" style="height: 100vh;">

			<div class="col-12 col-md-8 col-lg-6 offset-0 offset-md-2 offset-lg-3 align-self-center p-0 p-lg-4">

				<!-- Alerta Correcta -->
				<div class="col-12" v-if="banner == 1">
					<div class="alert alert-primary alert-dismissible fade show" role="alert">
						<button type="button" class="btn-close"data-bs-dismiss="alert" aria-label="Close"></button>

						<strong>Correcto!</strong> Datos registrados con éxito puede pasar.
					</div>
				</div>

				<!-- Alerta Error -->
				<div class="col-12" v-if="banner == 0">
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<button type="button" class="btn-close"data-bs-dismiss="alert" aria-label="Close"></button>

						<strong>Error!</strong> Ocurrio un error intente de nuevo o recargue la pagina.
					</div>
				</div>
			


		<div class="card">
			<div class="card-header mb-12 mb-lg-0">
			<div class="">
				<figure class="float-start">
					<img src="{{ asset('logo.png')}}" class="img-logo" alt="Logo UTC">
				</figure>
				<h4 class="text-center my-2">Ingrese sus credenciales</h4>
			</div>
		  </div>

		  <div class="card-body p-0 pb-4 p-lg-4">
		  	<div class="px-4">
		  		<label class="mb-2">Nombre de usuario</label>
		  		<div class="input-group">
		  			<span class="input-group-text">@</span>
		  			<input type="text" :class="{ 'is-invalid': erroresValidacion.matricula != null }" class="form-control" placeholder="Ingrese su matricula escolar" v-model="data.matricula">
		  		</div>
		  		<span class="text-danger text-sm" v-if="erroresValidacion.matricula">@{{ erroresValidacion.matricula }}</span>
		  	</div>

		  	<button type="button" class="btn btn-primary btn-block float-end mt-4 me-4" @click.prevent="validarMatricula()">Acceder</button>
		  </div>
		</div>

	 </div>

</div>



		<!-- Start Modal -->
		<div class="modal fade" id="modalAccion" tabindex="-1" role="dialog" aria-labelledby="Modal_acciones" aria-hidden="true">

			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title"> Bienvenido @{{ nombreUser }}</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>


					<div class="modal-body">
						<select :class="{ 'is-invalid': erroresValidacion.actividad != null }" class="form-control" name="actividad" v-model="data.actividad">

						<!-- Cargar la vista usando Laravel -->
						<option value="-1" selected>SELECIIONE UNA OPCIÓN</option>

						@foreach ($actividades as $actividad)
							<option value="{{ $actividad->id_actividad }}"> {{ $actividad->actividad }} </option>
						@endforeach
						</select>


						<span class="text-danger text-sm" v-if="erroresValidacion.actividad">@{{ erroresValidacion.actividad }}</span>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" @click="resetUI">Cerrar</button>

						<button type="button" class="btn btn-primary" @click.prevent="mandarRespuesta">Enviar</button>
					</div>
				</div>
			</div>
	 
    </div> <!-- Fin de Modal-->

</div> <!-- Fin de auth-->


	<!-- Bootstrap JavaScript Libraries -->
	<script src="{{asset('assets/popper/popper.min.js')}}"></script>
	<script src="{{asset('assets/bootstrap/bootstrap.js')}}"></script>
	<script src="{{asset('assets/jquery/jquery.min.js')}}"></script>
	<script src="{{asset('vue/auth.js')}}"></script>
	 <script src="{{ asset('vue/vue-resource.js') }}"></script>


</body>
</html>