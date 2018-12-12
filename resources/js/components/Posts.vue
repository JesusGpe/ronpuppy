<template>
    <div class="row">
      <div class="col-md-12">
        <h3>Publicaciones recientes</h3>
          <div class="col-md-12" style="margin-top:30px;" v-for="post in Posts" :key="post.id">
            <div class="[ panel panel-default ] panel-google-plus">
                <div class="dropdown" v-if="user_id == post.user_id">
                    <span class="dropdown-toggle" type="button" data-toggle="dropdown">
                        <span class="[ glyphicon glyphicon-chevron-down ]"></span>
                    </span>
                    <ul class="dropdown-menu" role="menu">
                        <li role="presentation" class="manito" @click="deletePost(post.id)">Eliminar</li>
                    </ul>
                </div>
                <div class="panel-heading" width="400px">
                    <img class="[ img-circle pull-left ]" :src="'/imagenes/profile/'+post.foto" alt="Foto" width="80px" height="80px"/>
                    <h3 v-text="post.nombre"></h3>
                    <h5><span>Publicada en:</span><span v-text="post.created_at"></span> </h5>
                </div>
                <div class="panel-body text-center" style="padding:20px">
                  <h3 v-text="post.titulo"></h3>
                  <img :src="'/imagenes/posts/'+post.imagen" alt="" class="rounded img-fluid" width="90%" height="350px">
                  <p></p>
                    <h3>Descripccion</h3>
                    <p v-text="post.descripcion"></p>
                </div>
                <div>
                <hr>
            <comment :post_id="post.id"></comment>
            </div>
            </div>
            
        </div>
      </div>
    </div>
</template>

<script>
    export default {
        created: function () {
    	 	let me= this;
            this.$bus.$on('publicacion', function () {
           me.getPosts();
         });
        },
        data() {
            return {
              Posts : []
            };
        },
        props: ['user_id'],
        methods: {
            getPosts(){
                let me = this;
                axios.get("/getPosts")
                .then(function(response) {
                    me.Posts = response.data.posts;
                })
                .catch(function(error) {
                    console.log(error);
                });                
            },
            deletePost(id){
                let me = this;
                if(confirm("Desea eliminar la publicacion")){
                    axios.post("/deletePost",{"id":id})
                    .then(function(response) {
                        me.getPosts();
                        console.log(response.data.mensaje);
                    })
                    .catch(function(error) {
                        console.log(error);
                    });  
                }
                 
                console.log(id);
            }
        },
        mounted() {
            this.getPosts();
            
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
.panel-google-plus > .dropdown {
    position: absolute;
    top: 5px;
    right: 15px;
}
.panel-google-plus > .dropdown > span > span {
    font-size: 10px;   
}
.panel-google-plus > .dropdown > .dropdown-menu {
    left: initial;
    right: 0px;
    border-radius: 2px;
}
.panel-google-plus > .panel-google-plus-tags {
    position: absolute;
    top: 35px;
    right: -3px;
}
.panel-google-plus > .panel-google-plus-tags > ul {
    list-style: none;
    padding: 0px;
    margin: 0px;
}
.panel-google-plus > .panel-google-plus-tags > ul:hover {
    box-shadow: 0px 0px 3px rgb(0, 0, 0);   
    box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.25);   
}
.panel-google-plus > .panel-google-plus-tags > ul > li {
    display: block;
    right: 0px;
    width: 0px;
    padding: 5px 0px 5px 0px;
    background-color: rgb(245, 245, 245);
    font-size: 12px;
    overflow: hidden;
}
.panel-google-plus > .panel-google-plus-tags > ul > li::after {
    content:"";
    position: absolute;
    top: 0px;
    right: 0px;
    height: 100%;
  border-right: 3px solid rgb(66, 127, 237);
}
.panel-google-plus > .panel-google-plus-tags > ul:hover > li,
.panel-google-plus > .panel-google-plus-tags > ul > li:first-child {
    padding: 5px 15px 5px 10px;
    width: auto;
    cursor: pointer;
    margin-left: auto;
}
.panel-google-plus > .panel-google-plus-tags > ul:hover > li {
    background-color: rgb(255, 255, 255);   
}
.panel-google-plus > .panel-google-plus-tags > ul > li:hover {
    background-color: rgb(66, 127, 237);
    color: rgb(255, 255, 255);
}
.panel-google-plus > .panel-heading,
.panel-google-plus > .panel-footer {
    background-color: rgb(255, 255, 255);
    border-width: 0px; 
}
.panel-google-plus > .panel-heading {
    margin-top: 20px;    
    padding-bottom: 5px; 
}
.panel-google-plus > .panel-heading > img { 
    margin-right: 15px;
}
.panel-google-plus > .panel-heading > h3 {
    margin: 0px;
    font-size: 14px;
    font-weight: 700;
}
.panel-google-plus > .panel-heading > h5 {
    color: rgb(153, 153, 153);
    font-size: 12px;
    font-weight: 400;
}
.panel-google-plus > .panel-body {
    padding-top: 5px;
    font-size: 13px;
}
.panel-google-plus > .panel-body > .panel-google-plus-image {
    display: block;
    text-align: center;
    background-color: rgb(245, 245, 245);
    border: 1px solid rgb(217, 217, 217);
}
.panel-google-plus > .panel-body > .panel-google-plus-image > img {
    max-width: 100%;
}

.panel-google-plus > .panel-footer {
    font-size: 14px;
    font-weight: 700;
    min-height: 54px;
}
.panel-google-plus > .panel-footer > .btn {
    float: left;
    margin-right: 8px;
}
.panel-google-plus > .panel-footer > .input-placeholder {
    display: block;
    margin-left: 98px;
    color: rgb(153, 153, 153);
    font-size: 12px;
    font-weight: 400;
    padding: 8px 6px 7px;
    border: 1px solid rgb(217, 217, 217);
    border-radius: 2px;
    box-shadow: rgba(0, 0, 0, 0.0470588) 0px 1px 0px 0px;
}
.panel-google-plus.panel-google-plus-show-comment > .panel-footer > .input-placeholder {
    display: none;   
}
.panel-google-plus > .panel-google-plus-comment {
    display: none;
    padding: 10px 20px 15px;
    border-top: 1px solid rgb(229, 229, 229);
    background-color: rgb(245, 245, 245);
}
.panel-google-plus.panel-google-plus-show-comment > .panel-google-plus-comment {
    display: block;
}
/*.panel-google-plus > .panel-google-plus-comment > img {
    float: left;   
}*/
.panel-google-plus > .panel-google-plus-comment > .panel-google-plus-textarea {
    float: right;
    width: calc(100% - 56px);
}
.panel-google-plus > .panel-google-plus-comment > .panel-google-plus-textarea > textarea {
    display: block;
    /*margin-left: 60px;
    width: calc(100% - 56px);*/
    width: 100%;
    background-color: rgb(255, 255, 255);
    border: 1px solid rgb(217, 217, 217);
    box-shadow: rgba(0, 0, 0, 0.0470588) 0px 1px 0px 0px;
    resize: vertical;
}
.panel-google-plus > .panel-google-plus-comment > .panel-google-plus-textarea > .btn {
    margin-top: 10px;
    margin-right: 8px;
    width: 100%;
}
@media (min-width: 992px) {
    .panel-google-plus > .panel-google-plus-comment > .panel-google-plus-textarea > .btn {
        width: auto;
    }    
}


.panel-google-plus .btn {
    border-radius: 3px;   
}
.panel-google-plus .btn-default {
    border: 1px solid rgb(217, 217, 217);
    box-shadow: rgba(0, 0, 0, 0.0470588) 0px 1px 0px 0px;
}
.panel-google-plus .btn-default:hover, 
.panel-google-plus .btn-default:focus, 
.panel-google-plus .btn-default:active {
    background-color: rgb(255, 255, 255);
    border-color: rgb(0, 0, 0);    
}
.manito:hover{
    cursor: pointer;

}
</style>
