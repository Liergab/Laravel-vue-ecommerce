class="flex items-center"
<template>
    <div >
        <Menubar :model="items" class="flex justify-between py-10 bg-white">
            <template #start>
                <h1 class="text-2xl font-bold">ECOM🛍️</h1>
            </template>
            <template #item="{ item, props}">
                <router-link v-if="item.route" v-slot="{ href, navigate }" :to="item.route" custom>
                    <a :href="href" v-bind="props.action" @click="navigate" :class="{'active':isCurrentRoute(item.route)}">
                        <span :class="item.icon"></span>
                        <span :class="{ 'ml-2': !isCurrentRoute(item.route) }">{{ item.label }}</span>
                    </a>
                </router-link>
            </template>
        </Menubar>
    </div>
</template>

<script setup>
import { ref } from "vue";
import { useRoute } from "vue-router";
import Menubar from 'primevue/menubar';
const route = useRoute();
const items = ref([
    {
        label: 'Home',
        icon: 'pi pi-home',
        route: '/'
    },
    {
        label: 'About',
        icon: 'pi pi-info-circle',
        route: '/about'
    },
    {
        label: 'Services',
        icon: 'pi pi-briefcase',
        route: '/services'
    },
    {
        label: 'Contact',
        icon: 'pi pi-envelope',
        route: '/contact'
    },
    {
        label: 'Shop',
        icon: 'pi pi-shopping-cart',
        route: '/login'
    },
]);

const isCurrentRoute = (targetRoute) => {
  return route.path === targetRoute;
};
</script>
<style scoped>
.active {
  background: rgb(191, 191, 250);
  border-radius: 5px;
}
</style>