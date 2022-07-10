@extends ('layout.layoutIndex')
@section('titulo','Interface de Ventas')
@section('contenido')

<div id="Producto">

	<!--Empieza el contenido -->
	<div class="row">
		<div class="col-md-12">
			<div class="card card-warning">
				<div class="card-header bg-primary ">
				<h4>Tabla de Productos
				<samp class="btn btn-primary" @click="mostrarModal()" >
						<i class="fa fa-plus-square fa-2x" ></i>
						
					</samp>
					
				</h4>
				
				</div>
				<div class="card-body">
								<!--INICO DE LA TABLA-->
			<table class="table table-bordered table-striped">
				<thead>
					<th hidden="">ID COLECCION</th>
					<th>NOMBRE</th>
                    <TH>OPCIONES</TH>
				
				</thead>

			<tbody>
				<tr v-for="producto in productos">
					<td hidden=""></td>
					<td>#</td>
					
					
					<td>
						<button class="btn btn-sm" @click="#" >
							<i class="fas fa-pen" ></i>
						</button>

						<button class="btn btn-sm" @click="#" >
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
	<!--Fin del contenido -->

	
	<!-- INICIA VENTANA MODAL -->
	<div class="modal fade" id="modalProducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" v-if="#">Agregar coleccion</h5>
		<h5 class="modal-title" id="exampleModalLabel" v-if="#" >Actualizar coleccion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button"  class="btn btn-primary" @click="#" v-if="#">Guardar coleccion</button>
		<button type="button"  class="btn btn-primary" @click="#" v-if="#">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>
<!--FIN VENTANA MODAL-->
		
</div>

@endsection

@push('scripts') 
<script type="text/javascript" src="#"></script>
<script type="text/javascript" src="#"></script>

@endpush


<input type="hidden" name="route" value="#">