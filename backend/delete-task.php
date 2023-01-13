<?php

    header("Access-Control-Allow-Origin: http://localhost:5173");

    header("Access-Control-Allow-Headers: X-Requested-With");

    header('Content-Type: application/json');

    $jsonTodoList = file_get_contents("todo.json");

    $todoList = json_decode($jsonTodoList);

    foreach($todoList as $key => $value) {
        array_splice($todoList, $key, 1);
    }

    $jsonTodoList = json_encode($todoList);

    file_put_contents("todo.json", $jsonTodoList);