@extends('main')
@section('content')

    @{{ huh }}
    <div class="flex justify-center">
        <div class="flex flex-col max-w-fit">
            <button v-for="(item, key) in items" @click="getItem(key, item)" class="text-white bg-slate-900 rounded-sm pl-2 pr-2 pt-1 pb-1 m-2">@{{  key }}</button>
        </div>
        <div class="flex items-center flex-col w-1/2">
            <div class="w-1/2 text-center">
                <span>@{{ item.name }}</span>
            </div>
            <div class="w-1/2 flex flex-col">

                <div class="flex justify-between">
                    <span>Amount crafted: </span>
                    <span>@{{ item.amount }}</span>
                </div>

                <div class="flex justify-between">
                    <span>Crafting time (min): </span>
                    <span>@{{ item.time }}</span>
                </div>

                <div class="flex justify-between">
                    <span>Crafting fee: </span>
                    <span>@{{ item.cost }}</span>
                </div>

                <div>
                    <span>Ingredients: </span>
                    <ul class="list-disc pl-5">
                        <template v-for="(e, key) in item.recipe">
                            <li>
                                <div class="flex justify-between">
                                    <span>@{{ key }} &#8594;</span>
                                    <span>@{{ e }}</span>
                                </div>
                            </li>
                        </template>
                    </ul>
                </div>

                <div class="flex justify-between">
                    <span>Total crafting cost: </span>
                    <span>@{{ item.totalCost }}</span>
                </div>

                <div class="flex justify-between">
                    <span>Market value</span>
                    <span>@{{ item.marketValue }}</span>
                </div>

            </div>
        </div>
    </div>

@endsection
