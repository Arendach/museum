<template>
    <div>
        <Articles></Articles>
    </div>
</template>

<script>

import Articles from './articles'

export default {
    name: 'app',
    components: {Articles},
    props: ['title'],
    data() {
        return {}
    }
}

</script>
