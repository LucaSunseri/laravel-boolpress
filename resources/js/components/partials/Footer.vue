<template>
    <footer>
        <p>Questo è il footer del Blog</p>
    </footer>
</template>

<script>
export default {
    name: "Footer",
};
</script>

<style lang="scss" scoped>
footer {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 60px;
    background: linear-gradient(
            to bottom,
            rgba(255, 255, 255, 0.15) 0%,
            rgba(0, 0, 0, 0.15) 100%
        ),
        radial-gradient(
                at top center,
                rgba(255, 255, 255, 0.4) 0%,
                rgba(0, 0, 0, 0.4) 120%
            )
            #989898;
    background-blend-mode: multiply, multiply;
    p {
        font-size: 20px;
        font-weight: 700;
        color: #fff;
    }
}
</style>
