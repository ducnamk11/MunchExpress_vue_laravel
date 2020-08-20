<template>
  <div class="wrapper">
    <form action="">
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" v-model="name">
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
        name: '',
        customer: {
          name: '',
          phone: '',
          address: '',
        }
      }
    },
    watch: {
      customer: {
        handler(value) {
           let customer = {
             name: value.name,
             phone: value.phone,
             address: value.address,
           }
           this.$emit('customerDetailChanged',customer)
        }, deep: true
      }
    }
  }
</script>
