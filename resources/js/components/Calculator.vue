<template>
    <div class="text-center mx-auto w-25 shadow rounded">
        <h1 class="mx-auto">Calculator</h1>
         <Box/>
    </div>
</template>

<script>
import Box from './Box.vue';
    export default {
        name:'calculator',
        components:{Box},
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
