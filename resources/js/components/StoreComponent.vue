<template>
  <div class="row justify-content-center">
    <div class="col-md-11">
      <div class="row">
        <div class="col-md-4">
          <div class="card">
            <div class="card-header text-center">Productos seleccionados</div>
            <table style="width: 100%;">
              <thead>
                <tr>
                  <th>Producto</th>
                  <th>Valor</th>
                  <th>Cantidad</th>
                  <th>Total</th>
                  <th>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="item in basket" v-if="item.quantity > 0">
                  <td> {{item.name}}</td>
                  <td> {{item.price}}</td>
                  <td style="width: 100px;">
                    <input type="number" class="form-control" v-model="item.quantity" v-on:change="remove(item.id, item.quantity)"> </td>
                  <td> {{item.quantity * item.price}}</td>
                </tr>
                <tr>
                  <td class="text-center" colspan="5">
                    <button type="button" class="btn btn-success my-2" v-on:click="pay">Total a pagar: {{this.totalP}}</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-md-7">
          <div class="card">
            <div class="card-header text-center">Que productos deseas comprar</div>
            <div class="message5 alert alert-danger m-2 text-center" role="alert" id="message5" v-on:click="quit">
              Producto agregardo
            </div>
            <div class="message4 alert alert-success m-2 text-center" role="alert" id="message4" v-on:click="quit">
              Registro editado.
            </div>
            <div class="p-2">
              <table style="width: 100%;">
                <thead>
                  <tr>
                    <th>Producto</th>
                    <th>Descripción</th>
                    <th>Valor</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th></th>
                  </tr>
                </thead>
                <store-products-component v-for="(item, index) in storeProducts"  :key="item.id" :item="item" :index="index" @cart="cart" @totalP="number"> </store-products-component>
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
      var message5 = document.getElementById("message5");
      axios.get('allProducts')
      .then(response => (this.storeProducts = response.data))
    },
    data(){
      return{
        storeProducts: [{
          'id': "",
          'name': "",
          'description': "",
          'value': ""
        }],
        basket:[],
        totalP: 0
      }
    },
    methods:{
      pay(){
        const info ={
          'basket': this.basket,
          'valueT': this.totalP
        };
        axios.post('sale',info).then(result => console.log(result.data))
      },
      remove(id, quantity){
        const data ={
          'id': id,
          'quantity': quantity
        };
        axios.post('remove',data)
        .then(res => this.totalP = res.data)
      },
      number(number){
        this.totalP = number;
      },
      cart(cartList){
        this.basket = cartList;
      },
      quit(){
        message5.setAttribute("style","display: none;");
        message4.setAttribute("style","display: none;");
      }
    }
  }
</script>
<style media="screen">
  #message5{
    display:none;
  }
  #message2{
    display:none;
  }
</style>
