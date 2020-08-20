<template>
  <ul class="list-group">
    <li class="list-group-item" v-for="(item,key) in items" :key="key">
      <div class="row">
        <div class="col-md-10">
          {{item.name}}
          <span class="float-right">{{item.price}}</span>
          <br>
          <small>   <!--  {{item.category.id}}-->   category name</small></div>
        <div class="col-md-2">
          <button @click="handleAddButton(item)" class="btn btn-primary">Add</button>
        </div>
      </div>
    </li>
  </ul>
</template>

<script>
  export default {
    props: ['items'],
    methods: {
      handleAddButton(item) {
        console.log('handleAddButton',item);
        window.eventBus.$emit('menuItemAdded', item);
      }
    }

  }
</script>

<style scoped>

</style>
