<template>
    <div>
        <li class="nav-item dropdown">
            <a id="navbarDropdown"
               class="nav-link dropdown-toggle"
               href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Notifications ({{ notifications.length }}) <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <showNotification
                    v-for="notification in notifications"
                    :key="notification.id"
                    :notification="notification">

                </showNotification>
                <a class="dropdown-item" href="#" v-on:click.prevent="markAllAsRead">
                    Clear notifications
                </a>
            </div>
        </li>
    </div>
</template>

<script>
    export default {

        created(){
            this.$store.dispatch('loadNotifications');
        },
        computed: {
            notifications(){
                return this.$store.state.notifications.items;
            }
        },
        methods: {
            markAllAsRead(){
                this.$store.dispatch('markAllAsRead');
            }
        }

    }
</script>

