<script>
import TodoList from './components/TodoList.vue'


export default {
  name: "App",
  components: {
    TodoList,
  }
}
</script>

<template>
  <div class="container">
    <TodoList />
  </div>
</template>

<style lang="scss">
@use '../src/styles/general.scss' as *;
</style>
