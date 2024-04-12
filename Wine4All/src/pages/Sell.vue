<template>

<main class="login">
        <section id="sells">
            <img src="../assets\images\cave2.jpg" alt="image cave sells">
            <form action="POST">
                <h2>Sell wine</h2>
                <p>Fill your wine's caracteristics</p>
                
                <label for="name"></label>
                <input type="text" id="name" placeholder="Name">
                <label for="region"></label>
                <input type="text" id="region" placeholder="Region">
                <label for="domain"></label>
                <input type="text" id="domain" placeholder="Domain">
                <label for="country"></label>
                <input type="text" id="country" placeholder="Country">
                <label for="alcohol"></label>
                <input type="text" id="alcohol" placeholder="Alcohol (%)">
                <label for="volume"></label>
                <input type="text" id="volume" placeholder="Volume (cl)">
                <label for="sparkling">Sparkling</label>
                <input type="checkbox" id="sparkling">
                <label for="bio">Bio</label>
                <input type="checkbox" id="bio">
                <label for="type"></label>
                <input type="text" id="type" placeholder="Type">
                <input type="text" id="vintage" placeholder="Vintage">
                <label for="description"></label>
                <label for="varietal"></label>
                <input type="text" id="varietal" placeholder="Varietal">
                <label for="vintage"></label>
                <label for="url"></label>
                <input type="text" id="url" placeholder="Image url">
                <textarea type="text" id="description" placeholder="Description" cols="115" rows="5"></textarea>
                <input type="submit" value="Send">
                <p>Your offer must be <u>accepted by an adminaistrator</u> before being put on sale</p>
            </form>
        </section>
    </main>
</template>