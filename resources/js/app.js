import './bootstrap';
import { createApp } from 'vue';
import CraftingEfficiency from './components/CraftingEfficiency.vue';

const app = createApp({
    data() {
        return {
            huh: '',
            items: '',
            item: [],
            selectedRegion: '',
            componentLoaded: false
        }
    },
    methods: {
        getItem: function (key) {
            this.item = this.items[key];
            this.item.name = key;
            const params = new URLSearchParams();
            params.set('item', this.item.name);
            history.replaceState(null, '', `?${params.toString()}`);
        },
        region: async function (e) {
            try {
                await axios.post('/region/' + e.target.value);
                await this.fetchItems();
                this.getItem(this.item.name);
            } catch (error) {
                console.log(error);
            }
        },
        fetchRegion: function () {
            axios.get('/api/region').then(r => {
                this.selectedRegion = r.data
            }).catch(error => {
                console.log(error);
            })
        },
        fetchItems: async function () {
            try {
                const response = await axios.get('/api/items');
                this.items = response.data;
            } catch (error) {
                console.log(error);
            }
        }
    },
    created() {
        this.fetchRegion();
        this.fetchItems().then(r => {
            const params = new URLSearchParams(window.location.search);
            if (params.get('item')) {
                this.getItem(params.get('item'));
            } else {
                const key = Object.keys(this.items);
                this.getItem(key[0]);
            }

            this.componentLoaded = true;
        });
    }
});

app.component('crafting-efficiency', CraftingEfficiency);

app.mount('#app');
