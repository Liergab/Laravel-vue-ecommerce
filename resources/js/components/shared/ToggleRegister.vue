<template>
    <div class="w-full max-w-72 flex bg-slate-800 p-2 rounded-[100px] items-center justify-around">
        <div v-for="(b, index) in toggle_button" :key="index" >
            <Button 
                :label="b.label" 
                :class="activeToggle === b.toggle ? 'bg-violet-400 py-[2px] w-28' : 'bg-violet-300 py-[2px] w-28 text-slate-500'" 
                rounded 
                @click="handleClick(b.toggle)"

            />
        </div>
    </div>
</template>

<script setup>
import Button from 'primevue/button';
import { defineProps, defineEmits } from 'vue';
const props = defineProps({
    activeToggle: String,
    handleClick: Function
});

const emits = defineEmits(['updatetoggle']);

const toggle_button = [
    {
        label:'Customer',
        toggle:'customer'
    },
    {
        label:'Admin',
        toggle:'admin'
    }
]

const handleClick = (toggle) => {
    emits('updatetoggle', toggle);
};

</script>

<style lang="scss" scoped>

</style>