<template>
    <div class="flex justify-center">
        <button class="text-white bg-slate-900 rounded-sm pl-3 pr-3 pt-1 pb-1 m-3" @click="fetchItems('Combat Supplies')">Combat Supplies</button>
        <button class="text-white bg-slate-900 rounded-sm pl-3 pr-3 pt-1 pb-1 m-3" @click="fetchItems('Enhancement Material')">Enhancement Material</button>
        <button class="text-white bg-slate-900 rounded-sm pl-3 pr-3 pt-1 pb-1 m-3" @click="fetchItems('Cooking')">Cooking</button>
    </div>
    <div class="flex justify-center">
        <div class="flex flex-col max-w-fit">
            <button v-for="(item, key) in items" @click="showItem(key, item)"
                    class="text-white bg-slate-900 rounded-sm pl-2 pr-2 pt-1 pb-1 m-2">{{ key }}
            </button>
        </div>
        <div class="flex items-center flex-col w-1/2" v-if="componentLoaded">
            <crafting-efficiency :data="item"></crafting-efficiency>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import { mapMutations, mapState} from "vuex";

export default {
    data() {
        return {
            items: '',
            item: [],
            componentLoaded: false
        }
    },
    computed: {
      ...mapState(['region', 'selectedItem', 'category']),
    },
    watch: {
      region() {
        this.fetchItems(this.category)
            .then(() => {
                this.showItem(this.item.name)
            })
      },
      category() {
          const key = Object.keys(this.items);
          this.showItem(key[0]);
        }
    },
    methods: {
        ...mapMutations(['updateSelectedItem', 'updateCategory']),
        showItem: function (key) {
            this.item = this.items[key];
            this.updateSelectedItem(this.item.name);
        },
        fetchItems: async function (category) {
            try {
                const response = await axios.get('/api/items/' + category);
                this.items = response.data;
                this.updateCategory(category);
            } catch (error) {
                console.log(error);
            }
        }
    },
    mounted() {
        this.fetchItems(this.category).then(() => {
            if (this.selectedItem) {
                this.showItem(this.selectedItem);
            } else {
                const key = Object.keys(this.items);
                this.showItem(key[0]);
            }

            this.componentLoaded = true;
        });
    }
}
</script>
