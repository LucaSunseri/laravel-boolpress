<template>
    <div class="card">
        <h2>{{ post.title }}</h2>
        <h5 v-if="post.category">
            Categoria: <span class="category">{{ post.category.name }}</span>
        </h5>
        <h5 v-else>Categoria: <span class="category">Non presente</span></h5>
        <span v-for="(tag, index) in post.tags" :key="index" class="tag">{{
            tag.name
        }}</span>
        <p class="content">{{ maxCharacters }}</p>
        <p class="data">{{ formatData }}</p>
        <p class="card__apply">
            <a class="card__link" href="#"
                >Vai al Post <i class="fas fa-arrow-right"></i
            ></a>
        </p>
    </div>
</template>

<script>
export default {
    name: "PostCard",
    props: {
        post: Object,
    },
    computed: {
        maxCharacters() {
            if (this.post.content.length > 80) {
                return this.post.content.substring(0, 80) + "...";
            } else {
                return this.post.content;
            }
        },
        formatData() {
            const data = new Date(this.post.created_at);
            let day = ("0" + data.getDate()).slice(-2);
            let month = ("0" + (data.getMonth() + 1)).slice(-2);
            const year = data.getFullYear();

            return `${day}/${month}/${year}`;
        },
    },
};
</script>

<style lang="scss" scoped>
.card {
    position: relative;
    margin: 20px;
    padding: 20px;
    width: 500px;
    min-height: 225px;
    border-radius: 10px;
    box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.25);
    transition: all 0.2s;
    background: radial-gradient(#76b2fe, #b69efe);
    h2 {
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        max-width: 100%;
    }
}

.card:hover {
    box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.4);
    transform: scale(1.01);
}

.card__apply {
    position: absolute;
    bottom: 20px;
    left: 15px;
}

.card__link {
    text-decoration: none;
    color: rgba(255, 255, 255, 0.9);
}

.card__link::after {
    position: absolute;
    top: 25px;
    left: 0;
    content: "";
    width: 0%;
    height: 3px;
    background-color: rgba(255, 255, 255, 0.6);
    transition: all 0.5s;
}

.card__link:hover::after {
    width: 100%;
}

.content {
    padding: 20px 0;
}

.data {
    text-align: end;
    font-size: 12px;
}

.category {
    color: red;
    font-weight: bold;
}

.tag {
    display: inline-block;
    font-size: 10px;
    font-weight: bold;
    color: rgb(0, 0, 0);
    padding: 3px 8px;
    margin: 5px 0;
    margin-right: 5px;
    background-color: #76feaa;
    border-radius: 5px;
}
</style>
