<?php
// Полезные массивы с данными. В этом задании мы научимся хранить данные в массивах
// Для хранения однородных структурированных данных очень хорошо подходят ассоциативные массивы


// 1. Создайте ассоциативный массив животных $animals
// данные, которые нужно хранить в этом массиве: мышь - это грызун, конь - скачет по полям, хрюшка - кушает желуди
$animals = [
    "mouse" => [
        "animal" => "Мышь",
        "animalDescription" => "это грызун",
    ],
    "horse" => [
        "animal" => "Конь",
        "animalDescription" => "скачет по полям",
    ],
    "pig" => [
        "animal" => "Хрюшка",
        "animalDescription" => "кушает желуди",
    ]
];


// 2. Доработаем этот массив, добавим в него больше данных, теперь для каждого животного у нас будет не только описание, но и другие параметры:
// мышь - это грызун, 4 лапы, хвост: лысый
// конь - скачет по полям, 4 ноги, хвост: пушистый
// хрюшка - кушает желуди, 4 ноги, хвост: крючком
$animals = [
    "mouse" => [
        "animal" => "Мышь",
        "animalDescription" => "это грызун",
        "legsNumber" => 4,
        "tailKind" => "хвост: лысый"
    ],
    "horse" => [
        "animal" => "Конь",
        "animalDescription" => "скачет по полям",
        "legsNumber" => 4,
        "tailKind" => "хвост: пушистый"
    ],
    "pig" => [
        "animal" => "Хрюшка",
        "animalDescription" => "кушает желуди",
        "legsNumber" => 4,
        "tailKind" => "хвост: крючком"
    ]
];


// 3. Добавим еще одно уточнение, теперь мы знаем, чуть больше о хвостах:
// хвост мыши - лысый, 10 см
// хвост коня - пушистый, 50 см
// хвост хрюшки - крючком, 4 см
$animals = [
    "mouse" => [
        "animal" => "Мышь",
        "animalDescription" => "это грызун",
        "legsNumber" => 4,
        "tail" => [
            "tailKind" => "лысый",
            "tailLenght" => "10 см"
        ]
    ],
    "horse" => [
        "animal" => "Конь",
        "animalDescription" => "скачет по полям",
        "legsNumber" => 4,
        "tail" => [
            "tailKind" => "пушистый",
            "tailLenght" => "50 см"
        ]
    ],
    "pig" => [
        "animal" => "Хрюшка",
        "animalDescription" => "кушает желуди",
        "legsNumber" => 4,
        "tail" => [
            "tailKind" => "крючком",
            "tailLenght" => "4 см"
        ]
    ]
];


// 4. А теперь опишем, ферму на которой живут эти животный. На ферме есть разные домики для зверьков.
// Создайте массив $buildings с описанием домов, ключом каждого дома сделайте название дома на английском языке
// На ферме есть следующие дома:
// Жилой дом, этажей 2, цвет - синий
// Стойла, этаже 1, цвет - зеленый
// Будка, этажей 1, цвет - красный
// Элитный-гараж, этажей 5, цвет - черный
$buildings = [
    "house" => [
        "building" => "Жилой дом",
        "floorsNumber" => 2,
        "buildingColor"=> "синий"
    ],
    "stable" => [
        "building" => "Стойла",
        "floorsNumber" => 1,
        "buildingColor"=> "зеленый"
    ],
    "cabin" => [
        "building" => "Будка",
        "floorsNumber" => 1,
        "buildingColor"=> "красный"
    ],
    "eliteGarage" => [
        "building" => "Элитный-гараж",
        "floorsNumber" => 5,
        "buildingColor"=> "черный"
    ]
];


// 5. Теперь нам нужно расселить животных по домам, добавьте каждому животному поле, в котором укажите где оно живет
// В качестве значения используйте ключ из массива $buildings
// мышь живет в жилом доме
// конь живет в стойле
// хрюшка тоже живет в стойле
$animals = [
    "mouse" => [
        "animal" => "Мышь",
        "animalDescription" => "это грызун",
        "legsNumber" => 4,
        "tail" => [
            "tailKind" => "лысый",
            "tailLenght" => "10 см"
        ],
        "animalLiveIn" => $buildings["house"]
    ],
    "horse" => [
        "animal" => "Конь",
        "animalDescription" => "скачет по полям",
        "legsNumber" => 4,
        "tail" => [
            "tailKind" => "пушистый",
            "tailLenght" => "50 см"
        ],
        "animalLiveIn" => $buildings["stable"]
    ],
    "pig" => [
        "animal" => "Хрюшка",
        "animalDescription" => "кушает желуди",
        "legsNumber" => 4,
        "tail" => [
            "tailKind" => "крючком",
            "tailLenght" => "4 см"
        ],
        "animalLiveIn" => $buildings["stable"]
    ]
];


// 6. Теперь нам нужно поделиться информацией о всей ферме с кем-то, но на почте нам сказали, что мы можем отправить только одну переменную
// Создайте переменную $farm с двумя полями animals и buildings и поместите в них значения из соответствующих массивов
$farm = [
    "animals" => $animals,
    "buildings" => $buildings
];


// 7. Теперь представим, что вы получатель этого письма.
// Почта наконец пришла и вы открыли конверт, а там массив $farm. Используя этот массив, выполните следующее:
// выведите сколько лап у хрюшки
var_dump($farm["animals"]["pig"]["legsNumber"]);

// выведите какого цвета будка
var_dump($farm["buildings"]["cabin"]["buildingColor"]);

// выведите длину хвоста местных коней
var_dump($farm["animals"]["horse"]["tail"]["tailLenght"]);

// Выведите название помещения, в котором живет мышь
var_dump($farm["animals"]["mouse"]["animalLiveIn"]["building"]);

// создайте переменную $animal и поместите в нее имя одного любого животного из названий животных
// используйте имя на английском языке, т.е. один из ключей массива $animals
// Выведите описание животного, на который указывает значение переменной $animal
$animal = "horse";
var_dump($farm['animals'][$animal]);