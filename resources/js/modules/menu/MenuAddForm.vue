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
        <label for="name">Food price</label>
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
          console.log('response', response.data);
        }).catch(error => {
            console.log('ERROR', error.response);
            if (error.response.status == 422) {
              console.log('hello',error.response.data.errors)
              this.validation.setMessage(error.response.data.errors);
            }
          }
        )
        ;
      },
      getBasicMenuItem() {
        return {
          item: '',
          category: [],
          price: 10000,
        }
      },
    }

  }
</script>
