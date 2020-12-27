@extends('layout')

@section('title', 'Capturar Insumos')

@section('main')
  <h1>Capturar Insumos</h1>

  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <label for="sucursal">Sucursal</label>
          <select name="sucursal" class="form-control" id="sucursal_id"
            v-model="insumo.sucursal_id">
            <option value="0">---</option>
            @foreach($sucursales as $sucursal)
              <option value="{{ $sucursal->id }}">{{ $sucursal->nombre }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="descripcion">Insumo</label>
          <input type="text" class="form-control" id="descripcion" autocomplete="off"
            v-model="insumo.descripcion">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="necesarios">Cantidad requerida</label>
          <input type="number" class="form-control" id="necesarios" min="1"
            v-model="insumo.necesarios">
        </div>
      </div>
    </div>
    <button class="btn btn-primary" v-on:click="guardar">Guardar</button>
  </div>
@endsection

@section('scripts')
  <script type="text/javascript">
    const app = new Vue({
      el: ('#app'),
      data: {
        insumo: {
          descripcion: '',
          necesarios: 0,
          sucursal_id: 0
        }
      },
      methods: {
        guardar() {
          if (!this.validarSucursal() || !this.validarDescripcion() ||
            !this.validarNecesarios() ) {
            return
          }

          var vm = this

          axios.post('/api/insumo', { params: vm.insumo })
          .then(function (response) {
            alert('Solicitud capturada');
            vm.limpiar();
          })
          .catch(function (error) {
            console.log(error)
          })
        },
        validarSucursal() {
          if (this.insumo.sucursal_id == 0) {
            return alert('Debes seleccionar una sucursal');
          }
          return true;
        },
        validarDescripcion() {
          if (this.insumo.descripcion == '') {
            return alert('Debes capturar un insumo');
          }
          return true;
        },
        validarNecesarios() {
          if (this.insumo.necesarios < 1) {
            return alert('La cantidad mínima es 1 unidad');
          }
          return true;
        },
        limpiar() {
          this.insumo.descripcion = '';
          this.insumo.necesarios = 0;
          this.insumo.sucursal_id = 0;
        }
      }
    });
  </script>
@endsection

