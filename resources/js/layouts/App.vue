<template>
    <div class="card ">

        <div class="card-header text-center">
            <h1>{{computedTitle}}</h1>
        </div>
        <div class="py-12">
            <div class="w-full sm:px-6 lg:px-8">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <router-view></router-view>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </div>

</template>
<script>
export default {
    computed:{
        computedTitle(){
            return this.$route.meta.title;
        }
    }
}
</script>
