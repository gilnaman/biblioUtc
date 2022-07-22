@extends ('layout.index')
@section('titulo','CRUD Studiantes')
@section('contenido')

<!-- INICIA VUE-->
<div id="mascota">
	<div class="row">
		<div class="col-md-12">
			<div class="card card-warning">
				<div class="card-header">
				<h3>CRUD MASCOTAS
					<samp class="btn btn-sm btn-primary" @click="mostrarModal()">
						<i class="fas fa-plus"></i>

					</samp>
					<br>
					<br>
					<div class="row">
						<div class="col-md-6">
							<input type="text" class="form-control" placeholder="Escriba el nombre del studiante" v-model="buscar">
						</div>
					</div>
				</h3>

				</div>
				<div class="card-body">
								<!--INICO DE LA TABLA-->
			<table class="table table-bordered table-striped">
				<thead>
					<th hidden="">ID Studiante</th>
					<th>nombre</th>
					<th>apellidos</th>
					<th>grupo</th>
					<th>matricula</th>

				</thead>

			<tbody>
				<tr v-for="studiante in filtroMascotas">
					<td hidden="">@{{studiante.id_studiante}}</td>
					<td>@{{studiante.nombre}}</td>
					<td>@{{studiante.apellidos}}</td>
					<td>@{{studiante.grupo}}</td>
					<td>@{{studiante.matricula}}</td>




					<td>
						<button class="btn btn-sm" @click="editandoStudiante(studiante.id_studiante)">
							<i class="fas fa-pen"></i>
						</button>

						<button class="btn btn-sm" @click="eliminarStudiante(studiante.id_studiante)">
							<i class="fas fa-trash"></i>
						</button>
					</td>
				</tr>
			</tbody>
			</table>
			<!--FIN DE LA TABLA-->

				</div>


			</div>
		</div>

	</div>

	<!-- INICIA VENTANA MODAL -->
<div class="modal fade" id="modalMascota" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" v-if="agregando==true">AGREGANDO STUDIANTE</h5>
        <h5 class="modal-title" id="exampleModalLabel" v-if="agregando==false">EDITANDO STUDIANTE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <input type="text" class="form-control" placeholder="Nombre de la mascota" v-model="nombre"><br>
        <input type="number" class="form-control" placeholder="Escriba la edad" v-model="edad"><br>
        <input type="number" class="form-control" placeholder="Escriba el peso" v-model="peso"><br>

        <select class="form-control" v-model="nombre">
        	<option disabled="">Elije un nombre</option>
        	<option value="M">M</option>
        	<option value="H">H</option>
        </select><br>

        <select class="form-control" v-model="id_especie" @change="obtenerStudiante">
        	<option v-for="especie in especies" v-bind:value="especie.id_especie">
        		@{{matricula.matricula}}
            </option>
        </select><br>

        <!-- <h5>estudiante elegida: @{{id_studiante}}</h5> -->

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" @click="guardarStudiante()" v-if="agregando==true">Guardar</button>
        <button type="button" class="btn btn-primary" @click="actualizarStudiante()" v-if="agregando==false">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!--FIN VENTANA MODAL-->


</div>
<!-- TERMINA VUE -->

@endsection

@push('scripts')
<script type="text/javascript" src="js/vue-resource.js"></script>
<script type="text/javascript" src="js/apis/apiMascota.js"></script>

@endpush


<input type="hidden" name="route" value="{{url('/')}}">
