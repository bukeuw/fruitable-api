<?php

namespace App\Http\Controllers;

use App\Fruit;
use Illuminate\Http\Request;

class FruitController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->query('per_page', 10);

        if ($perPage >= 500) {
            $perPage = 500;
        }

        $fruits = Fruit::paginate($perPage);

        return response()->json([
            $fruits,
        ]);
    }

    public function show($fruitId)
    {
        $fruit = Fruit::findOrFail($fruitId);

        return response()->json([
            'data' => $fruit,
        ]);
    }
}
