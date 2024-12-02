<?php

namespace Laptop\Shop\Demo;

class Demo
{
    public static function getData() {
        return [
            'laptop_shop_manufacturer' => [
                ['NAME' => 'ASUS'],
                ['NAME' => 'MSI'],
                ['NAME' => 'LENOVO'],
                ['NAME' => 'HP'],
            ],
            'laptop_shop_model' => [
                ['NAME' => 'TUF', 'MANUFACTURER_ID' => 1],
                ['NAME' => 'LEOPARD', 'MANUFACTURER_ID' => 2],
                ['NAME' => 'LEGION', 'MANUFACTURER_ID' => 3],
                ['NAME' => 'OMEN', 'MANUFACTURER_ID' => 4],
            ],
            'laptop_shop_laptop' => [
                ['NAME' => 'F15', 'YEAR' => 2020, 'PRICE' => 85000.00, 'MODEL_ID' => 1],
                ['NAME' => 'GP66', 'YEAR' => 2023, 'PRICE' => 96000.00, 'MODEL_ID' => 2],
                ['NAME' => '5 PRO16', 'YEAR' => 2022, 'PRICE' => 105000.00, 'MODEL_ID' => 3],
                ['NAME' => '17EN', 'YEAR' => 2021, 'PRICE' => 114000.00, 'MODEL_ID' => 4],
            ],
            'laptop_shop_option' => [
                ['NAME' => 'SSD'],
                ['NAME' => 'M2'],
                ['NAME' => 'HDMI'],
                ['NAME' => 'OLED'],
                ['NAME' => 'COLOR KEYBOARD'],
                ['NAME' => '165HZ'],
            ],
            'laptop_shop_laptop_option' => [
                ['LAPTOP_ID' => 1, 'OPTION_ID' => 1],
                ['LAPTOP_ID' => 1, 'OPTION_ID' => 2],
                ['LAPTOP_ID' => 1, 'OPTION_ID' => 3],
                ['LAPTOP_ID' => 1, 'OPTION_ID' => 4],
                ['LAPTOP_ID' => 1, 'OPTION_ID' => 5],
                ['LAPTOP_ID' => 1, 'OPTION_ID' => 6],
                ['LAPTOP_ID' => 2, 'OPTION_ID' => 1],
                ['LAPTOP_ID' => 2, 'OPTION_ID' => 2],
                ['LAPTOP_ID' => 2, 'OPTION_ID' => 3],
                ['LAPTOP_ID' => 2, 'OPTION_ID' => 4],
                ['LAPTOP_ID' => 2, 'OPTION_ID' => 5],
                ['LAPTOP_ID' => 2, 'OPTION_ID' => 6],
                ['LAPTOP_ID' => 3, 'OPTION_ID' => 2],
                ['LAPTOP_ID' => 3, 'OPTION_ID' => 3],
                ['LAPTOP_ID' => 3, 'OPTION_ID' => 4],
                ['LAPTOP_ID' => 3, 'OPTION_ID' => 6],
                ['LAPTOP_ID' => 4, 'OPTION_ID' => 1],
                ['LAPTOP_ID' => 4, 'OPTION_ID' => 2],
                ['LAPTOP_ID' => 4, 'OPTION_ID' => 5],
                ['LAPTOP_ID' => 4, 'OPTION_ID' => 6],
            ]

        ];
    }

}