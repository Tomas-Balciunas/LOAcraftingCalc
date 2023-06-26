<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Recipes\Recipes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use function Webmozart\Assert\Tests\StaticAnalysis\integer;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Recipes $recipe): void
    {
        $list = $recipe->allRecipes();

        foreach ($list as $key => $item)
        {
            DB::table('recipes')->insert([
                'name' => $key,
                'cost' => $item['cost'],
                'amount' => $item['amount'],
                'energy' => $item['energy'],
                'time' => $item['time'],
                'ingredients' => json_encode($item['ingredients']),
                'category' => $item['category'],
                'sub_category' => $item['sub_category'],
                'category_id' => intval(Category::where('category', $item['category'])->first('id')->id),
                'is_splendid' => $item['is_splendid'] ?? false,
                'splendid_ingredient' => $item['splendid_ingredient'] ?? null
            ]);
        }
    }
}
