require('./bootstrap');

window.Vue = require('vue');

var VueEventBus = require('vue-event-bus');
Vue.use(VueEventBus);

Vue.component('register', require('./components/Register.vue'));
Vue.component('perfil', require('./components/Perfil.vue'));
Vue.component('post', require('./components/post.vue'));
Vue.component('posts', require('./components/posts.vue'));
Vue.component('comment', require('./components/Comment.vue'));
Vue.component('registerv', require('./components/RegisterV.vue'));
Vue.component('notification', require('./components/Notification.vue'));

const app = new Vue({
    el: '#app',
    data:{
    	menu:0
    }
});
