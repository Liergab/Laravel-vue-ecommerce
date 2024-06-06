<template>
      <PublicLayout>
        <div class="flex-1 items-center justify-center w-full hidden md:flex bg-gradient-to-br from-slate-200 via-slate-100 to-slate-50 p-14 rounded-xl">
            <img :src="loginImage" alt="loginImage" class="w-9/12" >
        </div>
        <div class="flex-1 flex items-center justify-center w-full ">
            <PublicForm>
                <ToggleRegister :activeToggle="activeToggle" @updatetoggle="handleClick"/>
                <Customer v-if="customer"/>
                <Admin v-if="admin"/>
            </PublicForm>  
        </div>  
    </PublicLayout>
</template>

<script setup>
import Customer from '../../components/register/Customer.vue'
import PublicForm    from '../../components/layout/PublicForm.vue';
import PublicLayout  from '../../components/layout/PublicLayout.vue'
import ToggleRegister from '../../components/shared/ToggleRegister.vue';
import loginImage from '../../assets/image/login.svg'
import {ref} from 'vue'
import Admin from '../../components/register/Admin.vue';

const customer = ref(true)
const admin = ref(false)
const activeToggle = ref('customer')

const handleClick = (toggle) => {
    customer.value = false
    admin.value = false
    activeToggle.value = toggle

    if(toggle === 'customer' ) customer.value = true
    if(toggle == 'admin')  admin.value = true 
}
</script>

