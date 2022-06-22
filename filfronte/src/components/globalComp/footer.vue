<template>
  <div :class="footer.footer">
  <div :class="footer.footer_logo">
  <h2 :class="footer.logo">Hmiza.ma</h2>
  <p :class="footer.description">Contrary to popular<br> belief, Lorem Ipsum is<br> not simply </p>
  </div>
  <div :class="footer.footer_services">
   <div :class="footer.service">
  <h2 :class="footer.service_title">Service</h2>
  <p :class="footer.service_par">Lorem ipsum</p>
  <p :class="footer.service_par">Lorem Ipsum</p>
  <p :class="footer.service_par">Routine check_ups</p>
  <p :class="footer.service_par">Lorem Ipsum</p>
  </div>
  <div :class="footer.service">
  <h2 :class="footer.service_title">About</h2>
  <p :class="footer.service_par">Lorem ipsum</p>
  <p :class="footer.service_par">Lorem Ipsum</p>
  <p :class="footer.service_par">Routine check_ups</p>
  <p :class="footer.service_par">Lorem Ipsum</p>
  </div>
  <div :class="footer.service">
  <h2 :class="footer.service_title">Help</h2>
  <p :class="footer.service_par">Lorem ipsum</p>
  <p :class="footer.service_par">Lorem ipsum</p>
  <p :class="footer.service_par">Lore Ipsum</p>
  <p :class="footer.service_par">Lorem Ipsum</p>
  </div>
  <div :class="footer.service">
  <h2 :class="footer.service_title">more</h2>
  <p :class="footer.service_par">Lorem ipsum</p>
  <p :class="footer.service_par">Lorem Ipsum</p>
  <p :class="footer.service_par">Routine check_ups</p>
  <p :class="footer.service_par">Lorem Ipsum</p>
  </div>
  </div>
  </div>
  <div :class="footer.subFooter">
   <div :class="footer.subFooter_firstLine">
    <div :class="footer.firstLine_navLinks">
      <ul>
      <li>Home</li>
        <li>Products</li>
        <li>Businesses</li>
        <li>Profile</li>
        <li>About</li>
      </ul>
        
        </div>
     <div :class="footer.firstLine_smLinks">
      <fa :icon="['fab','github']" :class="footer.smLink"/>
      <fa :icon="['fab','linkedin']" :class="footer.smLink"/>
   </div>   
   </div>
   
   <div :class="footer.subFooter_secondLine">
    <p>Copyright © 2022 Hmiza.ma , Tous droits réservés , Made By Jawad.</p>
   </div>
  </div>
</template>

<script setup>
import footer from "../../modulescss/globalComponents/footer.scss"
</script>

<style lang=scss>

</style>