<template>

    <header>
        <router-link to="/" class="logo">
            <img src="../assets/images/Wine4AllLogoAlt.png" alt="logo Wine4All">
            <h1>Wine4All</h1>
        </router-link>
        <div>
            <router-link to="/">Home</router-link>
            <router-link to="/shop">Shop</router-link>
            <router-link to="/sell">Sell</router-link>
            <router-link to="/sales">Sales</router-link>
            <router-link to="/account">Account</router-link>
            <router-link to="/login">Login/Signup</router-link>
        </div>
    </header>

</template>

<script>
export default {
    name: 'Header'
}
</script>