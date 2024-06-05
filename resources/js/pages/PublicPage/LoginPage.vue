<template>
    <PublicLayout>
        <div class="flex-1 items-center justify-center w-full hidden md:flex bg-gradient-to-br from-slate-200 via-slate-100 to-slate-50 p-14 rounded-xl">
            <img :src="loginImage" alt="loginImage" class="w-9/12" >
        </div>
        <div class="flex-1 flex items-center justify-center w-full ">
            <PublicForm>
                <div class="text-center">
                    <h1 class="text-2xl font-bold">Welcome to ECOM🛍️!</h1>
                    <h2 class="text-sm font-semibold text-center max-w-80">
                        Please enter your credentials to continue your shopping!
                    </h2>
                    
                </div>
                <form @submit.prevent="onSubmit" class="flex flex-col items-center justify-center gap-2">
                    <span class="input-form-container w-full">
                        <i class="pi pi-user" style="color:gray" />
                        <input 
                            type="email" 
                            :name="emailAttrs"
                            v-model="email" 
                            placeholder="Email" 
                            class="input-form"   
                        /> 
                    </span>
                    <span>{{ errors.email }}</span>
                    <span class="input-form-container">
                        <i class="pi pi-user" style="color:gray" />
                        <input 
                            :type="isPassShow ? 'password' : 'text'" 
                            :name="passwordAttrs"
                            v-model="password"
                            placeholder="Password" 
                            class="input-form"
                        /> 
                        <i :class=" isPassShow ? 'pi pi-eye-slash' :'pi pi-eye'" 
                            style="color:gray"
                            @click="isPassShow = !isPassShow" 
                        />
                    </span>
                    <span>{{ errors.password }}</span>
                    <Button label="Submit" type="submit"  class="register-button "  :disabled="isSubmitDisabled"/>

                    <h1 class="text-sm ">Don't have an account? 
                        <router-link to="/register">
                            <span class="text-violet-600">Register</span>
                        </router-link>
                    </h1>
                </form>
            </PublicForm>  
        </div>  
    </PublicLayout>
</template>


<script setup>
import PublicForm    from '../../components/layout/PublicForm.vue';
import {createToast} from '../../components/shared/useToast'
import loginImage    from '../../assets/image/login.svg'
import apiService    from '../../services/apiServices';
import PublicLayout  from './PublicLayout.vue'
import Button        from 'primevue/button';
import { useForm }   from 'vee-validate';
import { computed, 
         ref }       from 'vue';
import * as yup      from 'yup';


const showToast = createToast();
const isPassShow = ref(true)
const data = ref([])


const schema = yup.object({
  email: yup.string().email().required(),
  password: yup.string().min(6).required(),
});

const { defineField, errors, handleSubmit, resetForm  } = useForm({
  validationSchema: schema,
});

const [email, emailAttrs] = defineField('email');
const [password, passwordAttrs] = defineField('password');

const onSubmit = handleSubmit( async values => {
 try {
    const res = await apiService.post('/api/login', {
      email: values.email,
      password: values.password
    });
    showToast('success', 'Success Message', 'Successfully Login');

    
    data.value = res.data
    console.log(res.data.data)
 } catch (error) {
    console.log(error.response.data.message)
    showToast('error', 'Errror Message',error.response.data.message )
}

  resetForm()
});

const isSubmitDisabled = computed(() => {
    return !email.value || !password.value;
});


 
</script>

