<template>
  <div class="modal fade" id="ModalUpdate" tabindex="-1" aria-labelledby="ModalUpdateLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header card-header">
          <h5 class="modal-title" id="newProduct">Editar producto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form v-on:submit.prevent="newProduct()" action="">
          <div class="alert alert-danger m-2" role="alert" id="message3">
            Debes llenar todos los campos.
          </div>

          <div class="alert alert-success m-2" role="alert" id="message2">
            Registro editado.
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="input-group mb-3">
                <span class="input-group-text" >Nombre producto</span>
                <input type="text" class="form-control" id="name">
              </div>
            </div>
            <div class="row">
              <div class="input-group mb-3">
                <span class="input-group-text" >Descripción</span>
                <input type="text" class="form-control" id="desc" >
              </div>
            </div>
            <div class="row">
              <div class="input-group mb-3">
                <span class="input-group-text" >Precio</span>
                <input type="number" class="form-control" id="value" >
              </div>
            </div>
          </div>
          <div class="card p-2 d-grid gap-2">
            <button type="submit" class="btn btn-primary btn-sm">Editar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
    export default {
        mounted() {
        }
    }
</script>
