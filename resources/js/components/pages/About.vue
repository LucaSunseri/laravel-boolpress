<template>
    <main class="container">
        <h1>Chi sono!</h1>
    </main>
</template>

<script>
export default {
    name: "About",
};
</script>

<style lang="scss" scoped>
main {
    height: calc(100vh - 140px);
    overflow: auto;
    padding-bottom: 100px;
}

.container {
    width: 80%;
    margin: 0 auto;
}

h1 {
    margin: 25px 0;
}
</style>
