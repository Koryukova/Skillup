<pre>
<?php

//строка
$string = 'some text';
var_dump($string);

//число
$integer = 5;
var_dump((string)$integer);

//Число с плавающей точкой
$float = 16.5;
var_dump($float);

//булевое значение
$bool = true;
var_dump($bool);


//Значение NULL
$null = null;
var_dump((bool)$null);

//Массив
$array = [
    'red',
    'green',
    'blue',
    'black',
    'new_color' => [
    'yellow',
    'orange',
    ]
];

var_dump($array);


//Ассоциативный массив
$assocArray = [
    'name' => 'Vasya',
    'age' => 18,
    'grow' => 175.16,
    'is_smoking' => false,
    'rate' => [
        [
            'rate' => 3,
            'teacher' => 'Ivanova 0',
        ]
    ],

];
$assocArray['lastname'] = 'Ivanov';

$user['rate'][] = [
    'rate' => 5,
    'teacher' => 'Ivanova 1'
];

$assocArray['rate'][] = [
    'rate' => 4,
    'teacher' => 'Ivanova 2'
];



var_dump($assocArray);

var_dump(count($user['rate']));
var_dump(count($user['']));

?>
</pre>
