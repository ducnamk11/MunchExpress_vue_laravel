<template>
  <div class="resto_add_form wrapper__group mb-5">
    <h3>Add a new restaurant</h3>

    <div class="form-group">
      <label for="name">Name</label>
      <input v-model="resto.name" type="text" class="form-control" name="name" placeholder="Enter Name">
    </div>
    <div class="form-group">
      <label for="name">Location</label>
      <input v-model="resto.location" type="text" class="form-control" name="location" placeholder="Enter Location">
    </div>
    <div class="form-group">
      <label for="name">Number Of Table</label>
      <input v-model="resto.tables" type="number" class="form-control" name="tables" placeholder="Enter Table">
    </div>
    <button @click="handleAddButton" class="btn btn-primary">Add</button>
    <button @click="handleCancelButton" class="btn btn-warning">Cancel</button>
  </div>
</template>

<script>
  import axios from 'axios';
  export default {
    created() {
      axios.get('/api/user').then(response => {
          console.log('user',response.data);
        });
    },
    data() {
      return {
        resto: this.basicResto(),
      }
    },
    methods: {
      basicResto() {
        return {name: '', location: '', tables: 0};
      },
      handleAddButton() {
        this.$emit('addRestoEvent', this.resto);

      },
      handleCancelButton() {
        this.$emit('modalCancel');
      }

    }
  }
</script>
