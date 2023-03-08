<template>
    <div class="text-center my-5 altezza">
        <h2>Carrello</h2>
        <div class="container-shop d-flex text-center row row-cols-3 justify-content-center">
            <div class="card card-carrello m-3" v-for="dish in cart" :key="dish.id">
                <div class="card-body col">
                    <h5 class="card-title">{{ dish.name }}</h5>
                    <p class="card-text">{{ dish.price / 100 }} €</p>
                    <div class="m-2">
                        <button @click="decrementItem(dish)" class="btn btn-light">-</button>
                        {{ dish.quantity }}
                        <button @click="incrementItem(dish)" class="btn btn-light">+</button>
                    </div>
                    <div>
                        <button @click="removeFromCart(dish)" class="btn btn-danger">Rimuovi</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center" v-if="cartTotal !== 0">
            <h4>TOTALE:</h4>
            <h6>{{ cartTotal / 100 }} €</h6>
        </div>
        <div v-else>
            <h3>Non ci sono piatti nel tuo carrello</h3>
        </div>
        <div v-if="cartTotal !== 0">
            <div>
                <router-link :to="{name: 'payment', params: {cart: cart}}">
                    <button class="btn btn-success">Procedi con il pagamento</button>
                </router-link>
            </div>
            <div>
                <button @click="clearCart" class="m-2 btn btn-warning">Svuota il carrello</button>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    name: "Cart",
    computed: {
        id() {
            return this.$route.params.id;
        },
        cart() {
            return this.$store.getters.cartItems;
        },
        cartTotal() {
            return this.$store.getters.cartTotal;
        },
    },
    methods: {
        removeFromCart(dish) {
            this.$store.commit("REMOVE_ITEM", dish);
        },
        incrementItem(dish) {
            this.$store.commit("INCREMENT_ITEM_QUANTITY", dish);
        },
        decrementItem(dish) {
            this.$store.commit("DECREMENT_ITEM_QUANTITY", dish);
        },
        clearCart() {
            this.$store.commit("CLEAR_CART");
        },
    },
};
</script>
<style lang="scss" scoped>
.card-carrello {
    width: 30%;
}
.altezza {
    min-height: 48vh;
}

</style>
