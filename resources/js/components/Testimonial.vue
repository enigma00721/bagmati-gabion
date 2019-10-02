<template>
    <div class="container">
        <div class="row pt-5">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Testimonial</h3>

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
                      <th>ID</th>
                      <th>Name</th>
                      <th>Image</th>
                      <th>Position</th>
                      <th>Company</th>
                      <th>Message</th>
                      <th>Modify</th>
                    </tr>
                  </thead>

                  <draggable tag="tbody" v-model="testimonials" v-bind="getOptions()" @change="updateOrder"
                    >

                    <tr v-for="testimonial in testimonials" :key="testimonial.id">
                      <td> {{ testimonial.id }} </td>

                      <td> {{ testimonial.name }} </td>
                      
                      <td> 
                        <img :src="getImage(testimonial.image)" width="90px" height="60px">
                      </td>

                      <td> {{ testimonial.position }} </td>
                      <td> {{ testimonial.company }} </td>
                      <td style="max-width: 200px"> {{ getPostBody(testimonial.message)}} </td>

                      <td>
                          <a href="#" @click="editModal(testimonial)">
                              <i class="fa fa-edit"></i>
                          </a>

                          <span>&nbsp;/&nbsp;</span>

                          <a href="#" @click="deleteService(testimonial.id)">
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
        <div class="modal fade " id="addNewServiceModal" tabindex="-1" role="dialog" aria-labelledby="addNewServiceModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-position" id="addNewServiceModalLabel" v-if="!editmode">New Testimonial</h5>
                 <h5 class="modal-title" id="addNewServiceModalLabel" v-else>Update Testimonial</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>


              <form @submit.prevent="editmode ? updateTestimonial() : createTestimonial()">
                  <div class="modal-body">

                    <div class="form-group">
                      <input v-model="form.name" type="text" name="name"
                        class="form-control" :class="{ 'is-invalid': form.errors.has('name') }"placeholder="Client Name">
                      <has-error :form="form" field="name"></has-error>
                    </div>

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
                      <input v-model="form.position" type="text" name="position"
                        class="form-control" :class="{ 'is-invalid': form.errors.has('position') }"placeholder="Position">
                      <has-error :form="form" field="position"></has-error>
                    </div>
                    <div class="form-group">
                      <input v-model="form.company" type="text" name="company"
                        class="form-control" :class="{ 'is-invalid': form.errors.has('company') }"placeholder="Company">
                      <has-error :form="form" field="company"></has-error>
                    </div>


                    <div class="form-group">
                      <vue-editor 
                        v-model="form.message"
                        placeholder="Description" name="message"
                        :class="{ 'is-invalid': form.errors.has('message') }"
                      >
                    </vue-editor>

                      <has-error :form="form" field="message"></has-error>
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
  import { VueEditor } from 'vue2-editor';
 
    export default {
      components: {
          draggable,VueEditor
        },
       

        data(){
            return{

                testimonials:[],

                editmode:false,

                form: new Form({
                    id: '',
                    name: '',
                    company: '',
                    position: '',
                    message: '',
                    image: ''
                }),

            }
        } ,

        methods:{

            // for draggable
            getOptions(){
              animation:400
            },

            loadTestimonials(){

                axios.get('api/testimonial')
                    .then( ({data}) => {
                        this.testimonials = data;
                    })

            },

            getPostBody (post) {
              let body = this.stripTags(post);

              return body.length > 200 ? body.substring(0, 200) + '...' : body;           
            },

            stripTags (text) {
                return text.replace(/(<([^>]+)>)/ig, '');
            },
                    
            getImage(imagename){

                return "images/testimonial/" + imagename;

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

            createTestimonial(){

                // progressbar start
                this.$Progress.start();

                this.form.post('api/testimonial')
                       .then(() => {

                            // progressbar finish
                            this.$Progress.finish();

                            $("#addNewServiceModal").modal("hide");

                            // toast message is fired
                            Toast.fire({
                              type: 'success',
                              title: 'Testimonial Created successfully'
                            })

                            this.loadTestimonials();

                       })
                       .catch(()=>{
                            // progressbar fail
                            this.$Progress.fail()
                       })

            },

            updateTestimonial(){

                // progressbar start
                this.$Progress.start()

                this.form.put("api/testimonial/"+this.form.id)
                    .then(() => {

                        // progressbar finish
                        this.$Progress.finish()

                        $("#addNewServiceModal").modal("hide");

                        // toast message is fired
                        Toast.fire({
                          type: 'success',
                          title: 'Testimonial Updated successfully'
                        })

                        this.loadTestimonials();

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

              this.testimonials.map((testimonial,index) => {
                testimonial.order = index + 1;
              })

              axios.post("api/testimonial/sorting" , this.testimonials)

                  .then(() => {
                    // progressbar finish
                    this.$Progress.finish();

                    this.loadTestimonials();

                    // toast message is fired
                    Toast.fire({
                      type: 'success',
                      title: 'Testimonial Order Updated successfully'
                    })

                  })
                  .catch(()=>{
                    // progressbar fail
                    this.$Progress.fail()
                  })

            },

            deleteService(id){

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

                        this.form.delete("api/testimonial/"+id)
                            .then(() => {

                                Swal.fire(
                                  'Deleted!',
                                  'Testimonial has been deleted.',
                                  'success'
                                )

                                // progressbar finish
                                this.$Progress.finish();

                                this.loadTestimonials();

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
                $("#addNewServiceModal").modal("show");

            } ,

            editModal(slider){

                this.editmode = true;
                $("#addNewServiceModal").modal("show");
                this.form.fill(slider);

            }

        } ,

        created(){

            this.loadTestimonials();

        }

    }
</script>
