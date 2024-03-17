<script setup>
const emit = defineEmits(["search"]);
const search = (e) => {
    emit("search", e.target.value);
};
</script>

<template>
    <input type="text" @input="search" class="rounded-lg" />
</template>
