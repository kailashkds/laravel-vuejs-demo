<template>
  <div>
      <h1>Clues</h1>
        <div class="row">
          <div class="col-md-10"></div>
        </div><br />
        <div class="row" id="answer">
            <div v-for="clue in clues.data" :key="clue.id" class="col-md-10 top-bottom">
                  <br>
                  <p><b> Id: </b> {{ clue.id }}</p>
                  <p><b> Category: </b> {{ clue.category.title }}</p>
                  <p><b> Question: </b> {{ clue.question }}</p>
                  <p><b> Answer: </b> {{ clue.answer }}</p>
            </div>
        </div>
        <div class="row" id="button">
            <div class="col-md-10">
                <br>
                <button class="btn btn-success" v-on:click="more">More Results</button>
            </div>
        </div>
  </div>
</template>
<script>
    export default {

        data() {
            return {
                clues: {},
                count: 0
            }
        },
        created() {
            let uri = 'http://localhost:8000/api/clues/${this.$route.params.id}/${this.$route.params.count}';
            this.axios.get(uri).then((response) => {
                this.clues = response.data;
                this.count = (response.data.from)/10;
            });
        },
        methods: {
            more() {
                this.$http.get('http://localhost:8000/api/clues/'+this.$route.params.id+'/'+this.count)
                    .then(response => {
                        this.clues = response.data;
                        this.count = (response.data.from)/10;
                        if(this.count == 0){
                            $('#button').hide();
                        }
                    });
            }
        }
    }
</script>
<style>
    .top-bottom{
        border-top: 2px solid #dee2e6;
    }
    .top-bottom:last-child{
        border-bottom: 2px solid #dee2e6;
    }
</style>