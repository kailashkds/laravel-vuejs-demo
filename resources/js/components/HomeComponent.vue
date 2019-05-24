<template>
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card card-default">
              <div class="card-header">Laravel VueJs Demo</div>

              <div class="card-body">
                  This is a laravel Vuejs Demo. Please click on Categories to see the demo.
                  <br>
                  Thanks
              </div>
          </div>
      </div>
  </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>