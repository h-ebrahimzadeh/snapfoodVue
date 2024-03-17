<script setup>
const emit = defineEmits(['filter']);
const filter = (e) => {
    emit('filter', e.target.value);
}
</script>
<template>
    <label class="flex mr-4 items-center flex-nowrap">
        <input type="radio" name="show" checked value="all" @change="filter">
        <span class="whitespace-norwrap ml-1">Show All</span>
    </label>
    <label class="flex mr-4 items-center flex-nowrap">
        <input type="radio" name="show" value="today" @change="filter">
        <span class="whitespace-norwrap ml-1">Today</span>
    </label>
    <label class="flex mr-4 items-center flex-nowrap">
        <input type="radio" name="show" value="past" @change="filter">
        <span class="whitespace-norwrap ml-1">Past</span>
    </label>
</template>
