<template>
    <div>
        <a class="dropdown-item" href="#" v-if="comment.user !== undefined">
            {{ comment.user.name }} commented: {{ comment.title }}
        </a>
    </div>
</template>

<script>
    export default {
        name: "showNotification",
        props: ['notification'],

        computed: {
            comment(){
                return this.notification.data.comment;
            }
        }
    }
</script>

<style scoped>

</style>
