<template>
  <nav>
  <Nav/>
  </nav>
  <router-view/>
  <Footer />
</template>
<script setup>
import Nav from "./components/globalComp/nav2.vue";
import Footer from "./components/globalComp/footer.vue"

</script>

<style lang="scss">
@import "@/sass/variables.scss";
@import "@/sass/mexins.scss";
@import "@/sass/mediaquerise.scss";
*{
  margin: 0;
  padding: 0;
  
}



</style>
