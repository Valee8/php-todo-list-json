<script>

import axios from 'axios';

const urlApi = "http://localhost/";

export default {
    name: "TodoList",
    data() {
        return {
            todoList: [],
            newElem: '',
        }
    },
    methods: {
        formSubmit(e) {
            e.preventDefault();

            const params = {
                params: {
                    'newElem': this.newElem
                }
            };

            this.newElem = "";

            axios.get(urlApi + "api-create-todo.php", params)

                .then(() => {

                    this.getElements();
                });
        },
        getElements() {
            axios.get(urlApi + "api.php")
                .then(res => {

                    this.todoList = res.data;

                    console.log(this.todoList);

                });
        },
        deleteTask() {

            axios.get(urlApi + "delete-task.php");
        }
    },
    mounted() {
        this.getElements();
    }
}
</script>

<template>
    <h1>
        Todo List
    </h1>

    <ul>
        <li v-for="(list, index) in todoList" :key="index">
            <div>
                {{ list.subject }}

                <span @click="deleteTask">
                    <a href="">
                        Elimina
                    </a>
                </span>
            </div>
        </li>
    </ul>

    <form @submit="formSubmit">
        <input type="text" name="newElem" placeholder="Inserisci elemento..." v-model="newElem">
        <input type="submit" value="Inserisci">
    </form>
</template>

<style lang="scss" scoped>
h1 {
    color: red;
}
</style>
