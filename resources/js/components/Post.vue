<template>
    <div class="row">
      <div class="col-md-12">
        <div class="panel-google-plus">
          <form style="padding:10px">
          <h3>Nueva publicacion</h3>
          <div class="form-group">
            <label for="">Escribe tu publicacion</label>
            <textarea class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label for="">subir foto</label>
            <input type="file" class="form-control">
            <div style="padding:10px">
              <button class="btn btn-info pull-right">Publicar</button>
            </div>
          </div>
        </form>
        </div>
        
      </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
              
            };
        },
        methods: {
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style>
.panel-google-plus {
    position: relative;
    border-radius: 0px;
    border: 1px solid rgb(216, 216, 216);
    font-family: 'Roboto', sans-serif;
}
</style>
