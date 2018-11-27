<template>
    <div class="row">
        <div class="col-md-12">
        <h3 class="text-center">Datos de la mascota</h3>
            <div class="form-group col-md-6">
                <label>Nombre</label>
                <input type="text" class="form-control" v-model="nombre">
            </div>
            <div class="form-group col-md-6">
                <label>Tipo</label>
                <select class="form-control" v-model="tipo">
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
                <input type="text" class="form-control" v-model="foto">
            </div>
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
              tipo:'',
              fecha_nac:'',
              sexo:'',
              foto:'',
              mensaje: '',
              ok: false
            };
        },
        methods: {
            register(){
                    let me = this;
                    axios
                    .post("/mascota/register", {
                      nombre: this.nombre,
                      tipo: this.tipo,
                      fecha_nac: this.fecha_nac,
                      sexo: this.sexo,
                      foto: this.foto
                    })
                    .then(function(response) {
                        me.ok = true;
                        me.mensaje = response.data.mensaje;

                    })
                    .catch(function(error) {
                      console.log(error);
                    });
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
