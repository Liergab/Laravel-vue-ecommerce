<template>
    <PublicLayout>
        <h1>{{ product }}</h1>
    </PublicLayout>
</template>

<script setup>
import PublicLayout from './PublicLayout.vue';
import apiService from '../../services/apiServices'
import {ref, onMounted} from 'vue'

const product = ref([])
    const fetchTask = async() => {
        try {
            const res =  await apiService.get('/api/get-all-product')
            console.log(res.data)
            product.value = res.data
        } catch (error) {
            console.log(error)
        }
    }

    onMounted(() => {
        fetchTask()
    })
</script>