<?php

    header("Access-Control-Allow-Origin: http://localhost:5173");

    header("Access-Control-Allow-Headers: X-Requested-With");

    header('Content-Type: application/json');

    $jsonTodoList = file_get_contents("todo.json", $index);

    $todoList = json_decode($jsonTodoList); 

    $index = $_GET['index'];

    unset($todoList[$index]);

    $jsonTodoList = json_encode(array_values($todoList));

    file_put_contents("todo.json", $jsonTodoList);