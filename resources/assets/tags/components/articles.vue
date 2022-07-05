<template>
    <div class="blog-area pt-80 pb-50">
        <div class="container">
            <div class="section-title text-center mb-40">
                <h2>{{ __t('Статті') }}</h2>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 mb-30" v-for="article in articles">
                    <ArticleItem :article="article"></ArticleItem>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import ArticleItem from './article-item'

export default {
    name: 'articles',
    props: ['articles'],
    components: {ArticleItem}
}
</script>
