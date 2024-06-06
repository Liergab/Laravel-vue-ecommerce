<template>
      <div class="text-center">
        <h1 class="text-2xl font-bold">Welcome to ECOM🛍️!</h1>
        <h2 class="text-xs font-semibold text-center max-w-[300px]">
            Please fill out the form below to create a new 
            <span class="font-bold underline"> Admin/Vendor account</span> 
        </h2>
    </div>
    <form @submit.prevent="onSubmit" class="flex flex-col items-center justify-center gap-2">
        <span class="input-form-container w-full">
            <i class="pi pi-user" style="color:gray" />
            <input 
                type="text" 
                :name="nameAttrs"
                v-model="name" 
                placeholder="Fullname/ Storename" 
                class="input-form"   
            /> 
        </span>
        <span>{{ errors.name }}</span>
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
        <span class="input-form-container">
            <i class="pi pi-user" style="color:gray" />
            <input 
                :type="isConPassShow ? 'password' : 'text'" 
                :name="confirmPasswordAttrs"
                v-model="confirmPassword"
                placeholder="Confirm Password" 
                class="input-form"
            /> 
            <i :class=" isConPassShow ? 'pi pi-eye-slash' :'pi pi-eye'" 
                style="color:gray"
                @click="isConPassShow = !isConPassShow" 
            />
        </span>
        <span>{{ errors.confirmPassword }}</span>
        <Button :label="submitButtonLabel" type="submit" class="register-button" :disabled="isSubmitDisabled" />
         

        <h1 class="text-sm ">Don't have an account? 
            <router-link to="/login">
                <span class="text-violet-600">Login</span>
            </router-link>
        </h1>
    </form>
     
</template>

<script setup>
import {createToast} from '../shared/useToast'
import loginImage    from '../../assets/image/login.svg'
import apiService    from '../../services/apiServices';
import Button        from 'primevue/button';
import { useForm }   from 'vee-validate';
import { computed, 
         ref }       from 'vue';
import * as yup      from 'yup';


const showToast = createToast();
const isPassShow = ref(true)
const isConPassShow = ref(true)
const data = ref([])


const schema = yup.object({
  name : yup.string().required(),
  email: yup.string().email().required(),
  password: yup.string().min(6).required(),
  confirmPassword: yup.string()
    .oneOf([yup.ref('password'), null], 'Passwords must match')
    .required('Confirm Password is required')
});

const { defineField, errors, handleSubmit, resetForm,  isSubmitting  } = useForm({
  validationSchema: schema,
});

const [name, nameAttrs] = defineField('name');
const [email, emailAttrs] = defineField('email');
const [password, passwordAttrs] = defineField('password');
const [confirmPassword, confirmPasswordAttrs] = defineField('confirmPassword');

const onSubmit = handleSubmit( async values => {
 try {
    const res = await apiService.post('/api/register', {
      name:values.name,
      email: values.email,
      password: values.password,
      password_confirmation: values.confirmPassword,
      role:'ADMIN'
    });
    showToast('success', 'Success Message', res.data.message);
    console.log(res.data)
    data.value = res.data
 } catch (error) {
    showToast('error', 'Errror Message',error.response.data.message )
}
  resetForm()
});

const isSubmitDisabled = computed(() => {
    return !name.value|| !email.value || !password.value || !confirmPassword.value;
});

const submitButtonLabel = computed(() => {
      return isSubmitting.value ? 'Submitting...' : 'Submit';
    });



</script>

<style lang="scss" scoped>

</style>