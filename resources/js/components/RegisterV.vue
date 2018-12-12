<template>
<div class="row">
        <div class="col-md-12">
        <h3 class="text-center">Datos de la Organizacion</h3>
        <form style="padding:10px" method="POST" enctype="multipart/form-data">
            <div class="form-group col-md-6">
                <label>Nombre</label>
                <input type="text" class="form-control" v-model="nombre">
            </div>
            <div class="form-group col-md-6">
                <label>Direccion</label>
                <input type="text" class="form-control" v-model="direccion">
            </div>
            <div class="form-group col-md-6">
                <label>Telefono</label>
                <input type="text" class="form-control" v-model="telefono">
            </div>
            <div class="form-group col-md-6">
                <label>Horario</label>
                <input type="text" class="form-control" v-model="horario">
            </div>
            <div class="form-group col-md-6">
                <label>Servicios</label>
                <textarea class="form-control" id="" cols="30" rows="5" v-model="servicios"></textarea>
            </div>
            <div class="form-group col-md-6">
                <label>Especialidad</label>
                <input type="text" class="form-control" v-model="especialidad">
            </div>
            <div class="form-group col-md-6">
                <label>Logo</label>
                <input type="file" class="form-control" @change="getImage" accept="image/*">
            </div>
        </form>
            <div class="form-group col-md-12">
                <label for="">{{mensaje}}</label>
                <template v-if="!ok">
                    <button class="btn btn-info pull-right" @click="register()">Guardar</button>
                </template>
                <template v-if="ok">
                    <a href="/home"><button class="btn btn-info pull-right">Continuar</button></a>
                </template>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
              nombre:'',
              direccion:'',
              telefono:'',
              horario:'',
              servicios:'',
              especialidad:'',
              imagen:null,
              mensaje: '',
              ok: false
            };
        },
        methods: {
            register(){
                let me = this;
                var data = new  FormData();
                data.append('nombre', this.nombre);
                data.append('direccion', this.direccion);
                data.append('telefono',this.telefono);
                data.append('horario', this.horario);
                data.append('servicios', this.servicios);
                data.append('especialidad', this.especialidad);
                data.append('imagen',this.imagen);
                data.append('tipo','org');
                axios
                .post("/profile/register", data)
                .then(function(response) {
                    me.ok = true;
                    me.mensaje = response.data.mensaje;
                    
                    })
                .catch(function(error) {
                    console.log(error);
                });
            },
             getImage(event){
                this.imagen=event.target.files[0];
                console.log(event);
            } 
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
