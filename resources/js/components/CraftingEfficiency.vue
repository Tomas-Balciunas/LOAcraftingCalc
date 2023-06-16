<template>
    <div v-if="comparison <= 0" class="flex justify-between font-bold">
        <span>Crafting: </span><span class="text-green-600">{{ comparison }}%</span>
    </div>
    <div v-if="comparison > 0" class="flex justify-between font-bold">
        <span>Crafting: </span><span class="text-red-600">+{{ comparison }}%</span>
    </div>

</template>

<script>
    export default {
        props: ['data'],
        data () {
            return {
               comparison: ''
            }
        },
        watch: {
          data: {
              immediate: true,
              handler(newValue) {
                if (newValue) {
                   this.calculateDifference(newValue);
                }
            }
          }
        },
        methods: {
            calculateDifference (data) {
              let total = data[0];
              let market = data[1];
              this.comparison = ((100 * total) / market - 100).toFixed(2);
            }
        }
    }
</script>
