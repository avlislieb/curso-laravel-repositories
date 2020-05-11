import store from "./vuex/store";
import swal from 'sweetalert';
const typesNotification = {
    postComment: "App\\Notifications\\PostComment",
};

if(Laravel.user){
    Echo.private(`App.User.${Laravel.user}`)
        .notification(notification => {
            console.log(notification.data.comment.post.user.id, 'notification.data.comment.post.user.id');
            console.log(notification, 'notification');
            if(Laravel.user === notification.data.comment.post.user.id && notification.type === typesNotification.postComment){
                swal({
                    title: 'New comment',
                    text: `The post ${notification.data.comment.post.title} was commented by ${notification.data.comment.user.name}`,
                    icon: 'info',
                    buttons: ['See', 'Ok'],
                    primaryMode: true
                }).then((seeComment) => {
                    if(!seeComment){
                        console.log(notification.data.linkPost, 'notification.data.linkPost');
                        location.href = notification.data.linkPost;
                    }
                });

                store.commit('ADD_NOTIFICATION', notification);
            }



        });
}
