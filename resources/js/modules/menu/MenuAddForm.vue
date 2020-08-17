<template>
  <div class="add_form__wrapper">
    <form v-on:submit.prevent="handleSubmit">
      <div class="form-group">
        <label>Food item</label>
        <input v-model="food.item" class="form-control " type="text" placeholder="Enter food item Name">
        <div class="validation-message" v-text="validation.getMessage('item')"></div>
      </div>

      <div class="form-group">
        <label>Select Category</label>
        <multiselect v-model="food.category" :options="categories"></multiselect>
        <div class="validation-message" v-text="validation.getMessage('category')"></div>

      </div>

      <div class="form-group">
        <label  >Description</label>
        <textarea class="form-control" v-model="food.description" id="" cols="10" rows="5" placeholder="Enter food Description"></textarea>
        <div class="validation-message" v-text="validation.getMessage('description')"></div>
      </div>

      <div class="form-group">
        <label  >Food price</label>
        <input class="form-control " type="number" placeholder="Enter food item Price" v-model="food.price">
        <div class="validation-message" v-text="validation.getMessage('price')"></div>
      </div>

      <div class="form-group">
        <button class="btn btn-primary"> save</button>
      </div>
    </form>
  </div>
</template>

<script>
  import Multiselect from 'vue-multiselect';
  import Validation from "../../utils/Validation";

  export default {
    props: ['categories', 'restoId'],
    data() {
      return {
        food: this.getBasicMenuItem(),
        validation: new Validation()
      }
    },
    components: {
      Multiselect,
    },
    methods: {
      handleSubmit() {
        console.log('dataForm ', this.food);
        let postData = this.food;
        postData.restoId = this.restoId;
        window.axios.post('api/item/save', postData).then(response => {
          this.$emit('newMenuItemAdded', response.data, postData.category);
          console.log('response-data', response.data);
          console.log('postData-category', postData.category);
        }).catch(error => {
            console.log('ERROR', error.response);
            if (error.response.status == 422) {
              console.log('hasError', error.response.data.errors)
              this.validation.setMessage(error.response.data.errors);
            }
          }
        )
        ;
      },
      getBasicMenuItem() {
        return {
          item: '',
          description: '',
          category: '',
          price: 10000,
        }
      },
    }
  }
</script>
