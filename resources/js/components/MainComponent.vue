<template>
  <div>
    <new-product-component @new="push"> </new-product-component>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header text-center">Mis productos</div>
            <div class="message1 alert alert-danger m-2 text-center" role="alert" id="message1" v-on:click="quit">
              Registro eliminado.
            </div>
            <div class="message4 alert alert-success m-2 text-center" role="alert" id="message4" v-on:click="quit">
              Registro editado.
            </div>
            <div class="p-2">
              <table style="width: 100%;">
                <thead>
                  <tr>
                    <th></th>
                    <th>Producto</th>
                    <th>Descripción</th>
                    <th>Valor</th>
                    <th></th>

                  </tr>
                </thead>
                <products-component v-for="(item, index) in products"  :key="item.id" :item="item" :index="index" @new="drop" @update="update" @cancel="cancel"> </products-component>
              </table>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
    export default {
        mounted() {
          axios.get('allProducts')
          .then(response => (this.products = response.data))
        },
        data(){
          return{
            products: [{
              'name': "",
              'description': "",
              'value': ""
            }]
          }
        },
        methods:{
          cancel(text1, text2, text3, index){
            this.products[index]['name'] = text1;
            this.products[index]['description'] = text2;
            this.products[index]['value'] = text3;
          },
          update(data, index){
            var message4 = document.getElementById('message4');
            axios.post('upDateProducts',data)
            .then(response =>
              message4.setAttribute("style","display: flex;")
             )
            this.products[index] = data;
          },
          push(data){
            this.products.push(data);
          },
          drop(data){
            this.products.splice(data,1);
          },
          quit(){
            message1.setAttribute("style","display: none;")
            message4.setAttribute("style","display: none;")
          }
        }
    }
</script>
<style media="screen">
th, td {
   text-align: center;
   /* vertical-align: top; */
   border-bottom: 1px solid #E5E8E8;
}
tr{
  padding: 2px;
}
</style>
