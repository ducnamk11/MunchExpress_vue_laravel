<template>
  <div class="resto wrapper__group mb-5">
    <div class="row">
      <div class="col-md-4" v-for="resto in localResto " :key="resto.id">
        <card-component>
          <template slot="title">{{resto.name}}</template>
          <template slot="main">{{resto.location}}
            <br>
            <a v-bind:href="resto.slug" class="card-link">Menu</a>
            <a v-bind:href="resto.ordersSlug" class="card-link">Order</a>
          </template>
        </card-component>
      </div>
      <div class="col-md-4" v-if="showAddForm">
        <card-component>
          <template slot="title">Add new Restauran</template>
          <template slot="main">
            <span @click="handleAddNewResto">+</span>
          </template>
        </card-component>

        <modal name="add-new-resto" height="55%">
          <div class="container-padding">
            <resto-add-form @addRestoEvent="handleSaveResto" @modalCancel="cancelButton"></resto-add-form>
          </div>
        </modal>

      </div>
    </div>
  </div>
</template>

<script>
  import RestoAddForm from "./RestoAddForm";
  import axios from 'axios';

  export default {
    props: ['restos'],
    components: {
      RestoAddForm,
    },
    created() {
      this.localResto = this.restos;
    },
    computed: {
      showAddForm() {
        return (this.localResto.length < 5) ? true : false;
      }
    },
    data() {
      return {
        localResto: [],
      }
    },
    methods: {
      handleAddNewResto() {
        return this.$modal.show('add-new-resto');
      },
      cancelButton() {
        return this.$modal.hide('add-new-resto');
      },
      handleSaveResto(restoData) {
        axios.post('api/resto', restoData).then(response => {
          this.localResto.unshift(response.data);
        });
        this.$modal.hide('add-new-resto');
      }
    }
  }
</script>
