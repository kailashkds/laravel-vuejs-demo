<template>
  <div>
      <h1>Categories</h1>
        <div class="row">
          <div class="col-md-10"></div>
        </div><br />
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Clues count</th>
            </tr>
            </thead>
            <tbody>

                <tr v-for="category in categories.data" :key="category.id">
                    <td><router-link :to="{name: 'clues', params: { id: category.id,count:category.clues_count }}" class="underline" >{{ category.id }}</router-link></td>
                    <td><router-link :to="{name: 'clues', params: { id: category.id,count:category.clues_count }}" class="underline" >{{ category.title }}</router-link></td>
                    <td><router-link :to="{name: 'clues', params: { id: category.id,count:category.clues_count }}" >{{ category.clues_count }}</router-link></td>
                </tr>
            </tbody>
        </table>
        <paginate
            v-model="page"
            :page-count="20"
            :page-range="3"
            :margin-pages="2"
            :click-handler="clickCallback"
            :prev-text="'Prev'"
            :next-text="'Next'"
            :container-class="'pagination'"
            :page-class="'page-item'">
        </paginate>
  </div>
</template>
<script>
    export default {

        data() {
            return {
                categories: {},
                page: 1
                
            }
        },
        created() {
            let uri = 'http://localhost:8000/api/categories?page=1';
            this.axios.get(uri).then((response) => {
                this.categories = response.data;
            });
        },
        methods: {
            clickCallback(page) {
                if (typeof page === 'undefined') {
                    page = 1;
                }
                this.$http.get('http://localhost:8000/api/categories?page=' + page)
                    .then(response => {
                        this.categories = response.data
                    });
            }
        }
    }
</script>
<style>
    .pagination li {
        padding:10px ;
        border-left: 1px solid #dee2e6;
        border-top: 1px solid #dee2e6;
        border-bottom: 1px solid #dee2e6;
    }
    .pagination li:last-child {
        border-right: 1px solid #dee2e6;
        border-radius: 0 10px 10px 0;
    }
    .pagination li:first-child {
        border-radius: 10px 0 0 10px;
    }
    .highlight{
        background-color: #337ab7;
        border-color: #337ab7;
        color:#ffffff;
    }
    .underline{
        color: #212529;
        text-decoration: none;
        background-color: transparent;
    }
</style>
