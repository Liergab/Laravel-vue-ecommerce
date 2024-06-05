<template>
     <main class="w-full h-full">
        <div class="max-w-7xl  min-h-screen mx-auto px-4 md:p-0">
            <PublicNavbar/>
            <div class="flex items-center justify-center mt-10">
                <slot></slot>
            </div>
        </div>
    </main>
</template>

<script setup>
import PublicNavbar from '../../components/shared/PublicNavbar.vue'
</script>

<style lang="scss" scoped>

</style>