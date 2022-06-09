<template>
<Nav/>
<div :class="home.secSection">
 <h1 :class="home.secSection_title">Our Services</h1>
 <div :class="home.secSection_elements">
 <div :class="home.secSection_leftside">
 <h1 :class="home.secSection_leftside_bigTitle">We are trying to make your<br> custumer Experiance in the<br> internet easier</h1>
 <p :class="home.secSection_leftside_par">Contrary to popular belief, Lorem Ipsum is not<br> simply random text. It has roots in a piece of<br> classical Latin </p>
 <div :class="home.secSection_leftside_checkpoints">
  <p :class="home.par"><fa :icon="['fas','circle-check']" :class="home.check"/><span>same shit i didn’t think about it yet</span></p>
 <p :class="home.par"><fa :icon="['fas','circle-check']" :class="home.check"/><span>some shit i didn’t think about it yet</span></p>
 <p :class="home.par"><fa :icon="['fas','circle-check']" :class="home.check"/><span>some shit i didn’t think about it yet</span></p>
 </div>
 <div :class="home.secSection_leftside_button">
 <button :class="home.button">Learn More about us</button>
 </div>
 
 </div>
 <div :class="home.secSection_rightside">
   <div :class="home.secSection_rightside_service">
     <img src="@/assets/received1.png" alt="service pic" style="width:110px;height:auto;"/>
     <h3>Search for a product</h3>
     <p>Contrary to popular<br> belief, Lorem Ipsum is<br> not</p>
     <a href="">Start from here</a>
   </div>
   <div :class="home.secSection_rightside_service">
     <img src="@/assets/services1.png" alt="service pic" style="width:125px;height:auto;"/>
     <h3>Search for a Service</h3>
     <p>Contrary to popular<br> belief, Lorem Ipsum is<br> not</p>
     <a href="">Start from here</a>
   </div>
   <div :class="home.secSection_rightside_service">
     <img src="@/assets/like1.png" alt="service pic" style="width:100px;height:auto;"/>
     <h3>Review a product </h3>
     <p>Contrary to popular<br> belief, Lorem Ipsum is<br> not</p>
     <a href="">Start from here</a>
   </div>
   <div :class="home.secSection_rightside_service">
     <img src="@/assets/price-tags1.png" alt="service pic" style="width:90px;height:auto;"/>
     <h3>Compare Products</h3>
     <p>Contrary to popular<br> belief, Lorem Ipsum is<br> not</p>
     <a href="">Start from here</a>
   </div>
 </div>
 </div>
 </div>
  <div :class="home.thirdsection">
  <h1 :class="home.thirdsection_bigTitle">We Can Help you to Improve Your business , BY<br> Creating a business Account</h1>
  <p :class="home.thirdsection_par">Contrary to popular belief, Lorem Ipsum is not simply </p>
  <div :class="home.thirdsection_checkpoints">
  <p :class="home.par"><fa :icon="['fas','circle-check']" :class="home.check"/><span :class="home.span">Create A Business Account</span></p>
 <p :class="home.par"><fa :icon="['fas','circle-check']" :class="home.check"/><span :class="home.span">Fill And Organize Your Stock</span></p>
 <p :class="home.par"><fa :icon="['fas','circle-check']" :class="home.check"/><span :class="home.span">Add Posts and blogs About your Buisinesse</span></p>
 </div>
  <button :class="home.thirdsection_button">Start from here</button>
  </div>  
  <div :class="home.fourthsection">
    <h1 :class="home.fourthsection_bigTitle">The Websites Prices Available in our Website</h1>
    <div :class="home.fourthsection_logos">
    <fa :icon="['fab','ebay']" :class="home.logo"/>
    <fa :icon="['fab','Amazon']" :class="home.logo"/>
    <fa :icon="['fab','apple']" :class="home.logo"/>
    <fa :icon="['fab','shopify']" :class="home.logo"/>
    <fa :icon="['fab','ebay']" :class="home.logo"/>
    <fa :icon="['fab','amazon']" :class="home.logo"/>
    <fa :icon="['fab','shopify']" :class="home.logo"/>
    <fa :icon="['fab','amazon']" :class="home.logo"/>
    <fa :icon="['fab','ebay']" :class="home.logo"/>
    </div>
    <button :class="home.fourthsection_button">Learn More >></button>
  </div> 

</template>

<script setup>
import home from "../modulescss/homeView/home.scss"
import Nav from "../components/globalComp/nav.vue"
</script>
