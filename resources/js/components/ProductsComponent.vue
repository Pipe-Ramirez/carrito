<template>
  <tbody>
      <tr>
        <th style="width: 10%;">
          <button v-on:click="dropProduct(item.id, index)" class="btn btn-danger btn-sm btn-close" title="Eliminar"></button>
        </th>
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
        <td>
          <div v-if="Edit" class="btn-group" role="group">
            <button class="btn btn-success btn-sm" title="Guardar" v-on:click="clickUpdate(index)">Guardar</button>
            <button class="btn btn-warning btn-sm" title="Cancelar" v-on:click="clickCancel(index)">Cancelar</button>
          </div>
          <button v-else class="btn btn-primary btn-sm m-1" title="Editar" v-on:click="clickEdit">Editar</button>
        </td>
      </tr>
    </tbody>
</template>

<script>
    export default {
      props: ['item','index'],
      data(){
        return {
          Edit: false,
          lastdate: this.item,
          text1: '',
          text2: '',
          text3: ''
        }
      },
      methods: {
        clickCancel(index){
          this.Edit = false;
          this.$emit('cancel',this.text1, this.text2, this.text3, index);
        },
        clickEdit(){
          this.text1 = this.lastdate.name
          this.text2 = this.lastdate.description
          this.text3 = this.lastdate.value
          this.Edit = true;
        },
        clickUpdate(index){
          this.Edit = false;
          this.$emit('update',this.item,index);
        },
        dropProduct(idp, index){
          const info = {
            id: idp
          };
          var message1 = document.getElementById("message1");
            message1.setAttribute("style","display: none;");
            axios.post('/dropProduct', info)
            .then((response) =>{
              this.$emit('new',index);
              message1.setAttribute("style","display: flex;")
            }
          );
        }
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
