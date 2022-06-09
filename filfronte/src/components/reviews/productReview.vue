<template>

<div :class="reviewStyle.container">
<div :class="reviewStyle.user">
 <img :src="review.img" alt="">
 <div :class="reviewStyle.userInfos">
 <h3> {{review.nom }}  {{review.prenom}} </h3>
 <p> {{review.published_at}} </p>
 </div>
</div>

<hr :class="reviewStyle.line">
<div :class="reviewStyle.reviewHeader">
<div :class="reviewStyle.title">
<h3> {{review.titre}} </h3>
<p>Review Title</p>
</div>
<p>
<span><fa :class="reviewStyle.star" :icon="['fas','star']"/></span>
<span :class="reviewStyle.note">{{review.note}}</span>
<span :class="reviewStyle.achra">/10</span>
</p>
</div>

<p :class="reviewStyle.body"> {{review.description}} </p>

</div>
</template>

<script setup>
import axios from "axios";
import { onMounted } from "vue";
import reviewStyle from "../../modulescss/reviews/review.scss"
import { ref } from "vue";
const props = defineProps({
  review : Object
})
   















</script>