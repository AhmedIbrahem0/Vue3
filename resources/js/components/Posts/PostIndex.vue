<template>
    <div class="container">
        <select name="category_id" v-model="selectedCat" class="form-select">
            <option value="">
                Select Category
            </option>
            <option v-for="category in cats" :value="category.id">
                {{ category.name }}
            </option>
        </select>
        <table id="example" class="table table-striped table-bordered" style="width:100%">

            <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Post Index</th>
                <th>Category</th>
                <th>Created At</th>
<!--                <th>Action</th>-->
            </tr>
            </thead>
            <tbody>
            <tr v-for="post in posts.data">
                <td>{{post.id}}</td>
                <td>{{ post.name }}</td>
                <td>{{ post.category.name }}</td>
                <td>{{ post.description }}</td>
                <td>{{ post.created_at }}</td>
<!--                <td></td>-->
            </tr>
            </tbody>

        </table>
        <Pagination :data="posts" @pagination-change-page="getPosts" />

    </div>
</template>

<script>
import usePosts from '../../composables/posts';
import useCategories from '../../composables/categories';
import {onMounted, ref ,watch} from "vue";
export default {
setup(){
  const {posts,getPosts}=usePosts();
  const {cats,getCategories}=useCategories();
  const selectedCat=ref('');
  onMounted(()=>{
     getPosts()
     getCategories()
  });

  watch(selectedCat,(current,previous)=>{
      getPosts(1,current)
  })
    return {posts,getPosts,cats,selectedCat};

}

}
</script>
