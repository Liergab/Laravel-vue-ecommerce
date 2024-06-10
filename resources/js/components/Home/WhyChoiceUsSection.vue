<template>
    <section class="w-full h-full">
        <div class=" rounded-xl  max-w-7xl mx-auto h-screen flex items-center flex-col space-y-14">
            <div class="mt-20 text-center space-y-8">
                <p class="text-xl font-semibold text-slate-500">Best Products</p>
                <h1 class="text-5xl font-bold">Why choose us</h1>
            </div>
            <div class="flex w-full  p-4 gap-2 text-center">
                <Card v-for="(d, index) in cardData" :key="index" class=" max-w-80 mt-8 border-[1px] border-indigo-300 shadow-2xl " >
                    <template #header>
                        <span :class="['text-7xl','mt-8','text-indigo-500', d.icon]"></span>
                    </template>
                    <template #title>
                        <p class="text-2xl font-bold">{{ d.title }}</p>
                    </template>
                    <template #content>
                        <p class="text-sm text-slate-500">
                        {{ d.description }}
                        </p>
                    </template>
                </Card>

            </div>
        </div>
    </section>
</template>

<script setup>
import Card from 'primevue/card';


const cardData = [
    {
        icon:"pi pi-truck",
        title:'Fast Delivery',
        description:'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec.'
    },
    {
        icon:"pi pi-credit-card",
        title:'Free Shipping',
        description:'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec.'
    },
    {
        icon:"pi pi-shield",
        title:'Secure Checkout',
        description:'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec.'
    },
    {
        icon:"pi pi-cart-arrow-down",
        title:'Easy Return',
        description:'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec.'
    }
]

</script>

<style lang="scss" scoped>

</style>