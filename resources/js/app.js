require('./bootstrap');

import './bootstrap'
import Vue from 'vue'
import PostLike from './components/PostLike'
import PostTagsInput from './components/PostTagsInput'
import FollowButton from './components/FollowButton'

window.Vue = require('vue');


Vue.component('example-component', require('./components/ExampleComponent.vue').default);


const app = new Vue({
    el: '#app',
    components: {
        PostLike,
        PostTagsInput,
        FollowButton
    }
});
