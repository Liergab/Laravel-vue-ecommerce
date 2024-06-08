<template>
     <section class="w-full h-full">
        <div class="bg-gradient-to-tr from-slate-200 via-slate-300 to-slate-300 rounded-xl  max-w-7xl mx-auto h-screen flex items-center flex-col space-y-14 ">
            <div class="mt-20 text-center space-y-10">
                <h1 class="text-5xl font-bold">Shop Smart. Live Better.</h1>
                <p class="text-2xl font-semibold text-slate-500">
                    Discover unbeatable deals on top-quality products, curated just for you.
                </p>
                <p class="text-2xl font-extrabold">Products</p>
            </div>
            <div class="w-full max-w-4xl ">
                <div v-if="isLoading" class="flex justify-center items-center space-x-4">
                    <div v-for="(n ) in 3" :key="n" class="flex flex-col justify-center items-center h-64">
                        <Skeleton class="mb-2" width="250px" height="250px"></Skeleton>
                        <Skeleton width="10rem" class="mb-2"></Skeleton>
                        <Skeleton width="5rem" class="mb-2"></Skeleton>
                        <Skeleton height="2rem" class="mb-2"></Skeleton>
                        <Skeleton width="10rem" height="4rem"></Skeleton>
                    </div>
                </div>
                <Carousel :value="product" :numVisible="3" :numScroll="3" :responsiveOptions="responsiveOptions" circular :autoplayInterval="3000">
                    <template #item="slotProps">
                        <div class="border-[1px]  border-slate-700 m-2  p-3  rounded-lg">
                            <div class="mb-3">
                                <div class="relative mx-auto cursor-pointer" @click="getById(slotProps.data.id)"  v-tooltip.top="'View'">
                                    <Image :src="'https://images.pexels.com/photos/302899/pexels-photo-302899.jpeg?auto=compress&cs=tinysrgb&w=600'" alt="Image" width="250"/>
                                    <Tag :value="slotProps.data.tags"  class="absolute" style="left:5px; top: 5px"/>
                                </div>
                            </div>
                            <div class="mb-3 font-medium">{{ slotProps.data.name }}</div>
                            <div class="flex justify-between items-center">
                                <div class="mt-0 font-semibold text-xl">${{ slotProps.data.price }}</div>
                                <span>
                                    <Button icon="pi pi-heart" severity="info" outlined class=" border-[1px] border-slate-700 py-1" disabled />
                                    <router-link to="/login">
                                        <Button icon="pi pi-shopping-cart" v-tooltip="'Please Login first'" class="ml-2 bg-indigo-400  py-1  border-[1px] border-slate-700"/>
                                    </router-link>
                                </span>
                            </div>
                        </div>
                    </template>
                </Carousel>
                <ProductDialog :visible="visible" :productId="productId"  @update:visible="visible = $event"/>
            </div>
        </div>
    </section>
</template>

<script setup>
import Carousel from 'primevue/carousel';
import Tag from 'primevue/tag'
import Image from 'primevue/image';
import apiService from '../../services/apiServices';
import {ref, onMounted} from 'vue'
import Button from 'primevue/button'
import Skeleton from 'primevue/skeleton';
import ProductDialog from '../shared/ProductDialog.vue';


const product = ref([])
const isLoading = ref(true);
const visible = ref(false);
const productId = ref(null)

const getById = (id) => {
    productId.value = id
    visible.value = !visible.value  
}

const fetchTask = async () => {
  try {
    isLoading.value = true; 
    const res = await apiService.get('/api/get-all-product');
    console.log(res.data);
    product.value = res.data;
  } catch (error) {
    console.log(error);
  } finally {
    isLoading.value = false; 
  }
};
    const responsiveOptions = ref([
    {
        breakpoint: '1400px',
        numVisible: 2,
        numScroll: 1
    },
    {
        breakpoint: '1199px',
        numVisible: 3,
        numScroll: 1
    },
    {
        breakpoint: '767px',
        numVisible: 2,
        numScroll: 1
    },
    {
        breakpoint: '575px',
        numVisible: 1,
        numScroll: 1
    }
]);

    onMounted(() => {
        fetchTask()
    })

</script>

<style lang="scss" scoped>

</style>