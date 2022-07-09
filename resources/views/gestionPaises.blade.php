<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Paises</title>
  </head>
  <body>
    
  <div id="" div class="col md-3">
		<div class="row">
			<div class="col md-9">
				<div class="card card-warning">
					<div class="card-header" >
							<h2>Paises</h2>	
							<form>
								<div class="input-group col-3">

									<button class="btn btn-outline-primary" type="button" >Agregar Pais</button>
								
									<input type="text" class="form-control" placeholder=" Buscar Pais" v-model="" aria-label="search" type="search">
								</div>
								
							</form>
					</div>
					<div class="card-body">
						
						<!-- INICIO DE LA TABLA -->
					<table class="table table-bordered table-hover table-sm">
						<thead>
							<th>#</th>	<!-- el hidden sirve para ocultar la columna o fila -->	
                            <th>Nombre del pais</th>
							<th>Acciones</th>
						</thead>
						<tbody>
							<tr >
								<td></td>
								<td></td>
								<td></td>
								
								
							</tr>
						</tbody>
					</table>
					<!-- FIN DE LA TABLA -->
					</div>
				</div>
			</div>
		</div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

   
  </body>
</html>