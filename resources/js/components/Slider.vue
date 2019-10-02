<template>
    <div class="container">
        <div class="row pt-5">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Slider</h3>

                <div class="card-tools">
                  <button class="btn btn-success" type="button" @click="createModal">
                    Add New &nbsp;<i class="fas fa-user-plus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-hover text-center">
                  <thead>
                    <tr>
                      <th></th>
                      <th>ID</th>
                      <th>Image</th>
                      <th>Caption</th>
                      <th>Text</th>
                      <th>Modify</th>
                    </tr>
                  </thead>

                  <draggable tag="tbody" v-model="sliders" v-bind="getOptions()" @change="updateOrder"
                    >

                    <tr v-for="slider in sliders" :key="slider.id">
                      <td><i class="fas fa-arrows-alt"></i></td>
                      <td> {{ slider.id }} </td>
                      
                      <td> 
                        <img :src="getImage(slider.image)" width="90px" height="60px">
                      </td>

                      <td> {{ slider.caption }} </td>
                      <td> {{ slider.text }} </td>

                      <td>
                          <a href="#" @click="editModal(slider)">
                              <i class="fa fa-edit"></i>
                          </a>

                          <span>&nbsp;/&nbsp;</span>

                          <a href="#" @click="deleteSlider(slider.id)">
                              <i class="fa fa-trash text-red"></i>
                          </a>
                      </td>
                    </tr>

                  </draggable>

                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- row end -->

        <!-- Modal -->
        <div class="modal fade" id="addNewSliderModal" tabindex="-1" role="dialog" aria-labelledby="addNewSliderModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="addNewSliderModalLabel" v-if="!editmode">New Slider</h5>
                 <h5 class="modal-title" id="addNewSliderModalLabel" v-else>Update Slider</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>


              <form @submit.prevent="editmode ? updateSlider() : createSlider()">
                  <div class="modal-body">

                    <div class="form-group">
                      <label v-if="editmode">New Image</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" @change="uploadImage" name="image" class="custom-file-input" :class="{ 'is-invalid': form.errors.has('image') }" >
                         <has-error :form="form" field="image"></has-error>
                          <label class="custom-file-label" for="exampleInputFile">Choose Image</label>
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text" id="">Upload</span>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <input v-model="form.caption" type="text" name="caption"
                        class="form-control" :class="{ 'is-invalid': form.errors.has('caption') }"placeholder="Caption">
                      <has-error :form="form" field="caption"></has-error>
                    </div>

                    <div class="form-group">
                      <input v-model="form.text" type="text" name="text"
                        class="form-control" :class="{ 'is-invalid': form.errors.has('text') }"placeholder="Text">
                      <has-error :form="form" field="text"></has-error>
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

  import draggable from "vuedraggable";  
    export default {
      components: {
          draggable
        },
       

        data(){
            return{

                sliders:[],

                editmode:false,

                form: new Form({
                    id: '',
                    caption: '',
                    text: '',
                    image: ''
                }),

            }
        } ,

        methods:{

            getOptions(){
              animation:400
            },

            loadSliders(){

                axios.get('api/slider')
                    .then( ({data}) => {
                        this.sliders = data;
                    })

            },

            getImage(imagename){

                return "images/slider/" + imagename;

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

                    Swal.fire({
                        type: 'error' ,
                        title: 'Oops!' ,
                        text: 'You are uploading a large file'
                    })

                }

            },

            createSlider(){

                // progressbar start
                this.$Progress.start();

                this.form.post('api/slider')
                       .then(() => {

                            // progressbar finish
                            this.$Progress.finish();

                            $("#addNewSliderModal").modal("hide");

                            // toast message is fired
                            Toast.fire({
                              type: 'success',
                              title: 'Slider Created successfully'
                            })

                            this.loadSliders();

                       })
                       .catch(()=>{
                            // progressbar fail
                            this.$Progress.fail()
                       })

            },

            updateSlider(){

                // progressbar start
                this.$Progress.start()

                this.form.put("api/slider/"+this.form.id)
                    .then(() => {

                        // progressbar finish
                        this.$Progress.finish()

                        $("#addNewSliderModal").modal("hide");

                        // toast message is fired
                        Toast.fire({
                          type: 'success',
                          title: 'Slider Updated successfully'
                        })

                        this.loadSliders();

                    })
                    .catch(() => {

                        // progressbar fail
                        this.$Progress.fail()

                    })

            },

            updateOrder(){

              // progressbar start
              this.$Progress.start()
              // console.log('updating');

              this.sliders.map((slider,index) => {
                slider.order = index + 1;
              })

              axios.post("api/slider/sorting" , this.sliders)

                  .then(() => {
                    // progressbar finish
                    this.$Progress.finish();

                    this.loadSliders();

                    // toast message is fired
                    Toast.fire({
                      type: 'success',
                      title: 'Slider Order Updated successfully'
                    })

                  })
                  .catch(()=>{
                    // progressbar fail
                    this.$Progress.fail()
                  })

            },

            deleteSlider(id){

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

                        this.form.delete("api/slider/"+id)
                            .then(() => {

                                Swal.fire(
                                  'Deleted!',
                                  'Slider has been deleted.',
                                  'success'
                                )

                                // progressbar finish
                                this.$Progress.finish();

                                this.loadSliders();

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
                $("#addNewSliderModal").modal("show");

            } ,

            editModal(slider){

                this.editmode = true;
                $("#addNewSliderModal").modal("show");
                this.form.fill(slider);

            }

        } ,

        created(){

            this.loadSliders();

        }

    }
</script>
