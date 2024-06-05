<template>
   <!-- <div>
        <router-link to='/'>home</router-link>
        <router-link to="/about">about</router-link>
   </div> -->

   <main class="text-slate-800 bg-white w-full min-h-screen">
    <router-view/>
    <Toast />
   </main>
</template>
<script setup>
import Toast from 'primevue/toast';


</script>
