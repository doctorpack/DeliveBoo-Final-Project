<template>
  <div class="bg">
    <div class="container">
        <div class=" row row-cols-lg-4 row-cols-md-2 row-cols-1">
        <div class="col">
            <ul>
                <li><h5>Scopri Deliveroo</h5></li>
                <li><a href="#!">Chi siamo</a></li>
                <li><a href="#!">Ristoranti</a></li>
                <li><a href="#!">altro</a></li>
                <li><a href="#!">Lavora con noi</a></li>
                <li><a href="#!">Diventa nostro partner</a></li>
            </ul>
        </div>
        <div class="col">
            <ul>
                <li><h5>Note</h5></li>
                <li><a href="#!">Termini & Condizioni</a></li>
                <li><a href="#!">Privacy</a></li>
                <li><a href="#!">Cookies</a></li>
            </ul>
        </div>
        <div class="col">
            <ul>
                <li><h5>Aiuto</h5></li>
                <li><a href="#!">Contatti</a></li>
                <li><a href="#!">FAQ</a></li>
            </ul>
        </div>
        <div class="col">
            <ul>
                <li><h5>Scarica l'App</h5></li>
                <li class="row mt-3 mb-1">
                    <img class="img-logo col-6 m-auto h-100" src="../../../public/img/deliveboo_logo.svg" alt="">
                </li>
                <li class="row pt-3 banner">
                    <div class="col-6">
                        <img class="banner w-100" src="../../../public/img/google-play-badge.png" alt="">
                    </div>
                    <div class="col-6">
                        <img class="banner w-100" src="../../../public/img/App_Store_Badge.png" alt="">
                    </div>
                </li>
            </ul>
        </div>
        </div>
        <div class="row justify-content-between pb-3">
            <div class="social">
                <img src="../../../public/img/facebook.png" alt="Facebook">
                <img src="../../../public/img/instagram.png" alt="instagram">
                <img src="../../../public/img/twitter.png" alt="twitter">
            </div>
            <div class="logo">
                <img class="w-50" src="../../../public/img/deliveboo_full.svg" alt="">
            </div>
        </div>
    </div>
  </div>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>
.bg {
    background-color: #2e3333;
    margin-bottom: -10px;
}
ul {
    margin-top: 3rem;
    margin-bottom: 1rem;
    padding: 1rem;
    color: white;
    text-decoration: none;
    list-style-type: none;
    background-color: hsla(0, 0%, 100%, 0.1);
    height: 18rem;
    border-radius: 5%;
    li {
        padding: .5rem 0;
    }
    a {
        color: white;
    }
}
.social {
    color: white;
    display:flex;
    align-items: center;
    justify-content: space-between;
}
.logo {
    display: flex;
    flex-direction: row-reverse;
    margin: 0 15px;
}
.img-logo {
    max-height: 100px;
}
.card-logo {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}
.banner {
    max-height: 60px;
}
</style>
