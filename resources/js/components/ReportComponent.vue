<template>
  <div class="row justify-content-center">
    <div class="col-md-11">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-header text-center">Reporte de ventas</div>
            <table style="width: 100%;">
              <thead>
                <tr>
                  <th>Fecha</th>
                  <th>Usuario</th>
                  <th>Producto</th>
                  <th>Valor</th>
                  <th>Cantidad</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="item in report">
                  <td> {{item.created_at}}</td>
                  <td> {{item.nameUser}}</td>
                  <td> {{item.nameProduct}}</td>
                  <td> {{item.pay}}</td>
                  <td> {{item.quantity}}</td>
                  <td> {{item.quantity * item.pay}}</td>
                </tr>
                <tr class="card-header">
                  <th colspan="6">Total: ${{total}} </th>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>
</template>

<script>
  export default {
    props:['report'],
    mounted() {
      this.report.forEach((item, i) => {
        this.total = this.total + (item.quantity * item.pay);
      });
    },
    data(){
      return{
        total: 0
      }
    }
  }
</script>
<style media="screen">
</style>
