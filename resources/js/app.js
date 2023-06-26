import './bootstrap';
import { createApp } from 'vue';
import router from "./router";
import store from "./store";
import CraftingEfficiency from './components/CraftingEfficiency.vue';
import RegionComponent from "./components/RegionComponent.vue";

const app = createApp({});

app.use(router);
app.use(store);

app.component('crafting-efficiency', CraftingEfficiency);
app.component('region-component', RegionComponent);

app.mount('#app');
