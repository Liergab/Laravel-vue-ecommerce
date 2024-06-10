<template>
    <div>
        <PublicLayout>
            <section class="flex w-full h-[500px]">
                <div class="flex-1">
                     <img :src="about" alt="about" class="w-96">
                </div>
                <div class="flex-1 overflow-y-auto">
                    <h1 class="text-3xl font-black">About Us</h1>
                    <br>
                    <p class="text-slate-500 font-semibold">Welcome to [Company Name], your number one source for
                    [Product/Service]. We're dedicated to providing you the best of
                    [industry/niche], with a focus on [specific features, e.g., 
                    dependability, customer service, and uniqueness].
                    </p>
                    <br>
                    <p class="text-slate-500 font-semibold">
                        Founded in [Year] by [Founder's Name], [Company Name]
                        has come a long way from its beginnings in [starting location].
                        When [Founder's Name] first started out, [his/her/their] passion 
                        for [brand story or motivation] drove them to start their own business.
                    </p>
                    <br>
                    <p class="text-slate-500 font-semibold">
                        We hope you enjoy our products as much as we enjoy offering them to you.
                        If you have any questions or comments, please don't hesitate to contact us.
                    </p>
                    <br>
                    <p class="text-slate-500 font-semibold">Sincerely,</p>
                    <br>
                    <p class="text-slate-500 font-semibold">Gabriel Berja</p>
                </div>
            </section>
        </PublicLayout>
        <section class="h-screen w-full flex flex-col items-center justify-center max-w-7xl mx-auto pt-10 px-20">
            <div class="">
                <h1 class="text-4xl font-bold">Team</h1>
            </div>
            <div class="flex-1 flex items-center justify-center gap-3">
                <Carousel :value="TeamProfile" :numVisible="3" :numScroll="3" :responsiveOptions="responsiveOptions" circular :autoplayInterval="3000">
                    <template #item="slotProps">
                        <div class=" m-2 p-3 border-[1px]  border-indigo-400 rounded-xl  bg-slate-100 shadow-xl">
                            <div class="mb-3">
                                <div class="relative mx-auto">
                                    <Image src="https://images.pexels.com/photos/1438081/pexels-photo-1438081.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Image" preview class="w-full"/>
                                </div>
                            </div>
                            <div class="mb-3 font-medium">{{ slotProps.data.name }}</div>
                            <div class="flex justify-content-between align-items-center">
                                <div class="mt-0 font-semibold text-xl">{{ slotProps.data.position }}</div>
                            </div>
                        </div>
                    </template>
                </Carousel>
            </div>
        </section>
        <section class="h-96 w-full  flex flex-col items-center justify-center max-w-7xl py-10  mx-auto px-20 mb-32 ">
            <div class="mb-10">
                <h1 class="text-4xl font-bold">Our Mission</h1>
            </div>
            <div class="flex-1">
                <p class="w-full max-w-3xl text-justify text-slate-500 font-semibold">
                    At [Company Name], our mission is to revolutionize the shopping experience
                    by providing high-quality products at competitive prices, all while ensuring 
                    exceptional customer service. We strive to empower our customers with a seamless
                    and enjoyable online shopping journey, offering a diverse range of products that 
                    cater to their unique needs and preferences.
                </p>
               <br>
                <p class="w-full max-w-3xl  text-justify text-slate-500 font-semibold">
                    Our commitment extends beyond just selling products; we aim to build a community 
                    of satisfied customers who trust and rely on us for their everyday essentials and 
                    special purchases. By prioritizing sustainability and ethical practices, we also 
                    seek to make a positive impact on the environment and society, ensuring a better 
                    future for generations to come
                </p>

            </div>
        </section>
        <Footer/>
    </div>
</template>
<script setup>
import PublicLayout from '../../components/layout/PublicLayout.vue'
import Footer from '../../components/Home/Footer.vue'
import about from '../../assets/image/about.gif'
import Card from 'primevue/card';
import {ref} from 'vue'
import Carousel from 'primevue/carousel';


import Image from 'primevue/image'
const TeamProfile =[
    {
        position:"Founder",
        name:"Gabriel Rubio"
    },
    {
        position:"Co Founder",
        name:"Chritine  Evangelista"
    },
    {
        position:"Software Engineer",
        name:"Bryan Berja"
    }
]
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

</script>