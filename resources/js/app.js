import './bootstrap';
import { createApp } from 'vue';
import ExampleComponent from './components/ExampleComponent.vue';

const app = createApp({
    data() {
        return {
            huh: '',
            items: '',
            item: '',
            selected: ''
        }

    },
    methods: {
        getItem: function (target) {
            axios.post('/item/' + target).then(r => {
                this.huh = r.data;
            }).catch(error => {
                console.log(error);
            })
        },
        region: function (e) {
            axios.post('/region/' + e.target.value).then(r => {
                this.fetchItems();
            }).catch(error => {
                console.log(error);
            })
        },
        fetchRegion: function () {
            axios.get('/api/region').then(r => {
                this.selected = r.data
            }).catch(error => {
                console.log(error);
            })
        },
        fetchItems: function () {
            axios.get('/api/items').then(r => {
                this.items = r.data
            }).catch(error => {
                console.log(error);
            })
        }
    },
    created() {
        this.fetchRegion();
        this.fetchItems();
    }
});

app.component('example-component', ExampleComponent);

app.mount('#app');
