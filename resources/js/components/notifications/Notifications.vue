<template>
    <div>
        <li class="nav-item dropdown">
            <a id="navbarDropdown"
               class="nav-link dropdown-toggle"
               href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Notifications <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#" v-for="notification in notifications" :key="notification.id">
                    {{ notification.data.comment.title }}
                </a>
                <a class="dropdown-item" href="#" >
                    Clear notifications
                </a>
            </div>
        </li>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                notificationsItems: [],
            };
        },
        mounted() {
            this.loadNotifications();
        },
        computed: {
            notifications (){
                return this.notificationsItems;
            }
        },
        methods:{
            loadNotifications () {
                axios.get('/notifications')
                    .then(
                        response => {
                            this.notificationsItems = response.data.notifications;
                            console.log('response', response.data.notifications);
                        }
                    )
            }
        }
    }
</script>

