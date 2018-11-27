require('./bootstrap');

window.Vue = require('vue');

Vue.component('register', require('./components/Register.vue'));
Vue.component('perfil', require('./components/Perfil.vue'));
Vue.component('post', require('./components/post.vue'));
Vue.component('posts', require('./components/posts.vue'));


const app = new Vue({
    el: '#app',
    data:{
    	menu:0
    }
});
