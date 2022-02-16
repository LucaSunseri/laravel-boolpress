<template>
    <main>
        <div class="ls-container">
            <h1>Home</h1>
            <h2>Post più recente</h2>
            <a href="https://google.com" class="card">
                <div class="inner">
                    <h2 class="title">
                        Mit 117 Sachen durch Klugheimschen Basaltgebirge
                    </h2>
                    <span class="subtitle">03. März 2021</span>
                </div>
            </a>
        </div>
    </main>
</template>

<script>
export default {
    name: "Home",
};
</script>

<style lang="scss" scoped>
main {
    height: calc(100vh - 140px);
    overflow: auto;
    padding-bottom: 100px;
    font-family: "Vollkorn", serif;
    font-weight: 400;
    line-height: 1.3;
    font-size: 16px;
}

.ls-container {
    width: 80%;
    margin: 0 auto;
}

h1 {
    margin: 25px 0;
}

@mixin media() {
    @media (min-width: 768px) {
        @content;
    }
}

.siteTitle {
    display: block;
    font-weight: 900;
    font-size: 30px;
    margin: 20px 0;

    @include media {
        font-size: 60px;
    }
}

.card {
    height: 400px;
    position: relative;
    padding: 20px;
    box-sizing: border-box;
    display: flex;
    align-items: flex-end;
    text-decoration: none;
    border: 4px solid #b0215e;
    margin-bottom: 20px;
    background-image: url("https://images.unsplash.com/photo-1516051662687-567d7c4e8f6a?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1868&q=80");
    background-size: cover;

    @include media {
        height: 500px;
    }
}

.inner {
    height: 50%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background: white;
    box-sizing: border-box;
    padding: 40px;

    @include media {
        width: 50%;
        height: 100%;
    }
}

.title {
    font-size: 24px;
    color: black;
    text-align: center;
    font-weight: 700;
    color: #181818;
    text-shadow: 0px 2px 2px #a6f8d5;
    position: relative;
    margin: 0 0 20px 0;

    @include media {
        font-size: 30px;
    }
}

.subtitle {
    color: #b0215e;
    text-align: center;
}

.card2 {
    background-image: url("https://images.unsplash.com/photo-1496317556649-f930d733eea3?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80");
}

.card3 {
    background-image: url("https://images.unsplash.com/photo-1557576842-3bc6093a5085?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80");
}

footer {
    display: flex;
    justify-content: center;
    margin: 40px 0;
}

.footerLink {
    margin-right: 12px;
    color: #181818;
    text-decoration: none;
    position: relative;

    &:after {
        content: "";
        position: absolute;
        width: 100%;
        height: 4px;
        background-color: rgba(#b0215e, 0.3);
        left: 0;
        bottom: 0;
    }

    &:last-child {
        margin-right: 0;
    }
}
</style>
