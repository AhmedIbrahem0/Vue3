import {createApp} from "vue";
import PostIndex from './components/Posts/PostIndex.vue';
import LaravelVuePagination from 'laravel-vue-pagination';

window.axios = require('axios');

const app = createApp({});

app.component('post-index', PostIndex).mount('#app');
app.component('Pagination',LaravelVuePagination);
require('./bootstrap');

