<template>
     <nav class="navbar navbar-expand-md">
            <div class="container">
                <router-link :to="{ name: 'home' }" class="nav-link"><img class="logo" src="../../../public/img/deliveboo_full.svg" alt=""></router-link>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false">
                    <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <router-link class="custom-link" :to="{ name:  'cart' }">Carrello <strong v-if="cartQuantity !== 0">{{ cartQuantity }}</strong></router-link>
                        </li>
                        <li class="nav-item">
                            <a class="custom-link ml-5" href="/admin">Collabora con noi</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
</template>

<script>
export default {
    computed: {
        cartQuantity() {
            return this.$store.getters.cartQuantity;
        }
    }
};
</script>

<style lang="scss" scoped>
nav{
  position: fixed;
  top: 0;
  right: 0;
  left: 0;
  z-index: 2;
  box-shadow: 5px 5px 2px #1f1f1f;
}
.navbar-collapse{
    display: flex;
    justify-content: flex-end;
}

.navbar-nav{
    display: flex;
    flex-direction: column;
    align-items: flex-end;
}

.nav-item{
    margin: 1rem 0;
}

.nav-link {
  color: white;
  font-weight: bold;
  font-size: 2rem;
}
.navbar {
  background-color: rgba(92, 201, 188, 1);
}

.custom-link{
    border: none;
    background-color: white;
    padding: .5rem;
    border-radius:.5rem ;
    color: #1f1f1f;
    margin: 2rem 0;
    text-decoration: none;
}

.navbar-toggler{
    border: 1px solid white;
    background-color: rgba(92, 201, 188, 1);
    display: flex;
    justify-content: center;
    align-items: center;
}

.navbar-toggler-icon{
    color: white;
    width: 100%;
    height: 100%;
}

.logo {
    height: 4rem;
}

</style>
