import {createStore} from "vuex";
import axios from "axios";

const store = createStore({
    state() {
        return {
            region: null,
            selectedItem: null,
            category: 'Combat Supplies'
        }
    },
    mutations: {
        updateRegion(state, newValue) {
            state.region = newValue;
        },
        updateSelectedItem(state, newValue) {
            state.selectedItem = newValue;
        },
        updateCategory(state, newValue) {
            state.category = newValue;
        }
    },
    actions: {
        async fetchRegion({commit}) {
            await axios
                .get('/api/region')
                .then(r => {
                    const region = r.data;
                    commit('updateRegion', region);
                })
                .catch(error => {
                    console.log(error);
                })
        }
    }
});

export default store;
