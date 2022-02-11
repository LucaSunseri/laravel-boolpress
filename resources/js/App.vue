<template>
    <div>
        <Header />
        <Home />
        <Footer />
    </div>
</template>

<script>
import Header from "./components/partials/Header.vue";
import Home from "./components/pages/Home.vue";
import Footer from "./components/partials/Footer.vue";

export default {
    name: "App",
    components: {
        Header,
        Home,
        Footer,
    },
};
</script>

<style></style>
