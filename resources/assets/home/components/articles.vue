<template>
    <div class="row" id="content">
        <div class="medium-8 columns" v-if="articles.length">
            <div class="blog-post" v-for="article in articles">
                <h3>
                    <a :href="article.url">
                        {{ article.title }}
                    </a>
                    <small>
                        {{ article.created_at }}
                    </small>
                </h3>
                <a :href="article.url">
                    <img class="thumbnail" src="https://via.placeholder.com/850x350.png">
                </a>
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
                        <li>
                            <a :href="article.user.url">
                                <span>
                                    <img src="/icons/user.svg" alt="" class="user-icon">
                                </span>
                                {{ article.user.name }}
                            </a>
                        </li>
                    </ul>
                </div>
                <hr>
            </div>

            <InfiniteLoading :first-load="false" @infinite="loadArticles"></InfiniteLoading>
        </div>
        <div class="medium-3 columns" data-sticky-container>
            <div class="sticky" data-sticky data-anchor="content">
                <h4>Теги</h4>
                <ul>
                    <li v-for="tag in tags">
                        <a :href="tag.url">
                            {{ tag.title }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
import Api from '../../Api'
import InfiniteLoading from "v3-infinite-loading"

export default {
    name: 'articles',
    data() {
        return {
            articles: [],
            tags: [],
            page: 1
        }
    },
    components: {
        InfiniteLoading
    },
    mounted() {
        this.loadArticles()
        this.loadTags()
    },
    methods: {
        async loadArticles($state) {
            Api.get(`/api/articles?page=${this.page}`).then(res => {
                this.articles.push(...res.data)
                this.lastPage = res.meta.last_page

                this.page++

                if (!$state) return

                if (this.page > res.meta.last_page) {
                    $state.complete()
                } else {
                    $state.loaded()
                }

            }).catch(err => {
                if ($state) $state.error()
            })
        },
        loadTags() {
            Api.get('/api/tags').then(res => this.tags = res.data)
        },
    }
}
</script>
