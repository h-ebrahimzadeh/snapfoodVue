<template>
    <div class="dropdown-wrapper" ref="dropdown">

        <div class="dropdown-selected-option flex items-center"
             @click="isDropDownVisible = ! isDropDownVisible">

            <div class="material-symbols-outlined mr-1">
                account_circle
            </div>


            <div>
                {{ userName }}

            </div>

        </div>
        <div class="options">
            <div class="options-wrapper" v-if="isDropDownVisible">
                <div
                    class="option"
                    v-for="(option,index) in options"
                    :key="index"
                    @click="toggleOptionSelect(option)"
                >

                    <a :href="option.value">{{ option.name }}</a>
                </div>
                <div class="option">
                    <form @click="handleSubmit">
                        <button type="submit">Logout</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</template>

<script setup>
const dropdown = ref(null);

import {computed, defineProps, ref, onMounted, onBeforeMount} from 'vue'

function handleSubmit() {
    axios.post('/logout', {withCredentials: true})
        .then(() => {
            //logout user and redirect to log in

        })
        .catch((error) => {
            console.error(error);
        });
}


const props = defineProps({
    options: {
        type: Array,
        required: true
    },
    userName: String,

})
const selectedOption = ref(null)

const isDropDownVisible = ref(false)

const closeDropDown = (element) => {
    if (!dropdown.value.contains(element.target)) {
        isDropDownVisible.value = false
    }
}

onMounted(() => {
    window.addEventListener('click', closeDropDown)
})

onBeforeMount(() => {
        window.addEventListener('click', closeDropDown)

    }
)
</script>


<style>
.dropdown-wrapper {

    padding: 2px;
    cursor: pointer;
    max-width: 200px;

}

.dropdown-selected-option:hover {
    background: #FC984EFF;
}


.dropdown-selected-option {
    position: relative;
    top: 4px;

    padding-inline: 15px;

    border: solid 1px #000000;
    border-radius: 8px;
    box-sizing: border-box;
    margin-bottom: 4px;
}

.options {
    position: absolute;
}

.option:hover {
    background: #FC984EFF;
}

.option {

    padding-inline: 10px;
    padding-block: 2px;
    border: solid 1px #000000;
    box-sizing: border-box;
    background: beige;
}

.option:last-of-type {
    border-bottom-left-radius: 8px;
    border-bottom-right-radius: 8px;
}

.option:first-of-type {
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
}

</style>
