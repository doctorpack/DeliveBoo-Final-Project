<template>
  <div>
    <NavBar  />
    <router-view class="margin-top" pb-2></router-view>
    <FooterComp />
  </div>
</template>

<script>
import NavBar from './components/NavBar';
import FooterComp from './components/FooterComp';

export default {
    name:'App',
    components: {
        NavBar,
        FooterComp,
    },
    created() {
        this.$store.dispatch('beforeUnload');
    }
}
</script>

<style lang="scss">
    @import '~bootstrap/scss/bootstrap';
    .margin-top {
    padding-top: 80px;
}
</style>
