require('./bootstrap');

window.Vue = require('vue').default;

import Vue from 'vue'

// //Main pages
// import App from './views/app.vue'
//
// const app = new Vue({
//     el: ['#app'],
//     components: { App }
// });



import PostIndex from './components/Posts/Index.vue';

Vue.component('posts-index', PostIndex);

const app = new Vue({    el: '#app',components: { PostIndex}});



//
// Vue.component('posts-index',
//     require('./components/Posts/Index').default)
//
// const app = new Vue({
//    el: '#app'
// });



require('alpinejs');

module.exports = {
    // ...
    plugins: [
        // ...
        require('@tailwindcss/forms'),
    ]
}
