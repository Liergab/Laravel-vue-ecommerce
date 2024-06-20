<template>
  <section class=" p-4 flex bg-white gap-2">
    <div class="flex ">
        <Menu :model="items" class="w-full md:w-60 h-full min-h-[650px] bg-indigo-400 flex flex-col space-y-10 p-4 ">
            <template #start>
                <span class="inline-flex items-center gap-1 px-2 py-2">
                    <svg width="35" height="40" viewBox="0 0 35 40" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-8">
                        <path
                            d="M25.87 18.05L23.16 17.45L25.27 20.46V29.78L32.49 23.76V13.53L29.18 14.73L25.87 18.04V18.05ZM25.27 35.49L29.18 31.58V27.67L25.27 30.98V35.49ZM20.16 17.14H20.03H20.17H20.16ZM30.1 5.19L34.89 4.81L33.08 12.33L24.1 15.67L30.08 5.2L30.1 5.19ZM5.72 14.74L2.41 13.54V23.77L9.63 29.79V20.47L11.74 17.46L9.03 18.06L5.72 14.75V14.74ZM9.63 30.98L5.72 27.67V31.58L9.63 35.49V30.98ZM4.8 5.2L10.78 15.67L1.81 12.33L0 4.81L4.79 5.19L4.8 5.2ZM24.37 21.05V34.59L22.56 37.29L20.46 39.4H14.44L12.34 37.29L10.53 34.59V21.05L12.42 18.23L17.45 26.8L22.48 18.23L24.37 21.05ZM22.85 0L22.57 0.69L17.45 13.08L12.33 0.69L12.05 0H22.85Z"
                            fill="var(--p-primary-color)"
                        />
                        <path
                            d="M30.69 4.21L24.37 4.81L22.57 0.69L22.86 0H26.48L30.69 4.21ZM23.75 5.67L22.66 3.08L18.05 14.24V17.14H19.7H20.03H20.16H20.2L24.1 15.7L30.11 5.19L23.75 5.67ZM4.21002 4.21L10.53 4.81L12.33 0.69L12.05 0H8.43002L4.22002 4.21H4.21002ZM21.9 17.4L20.6 18.2H14.3L13 17.4L12.4 18.2L12.42 18.23L17.45 26.8L22.48 18.23L22.5 18.2L21.9 17.4ZM4.79002 5.19L10.8 15.7L14.7 17.14H14.74H15.2H16.85V14.24L12.24 3.09L11.15 5.68L4.79002 5.2V5.19Z"
                            fill="var(--p-text-color)"
                        />
                    </svg>
                    <span class="text-xl font-semibold">ECOM🛍️<span class="text-primary">APP</span></span>
                </span>
            </template>
            <template #submenulabel="{ item }">
                <span class="text-black font-bold">{{ item.label }}</span>
            </template>
            <template #item="{ item, props }">
                <a v-ripple class="flex items-center justify-center space-y-1 gap-2" v-bind="props.action" @click="navigateTo(item.link)">
                    <span :class="item.icon" />
                    <span>{{ item.label }}</span>
                    <!-- <Badge v-if="item.badge" class="ml-auto" :value="item.badge" /> -->
                    <span v-if="item.shortcut" class="ml-auto border border-surface rounded bg-emphasis text-muted-color text-xs p-1">{{ item.shortcut }}</span>
                </a>
            </template>
            <!-- <template #end>
                <button v-ripple class="relative overflow-hidden w-full border-0 bg-transparent flex items-start p-2 pl-4 hover:bg-surface-100 dark:hover:bg-surface-800 rounded-none cursor-pointer transition-colors duration-200">
                    <Avatar image="https://primefaces.org/cdn/primevue/images/avatar/amyelsner.png" class="mr-2" shape="circle" />
                    <span class="inline-flex flex-col items-start">
                        <span class="font-bold">Amy Elsner</span>
                        <span class="text-sm">Admin</span>
                    </span>
                </button>
            </template> -->
        </Menu>
    </div>
    <div class="flex-1 flex flex-col bg-indigo-400 rounded-lg p-2">
        <div class="bg-slate-50 p-4 rounded-md flex flex-row-reverse justify-between">
            <div class="flex gap-4">
                <Button @click="logout" class="bg-indigo-400 px-2 py-2  hover:bg-slate-200">
                <span class="pi pi-sign-out"></span>
                </Button>
                <Avatar label="V"  class="border-2 border-indigo-500" shape="circle" />
                <Button class="bg-indigo-400 px-2 py-2 hover:bg-slate-200">
                    <span class="pi pi-bell"></span>
                </Button>
            </div>
            <h1 class="bg-gradient-to-t from-indigo-50 via-indigo-500 to-slate-900 bg-clip-text text-transparent text-xl font-bold">
                Hi Admin 
                <span>Bryan!</span>
            </h1>
           
        </div>
        <div class="">
            <div v-if="!hasChildRoute">
                <Dashboard/>
            </div>
            <router-view></router-view>
        </div>
       
    </div>
  </section>
</template>

<script setup>
import Dashboard         from './Dashboard.vue'
import Menu              from 'primevue/menu';
import { useRoute, 
        useRouter }      from 'vue-router';
import { computed, ref } from 'vue';
import { useUserStore }  from '../../store/userStore';
import Button from 'primevue/button'
import Avatar from 'primevue/avatar';
const router           = useRouter()
const userStore        = useUserStore();
const route            = useRoute();
const logout = () => {
    userStore.logout();
    router.push({name:"login"});
}




const hasChildRoute = computed(() => !!route.matched[1]);

const items = ref([
    {
        separator: true
    },
    {
        label: 'Transaction',
        items: [
            {
                label: 'Dashboard',
                icon: 'pi pi-microsoft',
                shortcut: '⌘+N',
               link: 'adminDashboard'
            },
            {
                label: 'Add Products',
                icon: 'pi pi-plus',
                shortcut: '⌘+S',
               link: 'add-product'
            },
            {
                label: 'Order List',
                icon: 'pi pi-list',
                shortcut: '⌘+S',
                link: 'order-product'
            },
            {
                label: 'Order Details',
                icon: 'pi pi-file',
                shortcut: '⌘+S',
               link: 'order-details'
            }
        ]
    },
    {
        label: 'Profile',
        items: [
            {
                label: 'Settings',
                icon: 'pi pi-cog',
                shortcut: '⌘+O'
            },
            {
                label: 'Messages',
                icon: 'pi pi-inbox',
               shortcut: '⌘+O'
            },
        ]
    },
    {
        separator: true
    }
]);

const navigateTo = (link) => {
  router.push({ name: link });
};

</script>

<style lang="scss" scoped>

</style>