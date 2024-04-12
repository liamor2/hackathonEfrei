<template>
    <main class="shop">
      <section>
        <h2>Shop</h2>
        <input type="search" placeholder="Search for a wine">
        <a href="#">
          <img src="../assets/images/search.svg" alt="search icon">
        </a>
  
        <!-- Wine Template Articles -->
        <article class="wineTemplate" v-for="wine in wines" :key="wine.id" @click="selectWine(wine)">
          <h3>{{ wine.name }}</h3>
          <img :src="wine.url" :alt="wine.name">
          <p>
            <span>Millésime: {{ wine.vintage }}</span>
            <span>Appellation: {{ wine.name }}</span>
            <span>Cépage: {{ wine.varietal }}</span>
            <span>Degré d'alcool: {{ wine.alcohol }}% vol Contenance: {{ wine.volume }}l</span>
            <span>Bio : {{ wine.bio }}</span>
            <span>Sparkling : {{ wine.sparkling }}</span>
            <span>Pays: {{ wine.country }}, Région: {{ wine.region }}, Couleur: {{ wine.type }}</span>
          </p>
        </article>

        <modal-component :wine="selectedWine" :show="showModal" @update:show="showModal = $event"></modal-component>
  
      </section>
    </main>
  </template>
  
  <script>
  import axios from 'axios';
  import ModalComponent from '../components/Modal.vue';
  
  export default {
  name: 'WineShop',
  components: {
    ModalComponent
  },
  data() {
    return {
      wines: [],
      selectedWine: null,
      showModal: false
    };
  },
  mounted() {
    this.fetchWines();
  },
  methods: {
    fetchWines() {
      axios.get('http://localhost:8000/api/wines')
        .then(response => {
          this.wines = response.data['hydra:member'];
          console.log('Wines:', this.wines);
        })
        .catch(error => {
          console.error('There was an error fetching the wines:', error);
        });
    },
    selectWine(wine) {
      this.selectedWine = wine;
      this.showModal = true;
    }
  }
};
</script>

  