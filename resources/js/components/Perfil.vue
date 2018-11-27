<template>
    <div class="row">
      <div class="col-md-12" v-for="data in user" :key="data.user_id">
        <div class="col-md-12 col-xs-12">
     
                        <div class="white-box">
                            <div class="user-bg"> <img width="100%" alt="user" src="http://as01.epimg.net/epik/imagenes/2018/04/28/portada/1524913221_572475_1524913364_noticia_normal.jpg">
                                <div class="overlay-box">
                                    <div class="user-content">
                                        <a href="#"><img src="https://myanimals.co.kr/wp-content/uploads/2018/08/happy-dog.jpg" class="thumb-lg img-circle" alt="img"></a>
                                        <h4 class="text-white">{{data.nombre}}</h4>
                                        <h5 class="text-white">{{data.sexo}}</h5> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-if="post">
                     <post></post>
                    </div>
                    <div class="col-md-12 col-xs-12" v-if="edit">
                        <div class="white-box">
                            <form class="form-horizontal form-material">
                                <div class="form-group">
                                    <label class="col-md-12">Nombre</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Johnathan Doe" class="form-control form-control-line" v-text="data.nombre"> </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Email</label>
                                    <div class="col-md-12">
                                        <input type="email" placeholder="johnathan@admin.com" class="form-control form-control-line" name="example-email" id="example-email"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Password</label>
                                    <div class="col-md-12">
                                        <input type="password" value="password" class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Phone No</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="123 456 7890" class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12">Select Country</label>
                                    <div class="col-sm-12">
                                        <select class="form-control form-control-line">
                                            <option>London</option>
                                            <option>India</option>
                                            <option>Usa</option>
                                            <option>Canada</option>
                                            <option>Thailand</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success">Update Profile</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
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
                    me.user = response.data.mascota;
                    console.log(me.user);

                })
                .catch(function(error) {
                    console.log(error);
                });
            },
            editProfile(){
                if(this.edit){
                    this.edit=false
                }
                else{
                    this.edit=true
                }
            }

        },
        mounted() {
            this.getUserData();
        }
    }
</script>
