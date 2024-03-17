<script setup>
import { computed, ref } from "vue";

const emit = defineEmits(["filter"]);
const show = ref(false);
const props = defineProps({
    items: {
        type: Array,
        required: true,
    },
});

const statuses = computed(() => {
    return [...new Set(props.items.map((item) => item.action))];
});

const filter = (e) => {
    emit("filter", e.target.value);
};
</script>

<template>
    <div class="relative flex items-center w-full px-4">
        <button
            @click="show = !show"
            class="w-full flex items-center py-2 px-2 text-sm font-medium text-gray-900 rounded focus:outline border-blue-900 border-solid border-2"
        >
            Filter
        </button>

        <div
            v-if="show"
            class="absolute top-12 right-0 z-10 w-48 p-3 bg-white rounded-lg shadow border-solid border-blue-900 border-2"
        >
            <h6 class="mb-3 text-sm font-medium text-gray-900">Status</h6>
            <ul>
                <li v-for="(status, index) in statuses">
                    <input
                        :id="`filter_option_${index}`"
                        @change="filter"
                        type="checkbox"
                        :value="status"
                        class="w-4 h-4 bg-gray-100 border-gray-300"
                    />
                    <label
                        :for="`filter_option_${index}`"
                        class="ml-2 text-sm font-medium text-gray-900"
                        >{{ status }}</label
                    >
                </li>
            </ul>
        </div>
    </div>
</template>
