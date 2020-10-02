<?php

// $carro1 = [
//     'LMS-2312' => [
//         'marca' => 'VW',
//         'modelo' => 'Golf',
//         'ano' => 1999
//     ]
// ];

$carros = [
    'LMS-2312' => [
        'marca' => 'VW',
        'modelo' => 'Golf',
        'ano' => 1999
    ],
    'QML-8423' => [
        'marca' => 'Chevrolet',
        'modelo' => 'Astra',
        'ano' => 2000
    ]
];

foreach ($carros as $placa => $carro){
    echo $placa . ': ' . 
    $carro['marca'] . ' ' .
    $carro['modelo'] . ' ' .
    $carro['ano'] . PHP_EOL;
}