<template>
    <div>
        <a class="dropdown-item" href="#" v-if="comment.user !== undefined">
            <span @click.prevent="markAsRead(notification.id)">Lida</span>
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
        },
        methods:{
            markAsRead(idNotification){
                this.$store.dispatch('markAsRead', {id: idNotification});
            },
        }
    }
</script>

<style scoped>

</style>
