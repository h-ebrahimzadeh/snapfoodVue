<script setup>
import { ref, onMounted, computed } from "vue";
import axios from "axios";
import PN from "persian-number";

const pageNumber = ref(0);
const size = ref(1);
const len = ref(null);
const items = ref([]);
const radioFilter = ref("");
const showImg = ref(false);
const imgFood = ref(null);

function nextPage() {
    if (pageNumber.value <= len.value) {
        return pageNumber.value++;
    }
    return pageNumber.value;
}

function previousPage() {
    if (pageNumber.value >= 0) {
        return pageNumber.value--;
    }
    return pageNumber.value;
}

function pageRoute(Number) {
    return (pageNumber.value = Number - 1);
}

const foods = ref(null);
const searchFilter = ref("");
const replace = ref("");

onMounted(async () => {
    // let arr=[];
    const response = await axios.get("/seller/food/get_foods");
    foods.value = response.data;
    len.value = foods.value.length;
    // arr.push(response.data)
    console.log(foods.value);
    console.log(foods.value.length);
});

function getUrl(imgUrl) {
    return imgUrl;
}

const handleSearch = (search) => {
    searchFilter.value = search;
};

const handleRadioFilter = (filter) => {
    radioFilter.value = filter;
};

//computed
const filteredFoods = computed(() => {
    let items = foods.value;

    switch (radioFilter.value) {
        case "today":
            items = items.filter(
                (item) =>
                    new Date(item.updated_at).getDate() === new Date().getDate()
            );
            break;

        case "past":
            items = items.filter(
                (item) =>
                    new Date(item.updated_at).getDate() < new Date().getDate()
            );
            break;
    }

    if (searchFilter.value !== "") {
        items = items.filter(
            (food) =>
                food.name.includes(searchFilter.value) ||
                food.materials.includes(searchFilter.value)
        );
    }

    if (len.value > 0) {
        len.value = items.length;
        if (size.value > 0) {
            let start = pageNumber.value * size.value,
                end = start + size.value;

            items = items.slice(start, end);
        }
    }

    return items;
});

const pageCount = computed(() => {
    let l = len.value,
        s = size.value;
    return Math.ceil(l / s);
});

// const paginatedData = computed(() => {
//     let start = pageNumber * size,
//         end = start + size;
//     console.log(end)
//     return filteredFoods.slice(start, end);
// })

console.log(pageCount.value);
console.log(imgFood.value);

// console.log(paginatedData)

function toPersianDigits(Num) {
    return PN.convertEnToPe(Num);
}

function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
//send path image
function showImgFun(imgPath) {
    showImg.value = true;
    imgFood.value = getUrl(imgPath);
    console.log(imgFood);
}
</script>
<template>
    <div
        class="gird place-items-center overflow-auto h-screen p-3 border border-gray-700 border-1 rounded-lg"
    >
        <div class="grid grid-cols-2">
            <div class="col-start-2 mb-1" dir="rtl">
                <search-form
                    class="h-14 text-xl"
                    placeholder="جستجو"
                    @search="handleSearch"
                />
            </div>
            <div class="col-start-1">
                <div class="flex flex-row">
                    <filter-radio @filter="handleRadioFilter" />
                </div>
            </div>
        </div>

        <table class="w-full text-center">
            <thead class="font-medium text-2xs text-gray-700 bg-gray-50">
                <tr class="">
                    <th class="px-4 py-3">عملیات</th>
                    <th class="px-4 py-3">تصویر</th>
                    <th class="px-4 py-3">مواد اولیه</th>
                    <th class="px-4 py-3">قیمت</th>
                    <th class="px-4 py-3">نام</th>
                    <th class="px-4 py-3">ردیف</th>

                    <!-- Add more columns as needed -->
                </tr>
            </thead>
            <tbody>
                <!--        <div hidden>{{ i > 1 ? i = 1 : i = i }}</div>-->

                <tr
                    v-for="(food, index) in filteredFoods"
                    :key="food.id"
                    class="even:bg-orang-500 border-b"
                >
                    <td
                        class="whitespace-nowrap px-4 py-3 font-medium text-gray-900"
                    ></td>
                    <td
                        class="whitespace-nowrap px-4 py-3 font-medium text-gray-900"
                    >
                        <img
                            class="w-20 mx-auto cursor-pointer"
                            :src="getUrl(food.image_url)"
                            alt=""
                            @click="showImgFun(food.image_url)"
                        />
                    </td>

                    <td
                        class="whitespace-nowrap px-4 py-3 font-medium text-gray-900"
                    >
                        {{ food.materials }}
                    </td>
                    <td
                        class="whitespace-nowrap px-4 py-3 font-medium text-gray-900"
                    >
                        {{ toPersianDigits(numberWithCommas(food.price)) }}
                    </td>
                    <td
                        class="whitespace-nowrap px-4 py-3 font-medium text-gray-900"
                    >
                        {{ food.name }}
                    </td>
                    <td
                        class="whitespace-nowrap px-4 py-3 font-medium text-gray-900"
                    >
                        {{ toPersianDigits(index + 1) }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div felx text-center>
        <button
            v-if="pageNumber >= 1"
            @click="previousPage"
            class="felx bg-blue-500 px-4 py-1 my-1 mx-1 border border-black rounded-lg"
        >
            Previous
        </button>
        <button
            v-else
            disabled
            class="felx bg-blue-200 px-4 py-1 my-1 mx-1 border border-black rounded-lg"
        >
            Previous
        </button>

        <span
            @click="pageRoute(index)"
            v-for="index in 3"
            class="bg-blue-300 px-2 mx-1 rounded-full hover:cursor-pointer"
        >
            {{ toPersianDigits(index) }}
        </span>

        <button
            v-if="pageNumber < pageCount - 1"
            @click="nextPage"
            class="bg-blue-500 px-4 py-1 my-1 mx-1 border border-black rounded-lg"
        >
            Next
        </button>
        <button
            v-else
            disabled
            class="bg-blue-200 px-4 py-1 my-1 mx-1 border border-black rounded-lg"
        >
            Next
        </button>
    </div>

    <!-- show image food modal -->
    <transition>
        <div
            v-if="showImg"
            @click="showImg = false"
            class="fixed left-0 top-0 bg-black bg-opacity-50 w-screen h-screen flex justify-center items-center"
        >
            <img class="w-1/2" :src="imgFood" alt="" />
        </div>
    </transition>
</template>
<style>
.v-enter-active,
.v-leave-active {
    transition: opacity 0.5s ease;
}

.v-enter-from,
.v-leave-to {
    opacity: 0;
}
</style>
