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
import { onMounted } from "vue";
import { useStore } from "vuex";

const store = useStore()
onMounted(
  ()=>{
    if(localStorage.getItem('id')){
      store.state.navSwitcher = localStorage.getItem('id')
    }else{
      store.state.navSwitcher = undefined
    }
  }
)
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
