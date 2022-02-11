<template>
    <main>
        <div class="container">
            <h1>I miei Posts</h1>
            <div class="container_post">
                <PostCard v-for="post in posts" :key="post.id" :post="post" />
            </div>
            <div class="pagination">
                <button
                    @click="getPosts(pagination.current - 1)"
                    :disabled="pagination.current == 1"
                >
                    Precedente
                </button>
                <button
                    v-for="index in pagination.last"
                    :key="index"
                    @click="getPosts((page = index))"
                    :disabled="pagination.current == index"
                >
                    {{ index }}
                </button>
                <button
                    @click="getPosts(pagination.current + 1)"
                    :disabled="pagination.current == pagination.last"
                >
                    Successiva
                </button>
            </div>
        </div>
    </main>
</template>

<script>
import PostCard from "./partials/PostCard.vue";

export default {
    name: "Posts",
    components: {
        PostCard,
    },
    data() {
        return {
            apiUrl: "http://127.0.0.1:8000/api/posts?page=",
            posts: [],
            pagination: {},
        };
    },
    mounted() {
        this.getPosts();
    },
    methods: {
        getPosts(page = 1) {
            axios
                .get(this.apiUrl + page)
                .then((response) => {
                    // handle success
                    this.posts = response.data.data;
                    this.pagination = {
                        current: response.data.current_page,
                        last: response.data.last_page,
                    };
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

.container_post {
    width: 100%;
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
}

.pagination {
    display: flex;
    justify-content: center;
    margin-top: 25px;
    button {
        padding: 5px;
        margin: 5px;
        cursor: pointer;
    }
}
</style>
