	@extends('gestionPaises')
	@section('contenido')
	<div id="pais">
	 <!-- content table -->
	<div class="col md-9">
		<div class="card card-warning">
			<div class="card-header" >
					<h2>Paises</h2>	
					<form>
						<div  class="input-group col-3">

							<button class="btn btn-outline-primary" type="button" >Agregar Pais</button>
						
							<input type="text" class="form-control" placeholder=" Buscar Pais" v-model="buscar" aria-label="search">
						</div>
						
					</form>
			</div>
			<div  class="card-body">
				
				<!-- INICIO DE LA TABLA -->
			<table class="table table-bordered table-hover table-sm">
				<thead>
					<th>#</th>	<!-- el hidden sirve para ocultar la columna o fila -->	
      <th>Nombre del pais</th>
					<th>Acciones</th>
				</thead>
				<tbody>
					<tr v-for="pais in paises">
						<td>@{{pais.id_pais}}</td>
						<td>@{{pais.nombre_pais}}</td>
						<td>
							
							<button type="button" class="btn btn-info" @click="editarPais(pais)">
								<i class="fas fa-edit"></i>Editar Pais
							</button>
							<button type="button" class="btn btn-info" @click="eliminarPais(pais.id_pais)">
								<i class="fas fa-edit"></i>Eliminar Pais
							</button>	 
						</td>
						
					</tr>
				</tbody>
			</table>
			<!-- FIN DE LA TABLA -->
			</div>
		</div>
	</div>
	<!-- /content table -->


	<!-- 	MODAL  -->
	<div class="modal fade" id="modalPais" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel" v-if="agregando==true">AGREGANDO PAIS</h5>
					<h5 class="modal-title" id="exampleModalLabel" v-if="agregando==false">EDITANDO DATOS DEL PAIS</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					
					<h6>NOMBRE DEL PAIS</h6>
					<input type="text" class="form-control" placeholder="Nombre del pais" v-model="nombre_pais"><br>
					@{{nombre_pais}}

					

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
					<button type="button" class="btn btn-success" @click="guardarPais" v-if="agregando==true">Guardar</button>
					<button type="button" class="btn btn-info" @click="actualizarPais()" v-if="agregando==false">Actualizar</button>
				</div>
				</div>
			</div>
	</div>
	<!-- TERMINA VENTANA MODAL -->

	</div>

	@endsection

	@push('js')

	<script src="js/apis/apiPaises.js"></script>

	@endpush

