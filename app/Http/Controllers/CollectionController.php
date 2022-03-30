<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function average()
    {
        $data = [10,20,30];

        $data2 = [
            [
                "price" => 10000,
                "tax" => 500,
                "active" => true,
            ],
            [
                "price" => 1000,
                "tax" => 700,
                "active" => false,
            ],
            [
                "price" => 20000,
                "tax" => 900,
                "active" => false,
            ]
        ];

        //return collect($data)->average();

        return collect($data2)->average(function ($value) {

            if(!$value['active']) return null;
            return $value['price'] + $value['tax'];

        });
    }

    public function max()
    {
        $data = [
            10000,
            20000,
            30000
        ];

        $data2 = [
            ['price' => 10000, 'tax' => 500, 'active' => true],
            ['price' =>20000, 'tax' => 700, 'active' => true],
            ['price' =>30000, 'tax' => 900, 'active' => true],
            ['price' =>70000, 'tax' => 950, 'active' => false]
        ];

        // return collect($data)->max();
        // return collect($data2)->max('price');

        return collect($data2)->max(function ($value) {
            if(!$value['active']) return null;

            return $value['price'] + $value['tax'];
        });
    }

    public function median()
    {
        $data = [
            10000,
            20000,
            30000
        ];

        $data2 = [
            ['price' => 10000],
            ['price' => 21000],
            ['price' => 35000],
            ['price' => 20000],
        ];

        // return collect($data)->median();
        return collect($data2)->median('price');
    }

    public function min()
    {
        $data = [
            10000,
            20000,
            30000
        ];

        $data2 = [
            ['price' => 10000, 'tax' => 500, 'active' => false],
            ['price' => 21000, 'tax' => 700, 'active' => true],
            ['price' => 35000, 'tax' => 800, 'active' => false],
            ['price' => 20000, 'tax' => 950, 'active' => true],
        ];

        // return collect($data)->min();

        return collect($data2)->min(function ($value) {

            if(!$value['active']) return null;

            return $value['price'] + $value['tax'];
        });
    }

    public function collapse()
    {
        $data = [
            [1,2,3],
            [4,5,6]
        ];

        $data2 = [
            [0 => ["array1"]],
            [1 => ["array2"]],
            [3,4,5]
        ];

        return collect($data2)->collapse();

        // return collect($data2)->collapse(function ($value) {

        //     if (!$value['active']) return null;

        //     return $value['price'] + $value['tax'];
        // });
    }
}
