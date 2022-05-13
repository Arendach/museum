<template>
    <div>
        <HeaderMenu></HeaderMenu>

        <div class="callout large primary">
            <div class="row column text-center">
                <h1>Онлайн музей війни</h1>
            </div>
        </div>

        <Articles></Articles>

        <div class="row column">
            <ul class="pagination" role="navigation" aria-label="Pagination">
                <li class="disabled">Previous</li>
                <li class="current"><span class="show-for-sr">You're on page</span> 1</li>
                <li><a href="#" aria-label="Page 2">2</a></li>
                <li><a href="#" aria-label="Page 3">3</a></li>
                <li><a href="#" aria-label="Page 4">4</a></li>
                <li class="ellipsis"></li>
                <li><a href="#" aria-label="Page 12">12</a></li>
                <li><a href="#" aria-label="Page 13">13</a></li>
                <li><a href="#" aria-label="Next page">Next</a></li>
            </ul>
        </div>

    </div>
</template>

<script>

import HeaderMenu from '../../common/header'
import Articles from './articles'

export default {
    name: 'app',
    components: {HeaderMenu, Articles},
    props: [],
    data() {
        return {}
    }
}

</script>
