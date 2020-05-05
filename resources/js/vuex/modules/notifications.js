
export default {
    state: {
        items: []
    },

    mutations: {
        LOAD_NOTIFICATIONS (state, notifications){
            state.items = notifications;
        },
    },

    actions: {
        loadNotifications(context) {
            axios.get('/notifications')
                .then(
                    response => {
                        const responseNotification = response.data.notifications.filter((item)=>{
                            return item.data.comment.user !== undefined;
                        });
                        context.commit('LOAD_NOTIFICATIONS', responseNotification);

                    }
                );
        },
    }
}
