<template>
    <main class="login">
        <section>
            <img src="../assets/images/cave.jpg" alt="img signup">
            <form @submit.prevent="submitForm">
                <h2>Sign up</h2>
                <p>By default, you will be contacted via your email</p>

                <input type="text" id="name" v-model="formData.name" placeholder="Name">
                <input type="text" id="firstname" v-model="formData.firstname" placeholder="Firstname">
                <input type="text" id="address" v-model="formData.address" placeholder="Address">
                <input type="text" id="phone" v-model="formData.phone" placeholder="Phone number">
                <input type="email" id="email" v-model="formData.email" placeholder="Email">
                <input type="password" id="password" v-model="formData.password" placeholder="Password">

                <input type="submit" value="Sign up">
                <p>By clicking Sign up, you agree to our
                    <router-link to="/terms" target="_blank">Terms of Service and Privacy Policy</router-link>

                </p>
            </form>
        </section>
    </main>
</template>

<script>
import axios from 'axios';
import bcrypt from 'bcryptjs';

export default {
    data() {
        return {
            formData: {
                name: '',
                firstname: '',
                address: '',
                phone: '',
                email: '',
                password: ''
            }
        };
    },
    methods: {
        async submitForm() {
            const hashedPassword = await bcrypt.hash(this.formData.password, 10);
            const dataToSend = {
                ...this.formData,
                password: hashedPassword
            };

            axios.post('http://localhost:8000/api/register', dataToSend)
                .then(response => {
                    // Handle success
                })
                .catch(error => {
                    // Handle error
                });
        }
    }
};
</script>

<style scoped>
.login section form {
    width: 30%;
    padding: 10%;
    padding-top: 0;
    text-align: center;
    background-color: var(--darkRed);
}
</style>