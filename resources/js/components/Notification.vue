<template>
    <a href="#" @click="hola()" class="waves-effect"><i class="fa fa-globe fa-fw" aria-hidden="true"></i><span class="hide-menu">Notificaciones </span></a>
</template>

<script>
    export default {
        data() {
            return {

            };
        },
        props: ['user_id'],
        methods: {
            hola(){
                console.log("asdsadas");
            }
        },
        mounted() {
          Echo.private('Notification')
            .listen('NotificationEvent', (e) => {
                console.log("si jalo alv");

            });

            console.log(this.user_id);
        }
    }
</script>
