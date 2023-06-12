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
//        '' => [
//            'recipe' => [
//                '',
//                '',
//                ''
//            ],
//            'stats' => [
//                'cost' => 0,
//                'amount' => 0,
//                'energy' => 0,
//                'time' => 0
//            ]
//        ],
//        '' => [
//            'recipe' => [
//                '',
//                '',
//                ''
//            ],
//            'stats' => [
//                'cost' => 0,
//                'amount' => 0,
//                'energy' => 0,
//                'time' => 0
//            ]
//        ],
//        '' => [
//            'recipe' => [
//                '',
//                '',
//                ''
//            ],
//            'stats' => [
//                'cost' => 0,
//                'amount' => 0,
//                'energy' => 0,
//                'time' => 0
//            ]
//        ],
//        '' => [
//            'recipe' => [
//                '',
//                '',
//                ''
//            ],
//            'stats' => [
//                'cost' => 0,
//                'amount' => 0,
//                'energy' => 0,
//                'time' => 0
//            ]
//        ],
//        '' => [
//            'recipe' => [
//                '',
//                '',
//                ''
//            ],
//            'stats' => [
//                'cost' => 0,
//                'amount' => 0,
//                'energy' => 0,
//                'time' => 0
//            ]
//        ],
//        '' => [
//            'recipe' => [
//                '',
//                '',
//                ''
//            ],
//            'stats' => [
//                'cost' => 0,
//                'amount' => 0,
//                'energy' => 0,
//                'time' => 0
//            ]
//        ],
//        '' => [
//            'recipe' => [
//                '',
//                '',
//                ''
//            ],
//            'stats' => [
//                'cost' => 0,
//                'amount' => 0,
//                'energy' => 0,
//                'time' => 0
//            ]
//        ],
//        '' => [
//            'recipe' => [
//                '',
//                '',
//                ''
//            ],
//            'stats' => [
//                'cost' => 0,
//                'amount' => 0,
//                'energy' => 0,
//                'time' => 0
//            ]
//        ],
//        '' => [
//            'recipe' => [
//                '',
//                '',
//                ''
//            ],
//            'stats' => [
//                'cost' => 0,
//                'amount' => 0,
//                'energy' => 0,
//                'time' => 0
//            ]
//        ],
//        '' => [
//            'recipe' => [
//                '',
//                '',
//                ''
//            ],
//            'stats' => [
//                'cost' => 0,
//                'amount' => 0,
//                'energy' => 0,
//                'time' => 0
//            ]
//        ],
//        '' => [
//            'recipe' => [
//                '',
//                '',
//                ''
//            ],
//            'stats' => [
//                'cost' => 0,
//                'amount' => 0,
//                'energy' => 0,
//                'time' => 0
//            ]
//        ],
    ];
}
