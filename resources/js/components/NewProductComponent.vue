<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card mb-3">
          <div class="card-header text-center">Registrar nuevo producto</div>

          <div class="card-body d-grid gap-2">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-sm" v-on:click="alert" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Registrar
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header card-header">
                    <h5 class="modal-title" id="newProduct">Registrar nuevo producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form v-on:submit.prevent="newProduct()" action="">
                    <div class="alert alert-danger m-2" role="alert" id="message3">
                      Debes llenar todos los campos.
                    </div>

                    <div class="alert alert-success m-2" role="alert" id="message2">
                      Registro guardado.
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
                          <input type="text" class="form-control" id="desc">
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-group mb-3">
                          <span class="input-group-text" >Precio</span>
                          <input type="number" class="form-control" id="value">
                        </div>
                      </div>
                    </div>
                    <div class="card p-2 d-grid gap-2">
                      <button type="submit" class="btn btn-primary btn-sm">Guardar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
    export default {
      data(){
        return {
          required:'border-color:#dc3545;box-shadow: 1px 1px 3px #dc3545;list-style:none;',

        }
      },
      methods: {
        alert(){
          message2.setAttribute("style","display: none;")
        },
        newProduct(){
          var int = 0;
          var exampleModal = document.getElementById('exampleModal');
          var name = document.getElementById('name');
          var desc = document.getElementById('desc');
          var value = document.getElementById('value');

          if(name.value == ""){
            int = int + 1;
            name.setAttribute("style",this.required);
          }else{
            name.setAttribute("style","border-color");
          }
          if(desc.value == ""){
            int = int + 1;
            desc.setAttribute("style",this.required);
          }else{
            desc.setAttribute("style","border-color");
          }
          if(value.value == ""){
            int = int + 1;
            value.setAttribute("style",this.required);
          }else{
            value.setAttribute("style","border-color");
          }

          const info = {
            name: name.value,
            desc: desc.value,
            value: value.value
          };
          var message3 = document.getElementById("message3");
          var message2 = document.getElementById("message2");
          if(int == 0){
            message3.setAttribute("style","display: none;");
            axios.post('/saveProduct', info)
            .then((response) =>{
              this.$emit('new',response.data);
              message2.setAttribute("style","display: flex;")
            }
          );
          }else {
            message3.setAttribute("style","display: flex;");
          }

        }
      },
      mounted() {
      }
    }
</script>
<style media="screen">
  #message3{
    display:none;
  }
  #message2{
    display:none;
  }
</style>
