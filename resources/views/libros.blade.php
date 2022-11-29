@extends('master')

@section('contenido')
<!-- inicia vue ------------------------------>
<div id="librosVue">
    <section class="container fondoTabla">
        <br>
        <div class="row">
          <div class="col-md-3">
            <h3>Gestion de Libros</h3>
          </div>
          <div class="col-md-2">
              <i class="fas fa-book fa-2x"></i>
          </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="" id="" placeholder="Buscar Libro" class="form-control">
            </div>
            <div class="col-md-2">
              <i type="button" class="fas fa-search fa-2x"></i>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-primary">Agregar libro</button>
            </div>
        </div>
        <br>
        
      <div class="row tabla-section">
      <div class="col">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Titulo</th>
              <th scope="col">Fecha de publicaciion</th>
              <th scope="col"># paginas</th>
              <th scope="col">created_at</th>
              <th scope="col">update_at</th>
              <th scope="col">Cutter</th>
              <th scope="col">Dewey</th>
              <th scope="col">Caratula</th>
              <th>Opciones</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>...</td>
              <td>...</td>
              <td>...</td>
              <td>...</td>
              <td>...</td>
              <td>...</td>
              <td>...</td>
              <td>...</td>
              <td><button type="button"><i class="fas fa-edit"></i></button><button type="button"><i class="fas fa-trash"></i></button></td>
            </tr>
          </tbody>
        </table>
        
      </div>
      </div>
    </section>
</div>
<!-- finaliza vue ------------------>
@endsection
@push('scripts')
    <script type="text/javascript" src="js/apis/apiLibro.js"></script>
    <script type="text/javascript" src="js/vue-resource.js"></script>
@endpush