<?php

$todoList = [
    [
        "subject" => "HTML",
        "completed" => true
    ],
    [
        "subject" => "CSS",
        "completed" => true
    ],
    [
        "subject" => "Responsive design",
        "completed" => true
    ],
    [
        "subject" => "PHP",
        "completed" => true
    ],
    [
        "subject" => "Laravel",
        "completed" => false
    ]
];

$jsonTodoList = json_encode($todoList);

file_put_contents("todo.json", $jsonTodoList);