<template>
  <Header />
  <router-view></router-view>
  <Footer />
</template>

<script setup>
import { onMounted } from "vue";
import Header from "./components/Header.vue";
import Footer from "./components/Footer.vue";

onMounted(() => {
  console.log('🔵 App.vue has mounted');
});
</script>

<style>
@import './assets/style.css';



</style>