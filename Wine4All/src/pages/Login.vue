<template>
        <main class="login">
        <section>
            <form action="POST">
            <h2>Login</h2>
                <p>Enter your email to log in</p>
                <label for="email"></label>
                <input type="text" id="email" placeholder="Email">                    
                <label for="password"></label>
                <input type="text" id="password" placeholder="Password">
                <input type="submit" value="Log in">               
                <p>You don't have already an account,
                    <router-link to="/signup">sign up</router-link>
                </p>
            </form>
            <img src="../assets/images/wine.jpg" alt="img login">
        </section>
    </main>
</template>