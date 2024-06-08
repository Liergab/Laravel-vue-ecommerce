<template>
    <div v-if="!hasChildRoute">
      admin
    </div>
    <button @click="logout">logout</button>
    <router-view></router-view>
</template>

<script setup>
import { useRoute, useRouter } from 'vue-router';
import { computed } from 'vue';
import { useUserStore } from '../../store/userStore';
const router = useRouter()
const userStore = useUserStore();

const logout = () => {
    userStore.logout();
    router.push({name:"login"});
}


const route = useRoute();
const hasChildRoute = computed(() => !!route.matched[1]);

</script>

<style lang="scss" scoped>

</style>