<template>
   <div>
       <div>
           <div class="absolute right-0">
               <button class="btn" @click="changeLang('en')">English</button>
               <button class="btn" @click="changeLang('ar')">Arabic</button>

           </div>
           <router-link :to="{name:'posts.create'}">
               <button class="btn btn-primary mb-3">Add post</button>
           </router-link>
           <select name="category_id" v-model="selectedCat" class="form-select mb-3">
               <option value="">
                   Select Category
               </option>
               <option v-for="category in cats" :value="category.id">
                   {{ category.name }}
               </option>
           </select>
           <h1>{{$t('Hello')}}</h1>
           <table id="example" class="table table-striped table-bordered" style="width:100%">

               <thead>
               <tr>
                   <th>#</th>
                   <th>Title</th>
                   <th>Category</th>
                   <th>Description</th>
                   <th>Created At</th>
                   <th>Action</th>
               </tr>
               </thead>
               <tbody>
               <tr v-for="post in posts.data">
                   <td>{{ post.id }}</td>
                   <td>{{ post.name }}</td>
                   <td>{{ post.category.name }}</td>
                   <td>{{ post.description }}</td>
                   <td>{{ post.created_at }}</td>
                   <td>
                       <router-link :to="{name:'posts.show',params:{id:post.id}}"  @click="providePost(post.name)">
                           <button class="btn btn-warning mr-1">Show</button>
                       </router-link>
                       <router-link :to="{name:'posts.edit',params:{id:post.id}}">
                           <button class="btn btn-success">Edit</button>
                       </router-link>
                       <button class="btn btn-danger ml-1" @click="deletePost(post.id)">Delete</button>

                   </td>
               </tr>
               </tbody>

           </table>
           <Pagination :data="posts" @pagination-change-page="getPosts"/>

       </div>
   </div>
</template>

<script>
import usePosts from '../../composables/posts';
import useCategories from '../../composables/categories';
import {onMounted, provide, ref, watch} from "vue";
import Test from '@components/test';
export default {
    components:{
        Test
    },

    setup() {
        localStorage.setItem('locale','ar')
        const {posts, getPosts,deletePost} = usePosts();
        const {cats, getCategories} = useCategories();
        const selectedCat = ref('');

        onMounted(() => {
            getPosts()
            getCategories()
        });
        function changeLang(key){
            localStorage.setItem('locale',key)
            location.reload()

        }
        function providePost(title){
            console.log(title)
            provide('postTitle',title)

        }
        watch(selectedCat, (current, previous) => {
            getPosts(1, current)
        })
        return {posts, cats, selectedCat,getPosts,deletePost,name,providePost,changeLang};

    }

}
</script>
