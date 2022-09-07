import PostIndex from '../components/Posts/PostIndex';
import CreatePost from '../components/Posts/CreatePost';
import EditPost from '../components/Posts/EditPost';
import {createRouter, createWebHistory} from "vue-router";

const routes = [
    {
        path: '/',
        component: PostIndex,
        name: 'posts.index',
        meta:{title:'Posts Index'}
    },
    {
        path: '/posts/create',
        component: CreatePost,
        name: 'posts.create',
        meta:{title: 'Create Post'}
    },
    {
        path:'/posts/edit/:id',
        name:'posts.edit',
        component: EditPost,
        meta: {title:'Edit Post'},
    }
]
export default createRouter({
    history: createWebHistory(),
    routes
})

