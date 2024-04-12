<template>
    <div class="modal" v-if="show">
      <div class="modal-content">
        <span class="close" @click="close">&times;</span>
        <p>{{ wine.description }}</p>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    props: ['wine', 'show'],
    methods: {
      close() {
        this.$emit('update:show', false);
      }
    }
  }
  </script>
  
  <style>
  .shop section div{
    padding: 0;
    width: 100vw;
  }
  .modal {
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100vw;
    height: 100%;
    padding: 0;
    overflow: auto;
    background-color: rgb(0,0,0); 
    background-color: rgba(0,0,0,0.4); 
  }
  
  .modal-content {
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #fefefe;
    margin: 15% auto;
    border: 1px solid #888;
    width: 80%;
  }
  
  .close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
  }
  .close:hover,
  .close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
  }
  </style>