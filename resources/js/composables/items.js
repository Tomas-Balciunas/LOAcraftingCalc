import {ref} from "vue";
import axios from "axios";

export default function useItems() {
    const items = ref ([]);

    const getItems = async function () {
        try {
            const response = await axios.get('/api/items');
            items.value = response.data;
        } catch (error) {
            console.log(error);
        }
    }

    return {
        items,
        getItems
    }
}
