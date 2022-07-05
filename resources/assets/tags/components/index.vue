<template>
    <articles :articles="articles"></articles>
</template>

<script>
import {mapGetters, mapActions, mapMutations} from 'vuex'
import articles from "./articles"

export default {
    name: 'index',
    props: ['tag'],
    components: {articles},
    computed: {
        ...mapGetters(['videos', 'articles']),
    },
    methods: {
        ...mapActions(['loadVideos', 'loadArticles']),
        ...mapMutations(['setTag'])
    },
    mounted() {
        this.setTag(this.tag)
        // this.loadVideos()
        this.loadArticles()
    }
}
</script>
