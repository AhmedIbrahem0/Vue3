import {onMounted, ref} from "vue";

export default function useCategories(){
const cats=ref([]);
const getCategories=async ()=>{
    axios.get('/api/categories').then(response=>{
       cats.value=response.data.data
    });
}
return {cats,getCategories};
}
