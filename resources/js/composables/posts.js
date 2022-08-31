import {ref} from 'vue';

export default function usePosts() {
    const posts= ref({});
    const getPosts=async (page =1,cat='')=>{
        axios.get('api/posts?page='+page+'&category_id='+cat).then(response=>{
            posts.value=response.data;
        }).catch(error=>console.log(error));
    }
    return {posts,getPosts}
}
