<template>
    <main v-if="exsist" class="container">
        <div v-if="post" class="post">
            <h1>{{ post.title }}</h1>
            <h5 v-if="post.category">
                Categoria:
                <span class="category">{{ post.category.name }}</span>
            </h5>
            <span v-for="(tag, index) in post.tags" :key="index" class="tag">{{
                tag.name
            }}</span>
            <p class="content">{{ post.content }}</p>
        </div>
    </main>
    <NotFound v-else />
</template>

<script>
import NotFound from "../NotFound.vue";

export default {
    name: "Show",
    components: {
        NotFound,
    },
    data() {
        return {
            apiUrl: "http://127.0.0.1:8000/api/posts/",
            slug: this.$route.params.slug,
            post: null,
            exsist: true,
        };
    },
    mounted() {
        this.getApi();
    },
    methods: {
        getApi() {
            axios
                .get(this.apiUrl + this.slug)
                .then((response) => {
                    // handle success
                    if (response.data.slug === this.slug) {
                        this.post = response.data;
                    } else {
                        this.exsist = false;
                    }
                })
                .catch((error) => {
                    // handle error
                    console.log(error);
                });
        },
    },
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
