<template>
  <div class="wrapper">

    <ul class="list-group">
      <li class="list-group-item" v-for="(orderDetail, key) in orderDetails " :key="key">
        {{orderDetail.name}} <span class="float-right">{{orderDetail.price}}</span>
        <br>
        <small>
          <!--  {{item.category.id}}-->
          category name</small>
      </li>

    </ul>

  </div>
</template>

<script>
  export default {
    props: ['orderDetails'],
    data() {
      return {
        customer: {
          name: '',
          phone: '',
          address: '',
        }
      }
    },

  }
</script>
