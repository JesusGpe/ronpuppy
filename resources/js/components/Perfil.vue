<template>
    <div class="row">
      <div class="col-md-12" v-for="data in user" :key="data.user_id">
            <div class="col-md-12 col-xs-12" v-if="data.tipo == 'mascota'">
                <div class="box box-primary">
            <div class="box-body box-profile">
                <div class="panel-body text-center">
                    <img class="img-circle" :src="'imagenes/profile/'+ data.imagen" alt="User profile picture" width="80%" height="400px;">
                </div>

              <h3 class="profile-username text-center" v-text="data.nombre"></h3>

              <p class="text-muted text-center" v-text="data.sexo"></p>
                <div class="row" style="padding: 5px;">
                    <div class="col-md-12">
                        <button class="btn btn-danger pull-right">Agendar cita</button>
                    </div>
                </div>
              <ul class="list-group list-group-unbordered">
    
                <li class="list-group-item">
                  <b>Tipo</b> <h4 class="" v-text="data.tipom"></h4>
                </li>
                <li class="list-group-item">
                  <b>Fecha de nacimiento</b> <h4 class="" v-text="data.fecha_nac"></h4>
                </li>
              </ul>

            </div>
            <!-- /.box-body -->
          </div>
            </div>
            <div class="col-md-12" v-if="data.tipo == 'org'">
                <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
                <div class="panel-body text-center">
                    <img class="img-circle" src="http://as01.epimg.net/epik/imagenes/2018/04/28/portada/1524913221_572475_1524913364_noticia_normal.jpg" alt="User profile picture" width="300px" height="300px">
                </div>

              <h3 class="profile-username text-center" v-text="data.nombre"></h3>

              <p class="text-muted text-center" v-text="'Horario: '+data.horario"></p>
                <div class="row" style="padding: 5px;">
                    <div class="col-md-12">
                        <button class="btn btn-danger pull-right">Agendar cita</button>
                    </div>
                </div>
              <ul class="list-group list-group-unbordered">
    
                <li class="list-group-item">
                  <b>Direccion</b> <h4 class="" v-text="data.direccion"></h4>
                </li>
                <li class="list-group-item">
                  <b>Servicios</b> <h4 class="" v-text="data.servicios"></h4>
                </li>
                <li class="list-group-item">
                  <b>Especialidad</b> <h4 class="" v-text="data.especialidad"></h4>
                </li>
              </ul>

            </div>
            <!-- /.box-body -->
          </div>
            </div>
        <post></post>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
              user:[],
              edit:false,
              post:false
            };
        },
        props: ['user_id'],
        methods: {
            getUserData(){
                let me = this;
                axios.get("/getUser?id="+this.user_id)
                .then(function(response) {
                    me.user = response.data.profile;
                    console.log(me.user);
                })
                .catch(function(error) {
                    console.log(error);
                });
            },
            

        },
        mounted() {
            this.getUserData();
        }
    }
</script>
