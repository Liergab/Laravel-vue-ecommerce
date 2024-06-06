<template>
    <PublicLayout>
        <div v-if="message === 'verified'" class="mt-20 bg-slate-400 p-20 rounded-2xl">
            <p class="text-xl font-bold">
                Your email has been verified successfully. You can now log in.
            </p>
            <p class="text-center font-semibold mt-10">Click here to redirect in 
                <span class="text-violet-800 underline">
                    <router-link to="/login">
                        Login
                    </router-link>
                </span> form
            </p>
            
        </div>
        <div v-else-if="message === 'not-verified'">
        <p>Verification failed. Please try again.</p>
        </div>
    </PublicLayout>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import PublicLayout from '../../components/layout/PublicLayout.vue';

const message = ref('');

onMounted(() => {
  const urlParams = new URLSearchParams(window.location.search);
  message.value = urlParams.get('message');
});

</script>

<style lang="scss" scoped>

</style>