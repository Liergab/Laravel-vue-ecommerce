<template>
    <PublicLayout>
        <section class="flex flex-col items-center  w-full h-full py-10">
            <h1 class="text-2xl font-bold mb-6">Overview of Services</h1>
            <p class="text-center w-full max-w-2xl font-medium text-slate-600">
                "Our e-commerce platform offers a wide 
                range of products including electronics, fashion,
                home goods, and more. We are dedicated to providing 
                excellent customer service and a seamless shopping experience."
            </p>
            <div class="flex flex-wrap gap-4 items-center justify-center mt-10">
                <div v-for="(s , index) in Services" :key="index">
                    <div class="bg-slate-100 rounded-lg h-64 flex flex-col  items-center justify-center w-full max-w-96 space-y-4 px-6 border-[1px] border-indigo-400 shadow-2xl">
                        <h1 class="text-xl font-semibold">{{ s.title }}</h1>
                        <p class="text-center font-medium text-slate-600 text-sm">{{ s.Desc }}</p>
                    </div>  
                </div>
            </div>
        </section>
    </PublicLayout>
</template>

<script setup>
import PublicLayout from '../../components/layout/PublicLayout.vue'

const Services = [
    {
        title:"Product Sales",
        Desc:`"All products are described with detailed specifications
               and high-quality images. Prices are competitive and regularly updated.
               We accept major credit cards, PayPal, and other secure payment methods."`
    },
    {
        title:"Shipping and Delivery",
        Desc:`"We offer standard and express shipping options. Estimated delivery times 
               vary based on location and shipping method. Free shipping is available on orders over $50."`
    },
    {
        title:"Returns and Refunds",
        Desc:`"Our return policy allows you to return products within 30 days of purchase.
               Refunds are processed within 5-7 business days after receiving the returned item.
               Exchanges can be made under certain conditions."`
    },
    {
        title:"Customer Support",
        Desc:`"Customer support is available via email, phone, and live chat from 9 AM to 6 PM, Monday 
               to Friday. Our help center is accessible 24/7 for common queries."`
    },
    {
        title:"Terms and Conditionst",
        Desc:`"By using our services, you agree to our terms and conditions, which include compliance with 
              local laws and providing accurate information. Your privacy is important to us, and we ensure 
              that your data is protected."`
    },
    {
        title:"Additional Information",
        Desc:`"Join our loyalty program to earn points on every purchase and enjoy exclusive discounts.
               We also offer gift wrapping and custom orders for special occasions."`
    },
    
]

</script>

<style lang="scss" scoped>

</style>