<template>
    <div>
        <HeaderMenu></HeaderMenu>

        <div class="callout large primary">
            <div class="row column text-center">
                <h1>{{ title }}</h1>
            </div>
        </div>

        <Articles></Articles>
    </div>
</template>

<script>

import HeaderMenu from '../../common/header'
import Articles from './articles'

export default {
    name: 'app',
    components: {HeaderMenu, Articles},
    props: ['title'],
    data() {
        return {}
    }
}

</script>
