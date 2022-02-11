<template>
    <header>
        <div class="header_left">
            <span>Luca-Blog</span>
            <span> &#128212;&#9749;</span>
        </div>
        <div class="header_right">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#" class="active">Blog</a></li>
                <li><a href="#">Chi sono!</a></li>
                <li><a href="#">Contatti</a></li>
            </ul>
        </div>
    </header>
</template>

<script>
export default {
    name: "Header",
};
</script>

<style lang="scss" scoped>
header {
    display: flex;
    justify-content: space-around;
    align-items: center;
    background-image: linear-gradient(135deg, #81fbb8 10%, #28c76f 100%);
    height: 80px;
}

.header_left {
    span:first-child {
        font-size: 30px;
        font-weight: bold;
    }
    span:last-child {
        font-size: 18px;
    }
}

.header_right {
    ul {
        list-style: none;
        li {
            display: inline-block;
            padding: 0 5px;
            a {
                text-decoration: none;
                color: black;
                &:hover {
                    color: white;
                }
                &.active {
                    color: white;
                    font-weight: bold;
                }
            }
        }
    }
}
</style>
