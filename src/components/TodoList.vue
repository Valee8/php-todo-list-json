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
        addTask(e) {
            e.preventDefault();

            const params = {
                params: {
                    'newElem': this.newElem
                }
            };

            this.newElem = "";

            axios.get(urlApi + "add-task.php", params)

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
        deleteTask(index) {

            axios.get(urlApi + "delete-task.php", { params: { index } });
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

    <ul class="todo-list">
        <li v-for="(list, index) in todoList" :key="index">
            <span :class="{ completed: list.completed }">
                {{ list.subject }}
            </span>

            <span @click="deleteTask(index)">
                <a href="/">
                    <font-awesome-icon icon="fa-solid fa-trash" class="icon-delete" />
                </a>
            </span>
        </li>
    </ul>

    <form @submit="addTask" class="form-todo">
        <input type="text" name="newElem" placeholder="Inserisci elemento..." v-model="newElem" class="input-text">
        <input type="submit" value="Inserisci" class="input-button">
    </form>
</template>

<style lang="scss" scoped>
h1 {
    color: #6C757D;
    text-align: center;
    font-size: 4rem;
    font-weight: normal;
}

.todo-list {
    list-style-type: none;
    background-color: #fff;
    border-radius: 3px;
    margin: 20px 0;

    li {
        border-bottom: 1px solid #EAEAEA;
        height: 50px;
        padding: 10px 15px;
        display: flex;
        justify-content: space-between;
        align-items: center;

        .icon-delete {
            background-color: #DC3545;
            color: #fff;
            padding: 8px;
            border-radius: 3px;
        }

        &:last-child {
            border-bottom: 0;
        }
    }
}

.input-text {
    background-color: #fff;
    border-radius: 3px 0 0 3px;
    padding: 10px 65px 10px 10px;
    border: 1px solid #fff;
}

.input-button {
    background-color: #001632;
    border-radius: 0 3px 3px 0;
    border: 1px solid #A78615;
    padding: 10px;
    color: #A78615;
    cursor: pointer;
}

.completed {
    text-decoration: line-through;
}
</style>
