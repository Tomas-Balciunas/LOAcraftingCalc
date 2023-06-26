<template>

    <div class="w-1/2 text-center">
        <span>{{ data.name }}</span>
    </div>
    <div v-if="data.is_splendid" class="w-1/2 text-center">
        <input type="radio" name="craft" id="craft" v-model="craft" :value="true"/>
        <label for="craft">Craft</label>
        <input type="radio" name="craft" id="buy" v-model="craft" :value="false"/>
        <label for="buy">Buy</label>
    </div>

    <div class="w-1/2 flex flex-col">

        <div class="flex justify-between">
            <span>Amount crafted: </span>
            <span>{{ data.amount }}</span>
        </div>

        <div class="flex justify-between">
            <span>Crafting time (min): </span>
            <span>{{ data.time }}</span>
        </div>

        <div class="flex justify-between">
            <span>Crafting fee: </span>
            <span>{{ data.cost }}</span>
        </div>

        <div>
            <span>Ingredients: </span>
            <ul class="list-disc pl-5">
                <template v-for="(e, key) in data.ingredients_calculated">
                    <li>
                        <div class="flex justify-between">
                            <span>{{ key }} &#8594;</span>
                            <span>{{ e }}</span>
                        </div>
                    </li>
                </template>
                <template v-if="data.is_splendid">
                    <li>
                        <div class="flex justify-between">
                            <span>{{ data.splendid_ingredient.name }} &#8594;</span>
                            <span>{{ totalIngredient }}</span>
                        </div>
                    </li>
                    <template v-if="craft" v-for="(i, key) in data.splendid_ingredient.ingredients_calculated">
                        <li class="ml-3">
                            <div class="flex justify-between">
                                <span>{{ key }} &#8594;</span>
                                <span>{{ i }}</span>
                            </div>
                        </li>
                    </template>
                </template>
            </ul>
        </div>

        <div class="flex justify-between font-bold">
            <span>Total crafting cost: </span>
            <span>{{ total }}</span>
        </div>

        <div class="flex justify-between font-bold">
            <span>Market value</span>
            <span>{{ data.marketValue }}</span>
        </div>

        <div v-if="comparison <= 0" class="flex justify-between font-bold">
            <span>Crafting: </span><span class="text-green-600">{{ comparison }}%</span>
        </div>

        <div v-if="comparison > 0" class="flex justify-between font-bold">
            <span>Crafting: </span><span class="text-red-600">+{{ comparison }}%</span>
        </div>

    </div>


</template>

<script>
export default {
    props: ['data'],
    data() {
        return {
            comparison: '',
            total: '',
            totalIngredient: '',
            craft: true
        }
    },
    watch: {
        data: {
            immediate: true,
            handler(newValue) {
                if (newValue) {
                    this.difference(this.data);
                }
            }
        },
        craft: {
            immediate: true,
            handler() {
                this.difference(this.data)
            }
        }
    },
    methods: {
        difference(data) {
            if (data.is_splendid && !this.craft) {
                this.comparison = data.comparisonBuy;
                this.totalIngredient = data.splendid_ingredient.marketValue;
                this.total = data.totalCostNoCrafting;
            } else {
                this.comparison = this.data.comparison;
                this.totalIngredient = data.is_splendid ? data.splendid_ingredient.totalCost : data.totalCost;
                this.total = data.totalCost;
            }
        }
    }
}
</script>
