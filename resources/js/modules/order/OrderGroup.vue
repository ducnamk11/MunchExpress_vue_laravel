<template>
  <div>
    <div class="row mb-5">
      <div class="col-md-12">
        <button @click="handleOrderSave" class="btn btn-success float-right">Save</button>
      </div>
    </div>
    <div class="row">
      <div class="col-md-7">
        <h3>Custom Detail</h3>
        <order-form @customerDetailChanged="customerDetailsHandle"></order-form>
        <h3>Order Detail <span v-if="total>0" class="float-right"> {{total}}</span></h3>
        <order-detail :order-details="orderDetails"></order-detail>
      </div>
      <div class="col-md-5">
        <h3>Order Menu Item</h3>
        <order-menu-items @menuItemAdded="handleNewMenuItem" :items="menuItems"></order-menu-items>
      </div>
    </div>
  </div>
</template>

<script>
  import OrderForm from "./OrderForm";
  import OrderMenuItems from "./OrderMenuItems";
  import OrderDetail from "./OrderDetail";

  export default {
    props: ['restoId']
    ,
    components: {
      OrderForm, OrderMenuItems, OrderDetail,
    }
    ,
    created() {
      this.loadRestoMenuItem();
      window.eventBus.$on('menuItemAdded', this.handleNewMenuItem);
      window.eventBus.$on('filterList', this.handleFilterList);
      window.eventBus.$on('clearFilterList', this.handleClearFilterList);
      window.eventBus.$on('customerDetailChanged', this.handleClearFilterList);
    }
    ,
    data() {
      return {
        menuItems: [],
        orderDetails: [],
        originalMenuItems: [],
        customerDetails: null,
      }
    },
    computed: {
      total() {
        let price = 0;
        this.orderDetails.forEach(order => {
          price = price + order.price;
        });
        return price;
      }
    }
    ,
    methods: {
      loadRestoMenuItem() {
        let postData = {restoId: this.restoId};
        axios.post('/api/resto/menu', postData)
          .then(response => {
            this.menuItems = response.data
            this.originalMenuItems = response.data

          })
          .catch(error => console.log('error', error.response));
      },
      handleNewMenuItem(item) {
        this.orderDetails.unshift(item);
      },
      handleFilterList(filterList) {
        this.menuItems = filterList;
      },
      handleClearFilterList() {
        this.menuItems = this.originalMenuItems;
      },
      customerDetailsHandle(customer) {
        console.log('customere', customer);
        this.customerDetails = customer;
      },
      handleOrderSave() {
        let orderDetailsId = [];
        this.orderDetails.forEach(item => {
          orderDetailsId.push(item.id);
        });
        let orderData = {
          customerDetails: this.customerDetails,
          total: this.total,
          orderDetails: orderDetailsId,
        };
        axios.post('/api/order/save', orderData).then(response => console.log('response', response));
      }
    }
  }
</script>
