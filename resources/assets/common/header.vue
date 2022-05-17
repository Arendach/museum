<template>
    <div class="top-bar">
        <div class="top-bar-left">
            <ul class="menu">
                <li class="menu-text">
                    EVU.COM.UA
                </li>
            </ul>
        </div>
        <div class="top-bar-right">
            <ul class="menu">
                <li><a href="#">Про нас</a></li>
                <li><a href="#">Контакти</a></li>
                <li><a href="#">Підтримати ЗСУ</a></li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    name: 'header-menu',
    props: {
        title: {
            type: String
        }
    }
}
</script>
