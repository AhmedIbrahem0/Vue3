import {createApp} from "vue";
import App from './layouts/App'
import LaravelVuePagination from 'laravel-vue-pagination';
import router from './routes/index'
import VueSweetalert2 from "vue-sweetalert2";
import 'sweetalert2/dist/sweetalert2.min.css';
import i18n from "./lang";
window.axios = require('axios');
const app = createApp(App);
app.use(router);
app.use(i18n);
app.use(VueSweetalert2);
app.component('Pagination', LaravelVuePagination);
app.mount('#app')
require('./bootstrap');

