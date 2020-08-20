<template>
  <div class="wrapper mb-2">
    <input type="text" class="form-control" v-model="searchString" placeholder="Search here...">
  </div>
</template>

<script>
  export default {
    props: ['items'],
    data() {
      return {
        searchString: ''
      }
    },
    computed: {
      filterList() {
        return this.items.filter(item => {
          return item.name.toLowerCase().includes(this.searchString.toLowerCase());
        })
      }
    }
    ,
    watch: {
      searchString(value) {
        if (value != '') {
          window.eventBus.$emit('filterList', this.filterList);
        } else {
          window.eventBus.$emit('clearFilterList', this.filterList);
        }
      }
    }

  }
</script>

<style scoped>

</style>
