<template>
<UserProfileHeader />
<profileHeader :headerElements="headerElements" />
<reviewsListVue />








</template>
<script setup>
import reviewsListVue from '../reviews/reviewsList.vue';
import profileHeader from "../blocks/profileHeader.vue";
import UserProfileHeader from "@/components/profile/userProfileHeader.vue";
var headerElements = ["Reviews","Top Reviews","Worst Reviews"]






</script>