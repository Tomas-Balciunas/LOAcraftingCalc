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
            'recipe' => [
                'Wild Flower' => 48,
                'Shy Wild Flower' => 24,
                'Bright Wild Flower' => 6
            ],
            'cost' => 30,
            'amount' => 3,
            'energy' => 288,
            'time' => 60

        ],

        'Panacea' => [
            'recipe' => [
                'Crude Mushroom' => 32,
                'Fresh Mushroom' => 16,
                'Exquisite Mushroom' => 4,
                'Rare Relic' => 5
            ],
            'cost' => 15,
            'amount' => 3,
            'energy' => 144,
            'time' => 30

        ],

        'Atropine Potion' => [
            'recipe' => [
                'Wild Flower' => 48,
                'Shy Wild Flower' => 24,
                'Bright Wild Flower' => 6,
                'Rare Relic' => 2,
                'Strong Iron Ore' => 2
            ],
            'cost' => 30,
            'amount' => 3,
            'energy' => 288,
            'time' => 60
        ],

        'Major HP Potion' => [
            'recipe' => [
                'Wild Flower' => 18,
                'Shy Wild Flower' => 9,
            ],
            'cost' => 15,
            'amount' => 3,
            'energy' => 144,
            'time' => 30
        ],

        'Stimulant' => [
            'recipe' => [
                'Crude Mushroom' => 40,
                'Fresh Mushroom' => 20,
                'Exquisite Mushroom' => 5,
                'Rare Relic' => 4,
                'Sturdy Timber' => 2
            ],
            'cost' => 30,
            'amount' => 3,
            'energy' => 288,
            'time' => 60
        ],

        'Corrosive Bomb' => [
            'recipe' => [
                'Crude Mushroom' => 32,
                'Fresh Mushroom' => 12,
                'Exquisite Mushroom' => 4,
                'Heavy Iron Ore' => 6
            ],
            'cost' => 15,
            'amount' => 3,
            'energy' => 144,
            'time' => 30
        ],

        'Destruction Bomb' => [
            'recipe' => [
                'Crude Mushroom' => 32,
                'Fresh Mushroom' => 12,
                'Exquisite Mushroom' => 4,
                'Heavy Iron Ore' => 6
            ],
            'cost' => 15,
            'amount' => 3,
            'energy' => 144,
            'time' => 30
        ],

        'Pheromone Bomb' => [
            'recipe' => [
                'Crude Mushroom' => 32,
                'Fresh Mushroom' => 12,
                'Exquisite Mushroom' => 4,
                'Heavy Iron Ore' => 6
            ],
            'cost' => 15,
            'amount' => 3,
            'energy' => 144,
            'time' => 30
        ],

//        '' => [
//            'recipe' => [
//                '',
//                '',
//                ''
//            ],
//            'cost' => 0,
//            'amount' => 0,
//            'energy' => 0,
//            'time' => 0
//        ],
//        '' => [
//            'recipe' => [
//                '',
//                '',
//                ''
//            ],
//            'cost' => 0,
//            'amount' => 0,
//            'energy' => 0,
//            'time' => 0
//        ],
//        '' => [
//            'recipe' => [
//                '',
//                '',
//                ''
//            ],
//            'cost' => 0,
//            'amount' => 0,
//            'energy' => 0,
//            'time' => 0
//        ],
//        '' => [
//            'recipe' => [
//                '',
//                '',
//                ''
//            ],
//            'cost' => 0,
//            'amount' => 0,
//            'energy' => 0,
//            'time' => 0
//        ],
//        '' => [
//            'recipe' => [
//                '',
//                '',
//                ''
//            ],
//            'cost' => 0,
//            'amount' => 0,
//            'energy' => 0,
//            'time' => 0
//        ],
//        '' => [
//            'recipe' => [
//                '',
//                '',
//                ''
//            ],
//            'cost' => 0,
//            'amount' => 0,
//            'energy' => 0,
//            'time' => 0
//        ],
//        '' => [
//            'recipe' => [
//                '',
//                '',
//                ''
//            ],
//            'cost' => 0,
//            'amount' => 0,
//            'energy' => 0,
//            'time' => 0
//        ],
    ];
}
