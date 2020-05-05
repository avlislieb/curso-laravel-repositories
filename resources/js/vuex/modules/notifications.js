
export default {
    state: {
        items: []
    },

    mutations: {
        LOAD_NOTIFICATIONS (state, notifications){
            state.items = notifications;
        },
        MARK_AS_READ (state, idNotification){
            state.items = state.items.filter( notification => notification.id !== idNotification);
            //state.items.splice(index, 1);
        }
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
        markAsRead(context, param){
            console.log(param, 'param');
            axios.put('/notifications-read', param)
                .then(
                    response => {
                        console.log(response);
                        context.commit('MARK_AS_READ', param.id)
                    }
                )
        }
    }
}
