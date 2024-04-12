<template>
    <div class="not-found-page">
      <h1>404 - Page Not Found</h1>
      <p>Sorry, the page you are looking for does not exist.</p>
    </div>
  </template>
  
  <script setup>
  import { onMounted } from "vue";
  
  onMounted(() => {
    console.log('🟡 NotFoundPage has mounted');
  });
  </script>
  
  <style scoped>
  .not-found-page {
    text-align: center;
    margin-top: 50px;
  }
  </style>
  