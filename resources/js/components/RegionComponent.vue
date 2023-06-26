<template>
    <div class="flex justify-center">
        <router-link class="text-white bg-slate-900 rounded-sm pl-3 pr-3 pt-1 pb-1 m-3" to="/">Home</router-link>
        <router-link class="text-white bg-slate-900 rounded-sm pl-3 pr-3 pt-1 pb-1 m-3" to="/crafting">Crafting</router-link>
        <select class="text-white bg-slate-900 rounded-sm pl-3 pr-3 pt-1 pb-1 m-3" @change="changeRegion" v-model="selectedRegion">
            <option>Europe Central</option>
            <option>Europe West</option>
            <option>North America West</option>
            <option>North America East</option>
            <option>South America</option>
        </select>
    </div>
</template>

<script>
import axios from "axios";
import { mapState, mapMutations, mapActions } from 'vuex';

export default {
    data () {
        return {
            selectedRegion: ''
        }
    },
    computed: {
        ...mapState(['region']),
    },
    methods: {
        ...mapMutations(['updateRegion']),
        ...mapActions(['fetchRegion']),
        changeRegion: async function (e) {
            try {
                await axios.post('/region/' + e.target.value);
                this.updateRegion(e.target.value)
            } catch (error) {
                console.log(error);
            }
        },
    },
    mounted() {
        this.fetchRegion().then(() => {
            this.selectedRegion = this.region;
        })
    }
}
</script>
