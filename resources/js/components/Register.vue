<template>
    <div class="row">
        <div class="col-md-12" v-if="!opc">
            <div>
                <h3>Es una veterinaria? haga click <a href="#" @click="opc=true">aqui</a></h3>
            </div>
        <h3 class="text-center">Datos de la mascota</h3>
        <form style="padding:10px" method="POST" enctype="multipart/form-data">
            <div class="form-group col-md-6">
                <label>Nombre</label>
                <input type="text" class="form-control" v-model="nombre">
            </div>
            <div class="form-group col-md-6">
                <label>Tipo</label>
                <select class="form-control" v-model="tipom">
                    <option value="Perro">Perro</option>
                    <option value="Gato">Gato</option>
                    <option value="Ave">Ave</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label>Fecha de nacimiento</label>
                <input type="date" class="form-control" v-model="fecha_nac">
            </div>
            <div class="form-group col-md-6">
                <label>Sexo</label>
                 <select class="form-control" v-model="sexo">
                    <option value="Macho">Macho</option>
                    <option value="Hembra">Hembra</option>
                </select>
            </div>
            
            <div class="form-group col-md-6">
                <label>Foto</label>
                <input type="file" class="form-control" @change="getImage" accept="image/*">
            </div>
            <div class="form-group col-md-6">
                <img :src="url" alt=""
                width="200px" height="200px">
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
        <div v-else>
            <registerv></registerv>
        </div>
    </div>
    
</template>

<script>
    export default {
        data() {
            return {
              nombre:'',
              tipom:'',
              fecha_nac:'',
              sexo:'',
              imagen:null,
              url: null,
              mensaje: '',
              ok: false,
              opc:false
            };
        },
        methods: {
            register(){
                    let me = this;
                    var data = new  FormData();
                    data.append('nombre', this.nombre);
                    data.append('tipom', this.tipom);
                    data.append('fecha_nac',this.fecha_nac);
                    data.append('sexo', this.sexo);
                    data.append('imagen',this.imagen);
                    data.append('tipo','mascota');
                    axios
                    .post('/profile/register', data)
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
                this.url = URL.createObjectURL(this.imagen);
                console.log(event);
            } 
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
