<template>
    <div>
        <router-link :to="{name:'posts.index'}">
            <button class="btn btn-secondary mb-4">Posts</button>
        </router-link>

        <form @submit.prevent="updatePost(post)">
            <!-- Title -->
            <div>
                <label for="post-title" class="block font-medium text-sm text-gray-700">
                    Title
                </label>
                <input id="post-title" v-model="post.name" type="text" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <div class="invalid-feedback" v-for="message in validationErrors?.name">
                    <span>
                        {{message}}
                    </span>

                </div>
            </div>

            <!-- Content -->
            <div class="mt-4">
                <label for="post-content" class="block font-medium text-sm text-gray-700">
                    Content
                </label>
                <textarea id="post-content" v-model="post.description" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                <div class="invalid-feedback" v-for="message in validationErrors?.description">
                    <span>
                        {{message}}
                    </span>

                </div>
            </div>

            <!-- Category -->
            <div class="mt-4">
                <label for="post-category" class="block font-medium text-sm text-gray-700">
                    Category
                </label>
                <select id="post-category" v-model="post.category_id" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value="" selected>-- Choose category --</option>
                    <option v-for="category in cats" :value="category.id">
                        {{ category.name }}
                    </option>
                </select>
                <div class="invalid-feedback" v-for="message in validationErrors?.category_id">
                    <span>
                        {{message}}
                    </span>

                </div>
            </div>

            <!-- Buttons -->
            <div class="mt-4">
                <button class="px-3 py-2 bg-blue-600 text-white rounded">Save</button>
            </div>
        </form>
    </div>
</template>

<script>
import usePosts from '../../composables/posts';
import useCats from '../../composables/categories';
import { useRoute } from 'vue-router';
import {onMounted} from "vue";
export default {
setup(){
    const { post,validationErrors,getPost ,updatePost,}=usePosts();
    const {cats,getCategories} =useCats();
    const router = useRoute();
    onMounted(()=>{
        getPost(router.params.id);
        getCategories();
    });
    console.log(post)
    return {post,cats,validationErrors,updatePost};
},

}
</script>
