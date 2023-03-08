<template>
 <div class="container my-5">
  <div class="order-completed" v-if="order">
    <h1 class="order-title">Ordine completato con successo</h1>
    <p class="order-details">Grazie, {{ order.customer_name }}. L'ordine numero {{ order.id }} verrà consegnato il prima possibile all'indirizzo {{ order.address }}</p>
  </div>
</div>
</template>

<script>
export default {
  data() {
    return {
      order: null,
    }
  },
  methods: {
    async loadOrder() {
  await axios.get('/api/get-order-id')
    .then(function(response) {
      const order_id = response.data.order_id;
      try {
        axios.get(`/api/order/${order_id}`)
          .then(function(response) {
            const orderx = response.data.orderRecap;
            this.order = orderx;
            console.log('4',this.order);
          }.bind(this));
      } catch (error) {
        console.log(error);
      }
    }.bind(this))
    .catch(function(error) {
      console.log(error);
    }.bind(this));
}
  },
  mounted() {
    this.loadOrder();
}
}
</script>

<style lang="scss" scoped>
.order-completed {
  background-color: #ebebeb;
  border-radius: 10px;
  padding: 30px;
  text-align: center;

  .order-title {
    font-size: 3.5rem;
    color: #000;
    margin-bottom: 30px;
  }

  .order-details {
    font-size: 1.5rem;
    color: #484848;
  }
}
</style>
