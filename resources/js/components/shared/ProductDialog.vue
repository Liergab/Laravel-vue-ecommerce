<template>
   <div class="card flex justify-content-center">
        <Dialog :visible="props.visible" modal header="ECOM🛍️" :style="{ width: '25rem' }" @click="hideDialog ">
            <div class="flex flex-col space-y-5">
                <span class="p-text-secondary block mb-1 font-bold">Product: {{ data.name }}</span>
                <div class="relative mx-auto" >
                    <Image :src="'https://images.pexels.com/photos/302899/pexels-photo-302899.jpeg?'" alt="Image" class="w-full rounded-[10px]"/>
                    <Tag :value="data.tags"  class="absolute" style="left:5px; top: 5px"/>
                </div>
                <div class="flex justify-between">
                    <h1 class="font-semibold text-xl">${{ data.price }}</h1>
                    <span>
                        <Button icon="pi pi-heart" severity="info" outlined class=" border-[1px] border-slate-700 py-1" disabled />
                        <router-link to="/login">
                            <Button icon="pi pi-shopping-cart" v-tooltip="'Please Login first'" class="ml-2 bg-indigo-400  py-1  border-[1px] border-slate-700"/>
                        </router-link>
                    </span>           
                </div>
            </div>
            <div class="flex justify-content-end gap-2">
                <Button type="button" label="Cancel" severity="secondary" @click="hideDialog "></Button>
            </div>
        </Dialog>
    </div>
</template>

<script setup>
import Button from 'primevue/button'
import Dialog from 'primevue/dialog';
import { defineProps, defineEmits, onMounted, ref, watch } from 'vue';
import apiService from '../../services/apiServices';
import Image from 'primevue/image';
import Tag from 'primevue/tag';

const data = ref([])

const props = defineProps({
    productId:{
        type:Number
    },
  visible: {
    type: Boolean,
    default: false,
  },
});

const emit = defineEmits(['update:visible']);
const hideDialog = () => {
  emit('update:visible', false);
};

const fetchProduct = async(productId) => {
    try {
        const res = await apiService.get(`/api/get-product/${productId}`)

        data.value = res.data
    } catch (error) {
        console.log(error)
    }
}

watch(() => props.productId, (newId) => {
  if (newId !== null && props.visible) {
    fetchProduct(newId);
  }
});

</script>

// get-product/

