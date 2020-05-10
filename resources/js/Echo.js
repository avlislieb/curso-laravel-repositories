
console.log('cheogu-echo');
if(Laravel.user){
    console.log('entro-if');
    Echo.private(`App.User.${Laravel.user}`)
        .notification(notification => {
            console.log(notification, 'notification');
        });
}
