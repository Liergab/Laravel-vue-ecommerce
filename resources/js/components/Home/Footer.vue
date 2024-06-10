<template>
    <section class="w-full max-w-7xl h-full bg-slate-600 mx-auto rounded-tl-lg rounded-tr-lg">
        <div class="mx-auto flex">
            <div class="flex-1  flex flex-col py-10 px-20 justify-center space-y-4 ">
                <h1 class="text-2xl font-semibold ">FOLLOW</h1>
                <div class="space-x-2">
                    <Button icon="pi pi-facebook"  aria-label="Submit"  class="bg-indigo-500  rounded-full p-2" />
                    <Button icon="pi pi-twitter"   aria-label="Submit"   class="bg-indigo-500  rounded-full p-2"/>
                    <Button icon="pi pi-instagram" aria-label="Submit" class="bg-indigo-500  rounded-full p-2" />
                    <Button icon="pi pi-linkedin"  aria-label="Submit"  class="bg-indigo-500  rounded-full p-2" />
                    <Button icon="pi pi-youtube"   aria-label="Submit"   class="bg-indigo-500  rounded-full p-2"/>
                </div>
                <div class="flex gap-36 text-sm font-semibold text-slate-300">
                    <div>
                        <h1>Autumn</h1>
                        <h1>Winter</h1>
                        <h1>Spring</h1>
                        <h1>Summer</h1>
                    </div>
                    <div>
                        <h1>Casual</h1>
                        <h1>Classic</h1>
                        <h1>Urban</h1>
                        <h1>Sports</h1>
                    </div>
                </div>
            </div>
            <div class="flex-[1.5] flex flex-col py-10 px-40 justify-center space-y-4  ">
                <h1 class="text-2xl font-semibold">NEW ARRIVAL DISCOUNT CONTACT US</h1> 
                <div class="flex flex-col gap-2 ">
                    <p class="text-sm font-semibold text-slate-300">Subcribe to get the latest on sale, new releases and more...</p>
                    <form action="" class="space-x-2">
                        <InputText type="text" placeholder="Email" class="w-full max-w-96 p-2" />
                        <Button type="button" label="SUBSCRIBE" class="bg-red-400 text-sm text-slate-600 py-[10px] px-2"/>
                    </form>
                </div>
                <div>
                    <p class="text-sm font-semibold text-slate-300">Supported payment system</p>
                    <div class="flex gap-5">
                        <Image :src="visa" alt="Image" width="50"  />
                        <Image :src="mastercard" alt="Image" width="50"  />
                        <Image :src="paypal" alt="Image" width="50"  />
                        <Image :src="amazon" alt="Image" width="50"  />
                        <Image :src="discover" alt="Image" width="50"  />
                    </div>
                </div>
            </div>    
        </div>
    </section>
</template>

<script setup>
import Button from 'primevue/button';
import InputText from 'primevue/inputtext';
import Image from 'primevue/image';
import mastercard from '../../assets/mc.svg'
import visa from '../../assets/visa.svg'
import paypal from '../../assets/paypal.svg'
import amazon from '../../assets/amazon.svg'
import discover from '../../assets/discover.svg'


</script>

<style  scoped>
.img{
    border-radius: 10px;
}
</style>