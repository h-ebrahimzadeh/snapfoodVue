import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


import { createApp } from "vue/dist/vue.esm-bundler";
import PostsIndex from "./components/posts/index.vue";
import FoodTable from "./components/food/foodTable.vue";
import DropDown from "./components/DropDown.vue";
import navigation from "./components/navigation.vue";
import filterRadio from "./components/FilterRadio.vue";
import searchForm from "./components/SearchForm.vue";
import filterDropdown from "./components/FilterDropdown.vue";



const app = createApp({});
app.component("posts-index", PostsIndex);
app.component("food-table", FoodTable);
app.component("drop-down", DropDown);
app.component("navigation", navigation);
app.component("filterRadio", filterRadio);
app.component("searchForm", searchForm);
app.component("filterDropdown", filterDropdown);

app.mount("#app");
