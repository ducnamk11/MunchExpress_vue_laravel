<template>
  <div class="section">
    <table class="table table-hover table-striped">
      <thead>
      <tr>
        <th>name , Description</th>
        <th>Price</th>
       </tr>
      </thead>
      <tbody>
      <tr v-for="(item, key) in items" :key="key">
        <td>
          <strong v-text="item.name"></strong>
          <p v-text="item.description"></p>
        </td>
        <td>
          <span v-text="item.price"></span>
        </td>

      </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
  export default {
    props:['items'],

  }
</script>
