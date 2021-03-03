require('./bootstrap');

import Vue from 'vue'

Vue.component('posts-index',
    require('./components/Posts/Index').default)

const app = new Vue({
   el: '#app'
});

require('alpinejs');

module.exports = {
    // ...
    plugins: [
        // ...
        require('@tailwindcss/forms'),
    ]
}
