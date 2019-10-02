<template>
    <div class="container">
        <div class="row pt-5">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Gallery</h3>

                <div class="card-tools">
                  <button class="btn btn-success" type="button" @click="createModal">
                    Add New &nbsp;<i class="fas fa-image"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-4" v-if="galleries.length > 0">
                <div class="row">
                  <div class="col-md-4" v-for="gallery in galleries" :key="gallery.id"
                  v-bind:class="{ 'mb-4': galleries.length >= 3}"
                       >
                    <div class="gallery-area">
                      <div class="img-area">
                        <img :src="getImage(gallery.image)" width="90px" height="60px">
                        <div class="icon">
                          <ul class="list-inline d-flex flex-inline">
                            <li>
                              <a href="#" title="Edit Gallery" @click="editModal(gallery)">
                                <i class="fa fa-edit"></i>
                              </a>
                            </li>
                            <li>
                              <a href="#" title="Delete Gallery" class="btn-delete-m" 
                                  @click="deleteGallery(gallery.id)">
                                <i class="fa fa-trash"></i>
                              </a>
                            </li>
                          </ul>
                          <span class="title">{{gallery.title}}</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
               
              </div>
              <div v-else class="m-5">
                <p class="title text-center"><span style="color:red">*</span>Size of image should be less than 2 mb</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- row end -->

        <!-- Modal -->
        <div class="modal fade" id="addNewGalleryModal" tabindex="-1" role="dialog" aria-labelledby="addNewGalleryModal" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="addNewGalleryModal" v-if="!editmode">New Gallery</h5>
                 <h5 class="modal-title" id="addNewGalleryModal" v-else>Update Gallery Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>


              <form @submit.prevent="editmode ? updateGallery() : createGallery()">
                  <div class="modal-body">
                    
                    <div class="form-group">
                      <input v-model="form.title" type="text" name="title"
                        class="form-control" :class="{ 'is-invalid': form.errors.has('title') }"placeholder="Gallery Title">
                      <has-error :form="form" field="title"></has-error>
                    </div>


                    <div class="form-group">
                      <label v-if="editmode">New Image</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" @change="uploadImage" name="image" class="custom-file-input" :class="{ 'is-invalid': form.errors.has('image') }" >
                         <has-error :form="form" field="image"></has-error>
                          <label class="custom-file-label" for="exampleInputFile">Choose Feature Image</label>
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text" id="">Upload</span>
                        </div>
                      </div>
                    </div>

                  </div>


                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" v-if="editmode">Update</button>
                    <button type="submit" class="btn btn-primary" v-else>Create</button>
                  </div>
              </form>

            </div>
          </div>
        </div>
        <!-- modal end -->

    </div>
    <!-- container end -->
</template>

<script>
    export default {

        data(){
            return{

                galleries:[],

                editmode:false,

                form: new Form({
                    id: '',
                    title: '',
                    image: ''
                })

            }
        } ,

        methods:{

            loadGallery(){

                axios.get('api/gallery')
                    .then( ({data}) => {
                        this.galleries = data;
                    })

            },

            getImage(imagename){

                return "images/gallery/" + imagename;

            },

            uploadImage(e){

                // console.log('file upload');
                let file = e.target.files[0];
                // console.log(file);      // file info like name, size
                let reader = new FileReader();

                if(file['size'] < 2111775){

                    reader.onloadend = (file) => {
                        this.form.image = reader.result;
                        // console.log(reader.result);
                    }

                    reader.readAsDataURL(file);

                }else{

                    swal({
                        type: 'error' ,
                        title: 'Oops!' ,
                        text: 'You are uploading a large file'
                    })

                }

            },

            createGallery(){

                // progressbar start
                this.$Progress.start();

                this.form.post('api/gallery')
                       .then(() => {

                            // progressbar finish
                            this.$Progress.finish();

                            $("#addNewGalleryModal").modal("hide");

                            // toast message is fired
                            Toast.fire({
                              type: 'success',
                              title: 'Gallery Created successfully'
                            })

                            this.loadGallery();

                       })
                       .catch(()=>{
                            // progressbar fail
                            this.$Progress.fail()
                       })

            },

            updateGallery(){

                // progressbar start
                this.$Progress.start()

                this.form.put("api/gallery/"+this.form.id)
                    .then(() => {

                        // progressbar finish
                        this.$Progress.finish()

                        $("#addNewGalleryModal").modal("hide");

                        // toast message is fired
                        Toast.fire({
                          type: 'success',
                          title: 'Gallery Info Updated successfully'
                        })

                        this.loadGallery();

                    })
                    .catch(() => {

                        // progressbar fail
                        this.$Progress.fail()

                    })

            },

            deleteGallery(id){

                Swal.fire({
                  title: 'Are you sure?',
                  text: "You won't be able to revert this!",
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, delete it!'
                }).then((result) => {

                    if (result.value) {
                        // progressbar start
                        this.$Progress.start()

                        this.form.delete("api/gallery/"+id)
                            .then(() => {

                                Swal.fire(
                                  'Deleted!',
                                  'Gallery has been deleted.',
                                  'success'
                                )

                                // progressbar finish
                                this.$Progress.finish();

                                this.loadGallery();

                            })
                            .catch(() => {

                                // progressbar fail
                                this.$Progress.fail();

                            });
                    }
                })
                // swal fire end

            },

            createModal(){

                this.editmode = false;
                this.form.reset();
                $("#addNewGalleryModal").modal("show");

            } ,

            editModal(team){

                this.editmode = true;
                $("#addNewGalleryModal").modal("show");
                this.form.fill(team);

            }

        } ,

        created(){

            this.loadGallery();

        }

    }
</script>


<style type="text/css" scoped>
  .gallery-area:hover .icon{
    cursor: pointer;
    opacity: 1;
    filter: alpha(opacity=100);
    transform: rotateY(0deg) scale(1,1);
  }

  .img-area{
    overflow:hidden;
    position: relative;
  }

  .img-area img{
    width: 100%;
    min-height: 200px;
  }

  .img-area:hover img{
    transform: scale(1.2);
  }
  .img-area img{
    transition: all 0.4s ease 0s;
  }
  .img-area .icon{
    background-color: #3490dc;
    position: absolute;
    text-align: center;
    height: 100%;
    width: 100%;
    top: 0;
    left: 0;
    opacity: 0;
    filter: alpha(opacity=0);
    transition: all 0.5s ease-out 0s;
    transform: rotateY(180deg) scale(0.5,0.5);
  }

  .img-area .icon ul{
    text-align: center;
    position: relative;
    top: 50px;
    left: 130px;
  }
  .img-area .icon ul li a{
    border:1px solid #fff;
    color:#fff;
    display: block;
    font-size: 20px;
    height: 35px;
    text-align: center;
    width: 35px;
  }
  .img-area .icon ul li a:hover{
    background-color: #fff;
    color:#da1e40;
    border:1px solid transparent;
  }
  .img-area .icon .title{
    text-align: center;
    position: relative;
    top: 80px;
    left: 8px;
    color: #fff;
    font-size: 18px;
  }
</style>