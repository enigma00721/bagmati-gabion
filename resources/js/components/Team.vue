<template>
    <div class="container">
        <div class="row pt-5">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Team Members</h3>

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
                      <th>Position</th>
                      <th>Image</th>
                      <th>Modify</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="team in teams" :key="team.id">
                      <td> {{ team.id }} </td>
                      <td> {{ team.name }} </td>
                      <td> {{ team.position }} </td>
                      
                      <td> 
                        <img :src="getImage(team.image)" width="90px" height="60px">
                      </td>
                      <td>
                          <a href="#" @click="editModal(team)">
                              <i class="fa fa-edit"></i>
                          </a>

                          <span>&nbsp;/&nbsp;</span>

                          <a href="#" @click="deleteTeam(team.id)">
                              <i class="fa fa-trash text-red"></i>
                          </a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- row end -->

        <!-- Modal -->
        <div class="modal fade" id="addNewTeamMemberModal" tabindex="-1" role="dialog" aria-labelledby="addNewTeamMemberModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="addNewTeamMemberModalLabel" v-if="!editmode">New Team Member</h5>
                 <h5 class="modal-title" id="addNewTeamMemberModalLabel" v-else>Update Team Member Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>


              <form @submit.prevent="editmode ? updateTeamMember() : createTeamMember()">
                  <div class="modal-body">
                    
                    <div class="form-group">
                      <input v-model="form.name" type="text" name="name"
                        class="form-control" :class="{ 'is-invalid': form.errors.has('name') }"placeholder="Full Name">
                      <has-error :form="form" field="name"></has-error>
                    </div>

                    <div class="form-group">
                      <input v-model="form.position" type="text" name="position"
                        class="form-control" :class="{ 'is-invalid': form.errors.has('position') }"placeholder="Position">
                      <has-error :form="form" field="position"></has-error>
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

                teams:{},

                editmode:false,

                form: new Form({
                    id: '',
                    name: '',
                    position: '',
                    image: ''
                })

            }
        } ,

        methods:{

            loadTeamMembers(){

                axios.get('api/team')
                    .then( ({data}) => {
                        this.teams = data;
                        // console.log(this.team);
                    })

            },

            getImage(imagename){

                return "images/team/" + imagename;

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

            createTeamMember(){

                // progressbar start
                this.$Progress.start();

                this.form.post('api/team')
                       .then(() => {

                            // progressbar finish
                            this.$Progress.finish();

                            $("#addNewTeamMemberModal").modal("hide");

                            // toast message is fired
                            Toast.fire({
                              type: 'success',
                              title: 'Team Created successfully'
                            })

                            this.loadTeamMembers();

                       })
                       .catch(()=>{
                            // progressbar fail
                            this.$Progress.fail()
                       })

            },

            updateTeamMember(){

                // progressbar start
                this.$Progress.start()

                this.form.put("api/team/"+this.form.id)
                    .then(() => {

                        // progressbar finish
                        this.$Progress.finish()

                        $("#addNewTeamMemberModal").modal("hide");

                        // toast message is fired
                        Toast.fire({
                          type: 'success',
                          title: 'Team Member Info Updated successfully'
                        })

                        this.loadTeamMembers();

                    })
                    .catch(() => {

                        // progressbar fail
                        this.$Progress.fail()

                    })

            },

            deleteTeam(id){

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

                        this.form.delete("api/team/"+id)
                            .then(() => {

                                Swal.fire(
                                  'Deleted!',
                                  'Team Member has been deleted.',
                                  'success'
                                )

                                // progressbar finish
                                this.$Progress.finish();

                                this.loadTeamMembers();

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
                $("#addNewTeamMemberModal").modal("show");

            } ,

            editModal(team){

                this.editmode = true;
                $("#addNewTeamMemberModal").modal("show");
                this.form.fill(team);

            }

        } ,

        created(){

            this.loadTeamMembers();

        }

    }
</script>
