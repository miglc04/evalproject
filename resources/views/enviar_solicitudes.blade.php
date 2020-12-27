@extends('layout')

@section('title', 'Enviar Solicitudes')

@section('main')
  <h1>Enviar Solicitudes</h1>

  <div class="container">
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>Sucursal</th>
          <th>Descripcion</th>
          <th>Cantidad</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(insumo, index) of insumos">
          <td>@{{ insumo.sucursal.nombre }}</td>
          <td>@{{ insumo.descripcion }}</td>
          <td>@{{ insumo.necesarios }}</td>
          <td>
            <button type="button" class="btn btn-primary"
              v-on:click="enviarSolicitud(insumo, index)">Enviar</button>
          </td>
        </tr>
      </tbody>
    </table>

    {{ $insumos->links() }}
  </div>
@endsection

@section('scripts')
  <script type="text/javascript">
    var insumos = Object.values( {!! json_encode($insumos) !!} )[1];

    const app = new Vue({
      el: ('#app'),
      data: {
        insumos: insumos
      },
      methods: {
        enviarSolicitud(insumo, index) {
          insumo.enviado = 1;
          axios.put('api/insumo/' + insumo.id, {params: insumo})
          .then(function (response) {
            alert("Solicitud enviada");
            this.insumos.splice(index, 1);
          })
          .catch(function (error) {
            console.log(error);
          })
        }
      }
    });
  </script>
@endsection
