import {createStore} from 'vuex'

export default createStore({
    state: {
        tag: {},
        videos: [],
        articles: [],
        videosPage: 1,
        articlesPage: 1,
    },
    getters: {
        videos: (state) => state.videos,
        articles: (state) => state.articles,
        tag: (state) => state.tag,
    },
    mutations: {
        setTag: (state, tag) => state.tag = tag,
        setVideos: (state, videos) => state.videos = videos,
        setArticles: (state, articles) => state.articles = articles,
    },
    actions: {
        loadVideos({commit, state, getters}) {
            fetch(`/api/tags/${getters.tag.id}/videos?page=${state.videosPage}`)
                .then(res => res.json())
                .then(res => commit('setVideos', res.data))
        },

        loadArticles({commit, state, getters}) {
            fetch(`/api/tags/${getters.tag.id}/articles?page=${state.articlesPage}`)
                .then(res => res.json())
                .then(res => commit('setArticles', res.data))
        },
    }
})
