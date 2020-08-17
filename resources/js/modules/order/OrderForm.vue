<template>
  <div class="wrapper">
    <form action="">
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" v-model="customer.name">
      </div>
      <div class="form-group">
        <label for="name">phone</label>
        <input type="text" class="form-control" v-model="customer.phone">
      </div>
      <div class="form-group">
        <label for="name">address</label>
        <input type="text" class="form-control" v-model="customer.address">
      </div>

    </form>

  </div>
</template>

<script>
  export default {
    data() {
      return {
        customer: {
          name: '',
          phone: '',
          address: '',
        }
      }
    }
  }
</script>
