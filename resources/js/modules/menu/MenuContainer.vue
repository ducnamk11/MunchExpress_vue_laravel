<template>
  <div class="wrapper menu__container">
    <div class="row">
      <div class="col-md-8">
        <card-component>
          <template slot="title"> my Menu Item</template>
          <template slot="main">
            <div class='section'>
              <multiselect v-model="menu" :options="categories"></multiselect>
            </div>
            <menu-groups :items="currentmenuItem"></menu-groups>
          </template>
        </card-component>
      </div>
      <div class="col-md-4">
        <card-component>
          <template slot="title"> add Menu Item</template>
          <template slot="main">
            <menu-add-form
              :categories="categories"
              :resto-id="restoId"
              v-on:newMenuItemAdded="handleNewMenuItem"
            ></menu-add-form>
          </template>
        </card-component>
      </div>
    </div>
  </div>
</template>

<script>
  import _ from 'lodash';
  import Multiselect from 'vue-multiselect';
  import MenuGroups from "./MenuGroups";
  import MenuAddForm from "./MenuAddForm";

  export default {
    props: ['items', 'restoId'],
    components: {
      Multiselect, MenuGroups, MenuAddForm
    },
    created() {
      _.forEach(this.items, (item, key) => {
        this.categories.push(key);
      });
      this.menu = this.categories[0];
      this.localItems = this.items;
    },
    data() {
      return {
        localItem: '',
        menu: '',
        categories: [],
      }
    },
    computed: {
      currentmenuItem() {
        return this.localItems[this.menu];
      }
    },
    methods: {
      handleNewMenuItem(item, category) {
        console.log('category-handleNewMenuItem', category);
        console.log('item-handleNewMenuItem', item);
        console.log(' this.localItems[category]', this.localItems[category]);
        this.localItems[category].unshift(item);
      }
    }
  }
</script>
