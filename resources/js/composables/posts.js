import {ref,inject} from 'vue';
import {useRouter} from 'vue-router'
import PostsStore from "../store/PostsStore";
import postsStore from "../store/PostsStore";
export default function usePosts() {
    const swal=inject('$swal');
    const posts= ref({});
    const router= useRouter();
    const post=ref({});
    const validationErrors=ref({});
    const getPosts=async (page =1,cat='')=>{
        axios.get('api/posts?page='+page+'&category_id='+cat).then(response=>{
            posts.value=response.data;
        }).catch(error=>console.log(error));
    }

    const getPost=async(id)=>{
        PostsStore.commit('setPosts',posts)
        postsStore.state.posts;
        axios.get('/api/posts/'+id).then(
            response=>{
                post.value=response.data.data;
            }
        ).catch(errors=>{
            if(errors.response?.data){
                validationErrors.value=errors.response.data.errors;
            }
        });
    }

    const updatePost=async (post)=>{
      axios.put('/api/posts/'+post.id,post).then(response=>{
        router.push({name:'posts.index'})
          swal('Post Updated Successfully');
      }).catch(errors=>{
          if(errors.response?.data){
              validationErrors.value=errors.response.data.errors;

          }
      })
    };



    const createPost=async (post)=>{
        axios.post('/api/posts',post).then(response=>{
            router.push({name:'posts.index'})
            swal('Post Added Successfully');

            posts.value=response.data;
        }).catch(errors=>{
            if(errors.response?.data){
                validationErrors.value=errors.response.data.errors;

            }
        })
    }

    const deletePost=async(id)=>{
        axios.delete('/api/posts/'+id).then(response=>{
            getPosts()
            swal('Post Deleted Successfully')
        })
    }
    return {posts,post,validationErrors,getPosts,createPost,getPost,updatePost,deletePost}
}
