<?php

return [
    'livewire' => false,

    'buttons' => [
        'default' => [
            'text-styles'=> '',
            'bg-color' => 'bg-gray-100',
        ],
    ],

    'app' => [
        'bg-color' => 'bg-gray-50 dark:bg-gray-900',
        'text-color' => 'text-black dark:text-white',
        'name-color'=> 'text-brand-mid', #defaults to app-text-color if unset
        'name-color-login'=>'text-brand-mid', #defaults to app-text-color
        'rounded' => 'rounded-sm',
        'border-color' => 'border-grey-500',
    ],

    'card' => [
        'border' => 'border-t-4 border-secondary-mid',
        'bg-color' => 'bg-white dark:bg-gray-500 dark:bg-opacity-25',
        'text-color' => 'text-black dark:text-white',
    ],

    'colors'=>[
        "no" => "#ec008e",
        "yes"=>"#8cc73f",
        "success"=>[
            "light"=>"#d1e9b2",
            "mid"=>"#8cc73f",
            "dark"=>"#385019"
        ],
        "info"=>[
            "light"=>"#99def9",
            "mid"=>"#00adef",
            "dark"=>"#004560",
        ],
        "warning"=>[
            "light"=>"#fddca3",
            "mid"=>"#faa81a",
            "dark"=>"#64430a"
        ],
        "danger"=>[
            "light"=>"#f799d2",
            "mid"=>"#ec008e",
            "dark"=>"#5e0039"
        ],
        "brand"=>[
            "light"=>"#fca5a5",
            "mid"=>"#b91c1c",
            "dark"=>"#7f1d1d",
        ],
        "secondary"=>[
            "light"=>"#0689B1",
            "mid"=>"#045C77",
            "dark"=>"#022E3B",
        ],
        "gray"=>[
            "50"=>  "#F6F6F6",
            "100"=> "#D4D4D4",
            "200"=> "#B3B3B3",
            "300"=> "#A2A2A2",
            "400"=> "#919191",
            "500"=> "#808080",
            "600"=> "#666666",
            "700"=> "#4d4d4d",
            "800"=> "#333333",
            "900"=> "#1a1a1a",
            "950"=> "#080808"
        ],
        "white"=>"#FFFFFF",
        "black"=>"#000000"
    ]
];