<script setup>

import DropDown from "./DropDown.vue";
import {defineProps, ref} from 'vue'

const options = ref([
    {
        name: 'profile',
        value: '/profile'
    },


])
const props = defineProps({
    userName: String,

})



</script>
<template>

    <drop-down :user-name=userName :options="options"></drop-down>
</template>
