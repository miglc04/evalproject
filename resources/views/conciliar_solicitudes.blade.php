@extends('layout')

@section('title', 'Conciliar Solicitudes')

@section('main')
  <h1>Conciliar Solicitudes</h1>

  <div class="container">
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>Sucursal</th>
          <th>Descripcion</th>
          <th>Solicitados</th>
          <th>Recibidos</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="insumo of insumos">
          <td>@{{ insumo.sucursal.nombre }}</td>
          <td>@{{ insumo.descripcion }}</td>
          <td>@{{ insumo.necesarios }}</td>
          <td><input type="number" v-model="insumo.recibidos"></td>
          <td>
            <button type="button" class="btn btn-primary"
              v-on:click="conciliar(insumo)">Conciliar</button>
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
        conciliar(insumo) {
          axios.put('api/insumo/conciliar/' + insumo.id, {recibidos: insumo.recibidos})
          .then(function (response) {
            var conciliacion = response.data.conciliacion;

            if (conciliacion < 0) {
              // Faltantes
              alert('Faltaron ' + (conciliacion * -1) + ' unidades');
            } else if (conciliacion > 0) {
              // Sobrantes
              alert('Sobraron ' + conciliacion + ' unidades');
            } else {
              // Exactos
              alert('Unidades exactas');
            }
          })
          .catch(function (error) {
            console.log(error);
          })
        }
      }
    });
  </script>
@endsection
