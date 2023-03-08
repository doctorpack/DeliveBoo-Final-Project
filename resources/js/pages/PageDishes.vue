<template>
    <div class="bg_img">
        <div class="container text-alight-center">
            <h1 class="text-center text-white p-4">I Nostri Piatti</h1>
            <div class="container ">
                <div class="row row-cols-lg-3 row-cols-md-2 row-cols-sm-2">
                    <div v-for="dish in dishes" :key="dish.id" v-show="dish.user_id === $route.params.id && dish.visibility === 1" class="p-3">
                        <div class="card card-ristoranti-2 bg-opacity-25 p-0 col h-100">
                            <div class="container_img h-100">
                                <img :src="dish.image" class="card-img-top h-100 w-100" alt="" />
                            </div>
                            <div class="card_body d-flex flex-column justify-content-between">
                                <h3>{{ dish.name }}</h3>
                                 {{ dish.description }}
                                <div>
                                    A soli: {{ dish.price / 100 }} €
                                </div>
                                    <div class="number-input d-flex justify-center alight-center">
                                        <button class="btn btn-secondary" @click="addToCart(dish)">Aggiungi al carrello</button>
                                        <div v-if="cart"><span v-for="item in cart.items" :key="item.id" v-show="dish.id === item.id" class="quantity">X {{ item.quantity }}</span></div>
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
import axios from "axios";

export default {
    data() {
        return {
            dishes: [],
            cart: null,
        };
    },
    methods: {
    async loadDishes() {
        try {
        const response = await axios.get(`/api/dishes/user/${this.$route.params.id}`)
        this.dishes = response.data
        } catch (error) {
        console.log(error)
        }
    },
    addToCart(dish) {
        this.$store.dispatch("addToCart", dish);
        this.cart =  this.$store.state.cart;
},
    },
    mounted() {
        this.loadDishes();
    },
};
</script>

<style lang="scss" scoped>
.card_body {
    margin-bottom: 1rem;
}

.card {
    position: relative;
    perspective: 1000px;
    border: none !important;
}

.card-ristoranti {
    height: 100%;

}


.container_img {
    border-radius: 2rem;
    width: 100%;
    transform: rotate(0deg);
    backface-visibility: hidden;
    transition: transform 0.3s linear;
    box-shadow: 10px 10px 5px #141414;

    img {
        width: 100%;
        border-radius: 2rem;
        background-color: white;
    }
}

.card_body {
    padding: 1rem;
    color: white;
    position: absolute;
    top: 0;
    width: 100%;
    height: 100%;
    transform: rotateY(180deg);
    backface-visibility: hidden;
    transition: transform 0.3s linear;
    overflow:visible;
}

.card:hover .container_img {
    transform: rotateY(-180deg);
}

.card:hover .card_body {
    transform: rotateY(0deg);
    transition: 1s;
    background-color: black;
    border-radius: 2rem;
}

.bg_img {
    background-image: url(https://blendofbites.com/wp-content/uploads/2021/01/varity-of-fast-food-on-black-table-2048x1365.jpg);
    background-size: cover;
}

.card-ristoranti-2 {
    background: transparent;
}
.quantity{
    color: white;
    margin-left: 2rem;
    font-size: 1.5rem;
    font-weight: 700;
}

</style>
