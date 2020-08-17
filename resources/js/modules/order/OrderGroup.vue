<template>
  <div class="row">
    <div class="col-md-7">
      <h3>Custom Detail</h3>
      <order-form></order-form>
    </div>
    <div class="col-md-5">
      <h3>Menu</h3>
      <order-menu-items :items = "menuItems"></order-menu-items>
    </div>
  </div>
</template>

<script>
  import OrderForm from "./OrderForm";
  import OrderMenuItems from "./OrderMenuItems";

  export default {
    props: ['restoId']
    ,
    components: {
      OrderForm, OrderMenuItems
    }
    ,
    created() {
      this.loadRestoMenuItem();
    }
    ,
    data() {
      return {
        menuItems: [],
      }
    },
    methods: {
      loadRestoMenuItem() {
        let postData = {restoId: this.restoId};
        axios.post('/api/resto/menu', postData)
          .then(response => console.log('response', this.menuItems = response.data))
          .catch(error => console.log('error', error.response));
      }
    }
  }
</script>
