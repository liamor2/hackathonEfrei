<template>
  <main class="login">
    <section id="sells">
      <img src="../assets/images/cave2.jpg" alt="image of cave sells">
      <form @submit.prevent="submitForm">
        <h2>Sell wine</h2>
        <p>Fill your wine's characteristics</p>

        <label for="name">Name</label>
        <input type="text" id="name" v-model="formData.name" placeholder="Name">

        <label for="region">Region</label>
        <input type="text" id="region" v-model="formData.region" placeholder="Region">

        <label for="domain">Domain</label>
        <input type="text" id="domain" v-model="formData.domain" placeholder="Domain">

        <label for="country">Country</label>
        <input type="text" id="country" v-model="formData.country" placeholder="Country">

        <label for="alcohol">Alcohol (%)</label>
        <input type="text" id="alcohol" v-model="formData.alcohol" placeholder="Alcohol (%)">

        <label for="volume">Volume (cl)</label>
        <input type="text" id="volume" v-model="formData.volume" placeholder="Volume (cl)">

        <label for="sparkling">Sparkling</label>
        <input type="checkbox" id="sparkling" v-model="formData.sparkling">

        <label for="bio">Bio</label>
        <input type="checkbox" id="bio" v-model="formData.bio">

        <label for="type">Type</label>
        <input type="text" id="type" v-model="formData.type" placeholder="Type">

        <label for="vintage">Vintage</label>
        <input type="number" id="vintage" v-model="formData.vintage" placeholder="Vintage">

        <label for="varietal">Varietal</label>
        <input type="text" id="varietal" v-model="formData.varietal" placeholder="Varietal">

        <label for="url">Image URL</label>
        <input type="text" id="url" v-model="formData.url" placeholder="Image url">

        <label for="description">Description</label>
        <textarea id="description" v-model="formData.description" placeholder="Description" cols="115" rows="5"></textarea>

        <input type="submit" value="Send">
        <p>Your offer must be <u>accepted by an administrator</u> before being put on sale</p>
      </form>
    </section>
  </main>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      formData: {
        name: '',
        region: '',
        domain: '',
        country: '',
        alcohol: '',
        volume: '',
        sparkling: false,
        bio: false,
        type: '',
        vintage: 0,
        varietal: '',
        url: '',
        description: ''
      }
    };
  },
  methods: {
    submitForm() {
        console.log(this.formData);
      axios({
        method: 'post',
        url: 'http://localhost:8000/api/wine_propositions',
        data: this.formData,
        headers: { 'Content-Type': 'application/ld+json' }
      })
      .then(response => {
        // Handle the response from the server
        console.log(response.data);
      })
      .catch(error => {
        // Handle any errors from the request
        console.error('Error:', error);
      });
    }
  }
};
</script>


