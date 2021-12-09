<template>
  <tbody>
    <tr>
      <td style="">
        <div v-if="Edit" title="Editar">
          <input class="form-control text-center" type="text" id="" v-model="item.name">
        </div>
        <div v-else> {{item.name}} </div>
      </td>
      <td style="">
        <div v-if="Edit" >
          <input class="form-control text-center" type="text" name="" v-model="item.description">
        </div>
        <div v-else > {{item.description}} </div>
      </td>
      <td style="" >
        <div v-if="Edit" >
          <input class="form-control text-center" type="number" name="" v-model="item.value">
        </div>
        <div v-else > {{item.value}} </div>
      </td>
      <td style="width: 50px;">
        <input type="number" class="form-control text-center" name="" v-model="cant" v-on:change="vtotal">
      </td>
      <td style="width: 100px;">
        <label class="form-control text-center">
          {{total}}
        </label>
      </td>
      <td>
        <!-- <div v-if="Edit" class="btn-group" role="group">
          <button class="btn btn-success btn-sm" title="Guardar" v-on:click="clickUpdate(index)">Guardar</button>
          <button class="btn btn-warning btn-sm" title="Cancelar" v-on:click="clickCancel(index)">Cancelar</button>
        </div> -->
        <button class="btn btn-primary btn-sm m-1" title="Editar" v-on:click="clickAdd">Agregar</button>
      </td>
    </tr>
  </tbody>
</template>

<script>
    export default {
      props: ['item','index'],
      data(){
        return {
          cant: '',
          total: 0,
          Edit: false,
          lastdate: this.item,
          text1: '',
          text2: '',
          text3: '',
          cart: []
        }
      },
      methods: {
        vtotal(){
          if(this.cant <= 0){
            this.cant = 0;
            this.total = '0000';
          }else{
            this.total = this.cant * this.item.value
          }
        },
        clickCancel(index){
          this.Edit = false;
          this.$emit('cancel',this.text1, this.text2, this.text3, index);
        },
        clickAdd(){
          if(this.cant > 0){
            var value = this.item.value;
            const info = {
              id: this.item.id,
              name: this.item.name,
              price: this.item.value,
              quantity: this.cant,
            };
            axios.post('/cardAdd', info)
            .then((response) =>{ this.cart = response.data,
              this.$emit('cart',this.cart);
            });

            axios.get('/totalP')
            .then((response) =>{ this.$emit('totalP',response.data);
            });

          }else{
            alert('Llena el campo cantidad.');
          }
        },
      },
      mounted() {
      }
    }
</script>
<style media="screen">
  #message1{
    display:none;
  }
  #message2{
    display:none;
  }
  #message4{
    display:none;
  }
</style>
