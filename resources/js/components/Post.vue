<template>
    <div class="row">
      <div class="col-md-12">
        <div class="panel-google-plus">
          <form style="padding:10px" method="POST" enctype="multipart/form-data">
          <h3>Nueva publicacion</h3>
          <div class="form-group">
            <label for="">Titulo</label>
            <input class="form-control" v-model="titulo">
          </div>
          <div class="form-group">
            <label for="">Descripccion</label>
            <textarea class="form-control" v-model="descripccion"></textarea>
          </div>
          <div class="form-group">
            <label for="">subir foto</label>
            <input type="file" class="form-control" @change="getImage" accept="image/*">
            <div style="padding:10px">
              <button class="btn btn-info pull-right" type="button" @click="postRegister()">Publicar</button>
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
              titulo:'',
              descripccion:'',
              foto:null            
            };
        },
        props: ['user_id'],
        methods: {
			postRegister(){
				let me = this;
				var data = new  FormData();
				data.append('foto', this.foto);
				data.append('titulo', this.titulo);
				data.append('descripccion',this.descripccion);
				data.append('user_id', this.user_id);
				axios
				.post("/postRegister",data)
				.then(function(response) {
					me.$bus.$emit('publicacion');
					me.limpiar();
					console.log("publicacion correcta");
				})
				.catch(function(error) {
					console.log(error);
				});
			},
			getImage(event){
				this.foto=event.target.files[0];
				console.log(event);
			},
			
			limpiar(){
				this.titulo="";
				this.descripccion="";
				this.foto=null;
			}
        },
        mounted() {
            
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
