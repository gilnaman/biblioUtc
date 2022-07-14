<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
    <meta name="token" id="token" value="{{ csrf_token() }}" />
  </head>
  <body>
    <div id="app">
      <nav class="navbar bg-light">
        <div class="container">
          <a class="navbar-brand" href="#">
            <img src="https://getbootstrap.com/docs/5.2/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24" />
          </a>
        </div>
      </nav>
      <div class="container mx-auto mt-5 shadow-lg rounded p-2">
        <div class="row">
          <div class="col">
            <h2>Actividades</h2>
          </div>
          <div class="col d-flex justify-content-end">
            <button class="btn btn-primary">Agregar actividad</button>
          </div>
        </div>
        <div class="row p-4">
          <table class="table table-hover text-center">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Actividad</th>
                <th scope="col">Creado</th>
                <th scope="col">Actualizado</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="actividad in actividades" :key="actividad.id_actividad">
                <th scope="row">@{{ actividad.id_actividad }}</th>
                <td>@{{ actividad.actividad }}</td>
                <td>@{{ formatoFecha(actividad.created_at) }}</td>
                <td>@{{ formatoFecha(actividad.updated_at) }}</td>
                <td>
                  <button class="btn btn-warning">Actualizar</button>
                  <button class="btn btn-danger">Eliminar</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script type="module" src="{{ asset('/js/main.js') }}"></script>
  </body>
</html>
