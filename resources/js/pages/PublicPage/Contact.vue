<template>
    <PublicLayout>
        <section class="flex w-full h-full min-h-96">
            <div class=" flex-1  flex items-center justify-center">
                <img :src="contact" alt="contact" class="w-96">
            </div>
            <div class="flex-1  flex items-center justify-center">
                <form action="" class="flex flex-col items-center justify-center border-[1px]  border-indigo-400 w-full max-w-96 min-h-72 gap-4 p-12 rounded-lg bg-slate-100 shadow-2xl">
                    <h1 class="font-bold text-2xl text-slate-600">Contact Us</h1>
                    <span class="input-form-container w-full">
                        <i class="pi pi-user" style="color:gray" />
                         <input type="text" placeholder="Email" class="p-1 rounded-lg input-form">
                    </span>
                    <span class="input-form-container w-full">
                        <i class="pi pi-user" style="color:gray" />
                         <input type="text" placeholder="Content" class="p-1 rounded-lg input-form">
                    </span>
                    <Button label="Submit" class="bg-indigo-500 py-1 w-full  max-w-72 "/>
                </form>

            </div>
        </section>
    </PublicLayout>
    <Footer/>

</template>

<script setup>
import PublicLayout from '../../components/layout/PublicLayout.vue'
import Footer from '../../components/Home/Footer.vue'
import Button from 'primevue/button';
import contact from '../../assets/image/contact.gif'
</script>

<style lang="scss" scoped>

</style>