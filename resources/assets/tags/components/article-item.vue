<template>
    <div class="blog-item">
        <h3>
            <a :href="article.url">
                {{ article.title }}
            </a>
        </h3>
        <time class="post-classic-time mt-12 mb-20">
            by <i>{{ article.user.name }}</i>
        </time>
        <div class="blog-item-img mb-20">
            <picture><img :src="article?.picture?.path || '/img/blog/list-img-1.jpg'"></picture>
            <div class="hover d-flex justify-content-center align-items-center"></div>
        </div>
        <div class="blog-item-des">
            <p>{{ article.short_description }}</p>
            <ul class="blog-modern-meta">
                <li>
                    <a :href="article.url" class="btn-style-1 btn-sm text-white">
                        {{ __t('Читати дальше') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    name: 'ArticleItem',
    props: ['article']
}
</script>
