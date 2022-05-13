<template>
    <div class="row" id="content">
        <div class="medium-8 columns">
            <div class="blog-post" v-for="article in articles">
                <h3>{{ article.title }}<small>{{ article.created_at }}</small></h3>
                <img class="thumbnail" src="https://via.placeholder.com/850x350.png">
                <p>{{ article.short_description }}</p>
                <div>
                    <span v-for="tag in article.tags">
                        <a :href="tag.url" class="button tiny">
                            {{ tag.title }}
                        </a>
                    </span>
                </div>
                <div class="callout">
                    <ul class="menu simple">
                        <li><a href="#">Author: Mike Mikers</a></li>
                        <li><a href="#">Comments: 3</a></li>
                    </ul>
                </div>

                <hr>
            </div>
        </div>
        <div class="medium-3 columns" data-sticky-container>
            <div class="sticky" data-sticky data-anchor="content">
                <h4>Categories</h4>
                <ul>
                    <li><a href="#">Skyler</a></li>
                    <li><a href="#">Jesse</a></li>
                    <li><a href="#">Mike</a></li>
                    <li><a href="#">Holly</a></li>
                </ul>

                <h4>Authors</h4>
                <ul>
                    <li><a href="#">Skyler</a></li>
                    <li><a href="#">Jesse</a></li>
                    <li><a href="#">Mike</a></li>
                    <li><a href="#">Holly</a></li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'articles',
    data() {
        return {
            articles: []
        }
    },
    mounted() {
        this.loadArticles()
    },
    methods: {
        loadArticles() {
            fetch('/api/articles')
                .then(res => res.json())
                .then(res => this.articles = res.data)
        }
    }
}
</script>
