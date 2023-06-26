<?php

namespace App\Recipes;

class Recipes
{
    public function allRecipes(): array
    {
        return $this->list;
    }

    public function recipe($target): array
    {
        return $this->list[$target];
    }

    private array $list = [
        'Elemental HP Potion' => [
            'ingredients' => [
                'Wild Flower' => 48,
                'Shy Wild Flower' => 24,
                'Bright Wild Flower' => 6
            ],
            'cost' => 30,
            'amount' => 3,
            'energy' => 288,
            'time' => 60,
            'category' => 'Combat Supplies',
            'sub_category' => 'Potion'
        ],

        'Splendid Elemental HP Potion' => [
            'ingredients' => [
                'Bright Wild Flower' => 8
            ],
            'cost' => 30,
            'amount' => 2,
            'energy' => 360,
            'time' => 75,
            'category' => 'Combat Supplies',
            'sub_category' => 'Potion',
            'is_splendid' => true,
            'splendid_ingredient' => 'Elemental HP Potion'
        ],

        'Panacea' => [
            'ingredients' => [
                'Crude Mushroom' => 32,
                'Fresh Mushroom' => 16,
                'Exquisite Mushroom' => 4,
                'Rare Relic' => 5
            ],
            'cost' => 15,
            'amount' => 3,
            'energy' => 144,
            'time' => 30,
            'category' => 'Combat Supplies',
            'sub_category' => 'Potion'

        ],

        'Splendid Panacea' => [
            'ingredients' => [
                'Exquisite Mushroom' => 10
            ],
            'cost' => 15,
            'amount' => 2,
            'energy' => 216,
            'time' => 30,
            'category' => 'Combat Supplies',
            'sub_category' => 'Potion',
            'is_splendid' => true,
            'splendid_ingredient' => 'Panacea'

        ],

        'Atropine Potion' => [
            'ingredients' => [
                'Wild Flower' => 48,
                'Shy Wild Flower' => 24,
                'Bright Wild Flower' => 6,
                'Rare Relic' => 2,
                'Strong Iron Ore' => 2
            ],
            'cost' => 30,
            'amount' => 3,
            'energy' => 288,
            'time' => 60,
            'category' => 'Combat Supplies',
            'sub_category' => 'Potion'
        ],

        'Major HP Potion' => [
            'ingredients' => [
                'Wild Flower' => 18,
                'Shy Wild Flower' => 9,
            ],
            'cost' => 15,
            'amount' => 3,
            'energy' => 144,
            'time' => 30,
            'category' => 'Combat Supplies',
            'sub_category' => 'Potion'
        ],

        'Stimulant' => [
            'ingredients' => [
                'Crude Mushroom' => 40,
                'Fresh Mushroom' => 20,
                'Exquisite Mushroom' => 5,
                'Rare Relic' => 4,
                'Sturdy Timber' => 2
            ],
            'cost' => 30,
            'amount' => 3,
            'energy' => 288,
            'time' => 60,
            'category' => 'Combat Supplies',
            'sub_category' => 'Potion'
        ],

        'Corrosive Bomb' => [
            'ingredients' => [
                'Crude Mushroom' => 32,
                'Fresh Mushroom' => 12,
                'Exquisite Mushroom' => 4,
                'Heavy Iron Ore' => 6
            ],
            'cost' => 15,
            'amount' => 3,
            'energy' => 144,
            'time' => 30,
            'category' => 'Combat Supplies',
            'sub_category' => 'Bomb'
        ],

        'Destruction Bomb' => [
            'ingredients' => [
                'Crude Mushroom' => 32,
                'Fresh Mushroom' => 12,
                'Exquisite Mushroom' => 4,
                'Heavy Iron Ore' => 6
            ],
            'cost' => 15,
            'amount' => 3,
            'energy' => 144,
            'time' => 30,
            'category' => 'Combat Supplies',
            'sub_category' => 'Bomb'
        ],

        'Pheromone Bomb' => [
            'ingredients' => [
                'Crude Mushroom' => 32,
                'Fresh Mushroom' => 12,
                'Exquisite Mushroom' => 4,
                'Heavy Iron Ore' => 6
            ],
            'cost' => 15,
            'amount' => 3,
            'energy' => 144,
            'time' => 30,
            'category' => 'Combat Supplies',
            'sub_category' => 'Bomb'
        ],

        'Whirlwind Grenade' => [
            'ingredients' => [
                'Crude Mushroom' => 24,
                'Fresh Mushroom' => 12,
                'Exquisite Mushroom' => 3,
                'Tender Timber' => 3
            ],
            'cost' => 15,
            'amount' => 3,
            'energy' => 144,
            'time' => 30,
            'category' => 'Combat Supplies',
            'sub_category' => 'Grenade'
        ],

        'Superior Oreha Fusion Material' => [
            'ingredients' => [
                'Ancient Relic' => 94,
                'Rare Relic' => 29,
                'Oreha Relic' => 16
            ],
            'cost' => 250,
            'amount' => 20,
            'energy' => 288,
            'time' => 60,
            'category' => 'Enhancement Material',
            'sub_category' => 'Honing Materials'
        ]
    ];
}
