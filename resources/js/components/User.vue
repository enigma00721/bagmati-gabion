<template>
    <div class="container">

        <div class="row pt-5">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Users Table</h3>

                <div class="card-tools">
                  
                      <!-- <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#addNewUserModal"> -->
                      <button type="submit" class="btn btn-success" @click="newModal">
                        Add New &nbsp;
                        <i class="fas fa-user-plus"></i>
                      </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-center">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Registered At</th>
                      <th>Modify</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="user in users" :key="user.id">
                      <td> {{ user.id }} </td>
                      <td> {{ user.name | capitalText }} </td>
                      <td> {{ user.email }} </td>
                      <td> {{ user.created_at}} </td>
                      <td>
                        <a href="#" @click="editModal(user)">
                            <i class="fa fa-edit"></i>
                        </a>
                        <span>&nbsp;/&nbsp;</span>
                        <a href="#" @click="deleteUser(user.id)">
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
        <div class="modal fade" id="addNewUserModal" tabindex="-1" role="dialog" aria-labelledby="addNewUserModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 v-if="!editmode" class="modal-title" id="addNewUserModalLabel">Add New User</h5>
                <h5 v-else class="modal-title" id="addNewUserModalLabel">Update User Info</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>


             <form @submit.prevent="editmode ? updateUser() : createUser()">
              <!-- input fields -->
              <div class="modal-body">
                <div class="form-group">
                  <input v-model="form.name" type="text" name="name"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('name') }" placeholder="Your Name">
                  <has-error :form="form" field="name"></has-error>
                </div>   

                <div class="form-group">
                  <input v-model="form.email" type="text" name="email"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('email') }" placeholder="Your Email">
                  <has-error :form="form" field="email"></has-error>
                </div>   



                <div v-if="!editmode" class="form-group">
                     <input v-model="form.password" type="password" name="password"
                       class="form-control" :class="{ 'is-invalid': form.errors.has('password') }" placeholder="Password">
                     <has-error :form="form" field="password"></has-error>
                </div>
                <div v-else class="form-group">
                     <input v-model="form.password" type="password" name="password"
                       class="form-control" :class="{ 'is-invalid': form.errors.has('password') }" placeholder="New Password">
                     <has-error :form="form" field="password"></has-error>
                </div>
             
              </div>
              <!-- input fields end -->



              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button v-show="editmode" type="submit" class="btn btn-primary px-4">Update</button>
                <button v-show="!editmode" type="submit" class="btn btn-primary px-4">Create</button>
              </div>
             </form>

            </div>
          </div>
        </div>
        <!-- Modal end -->


    </div>
    <!-- container end -->
</template>

<script>
  import NotFound from './NotFound'

    export default {

      components:{
             'not-found':NotFound
      },

        data(){
            return{

                editmode: false,

                users:[],

                form: new Form({
                    id: '',
                    name : '' ,
                    email : '' ,
                    password : '' ,
                })

            }
        },

        methods:{

            newModal(){

                this.editmode = false;
                this.form.reset();
                $("#addNewUserModal").modal("show");

            },

            editModal(user){

                this.editmode = true;
                $("#addNewUserModal").modal("show");
                this.form.fill(user);

            },

            loadUsers(){

                // {data} is returned from controller as array of object

                  axios.get("api/user")
                      .then( ({data}) => (this.users = data.data) );

            },

            createUser(){
                
                // progressbar start
                this.$Progress.start()

                // Submit the form via a POST request
                this.form.post('api/user')
                    .then(() => {

                        Fire.$emit('AfterUserIsCreated')   // emit custom event 

                        // progressbar finish
                        this.$Progress.finish()

                        $("#addNewUserModal").modal("hide");

                        // toast message is fired
                        Toast.fire({
                          type: 'success',
                          title: 'User Created successfully'
                        })

                    })
                    .catch(() => {
                        // progressbar fail
                        this.$Progress.fail()
                    });
                    
                

                // ---------- use this and don't use emit method ------
                    // ----------- both works -------------
                // this.loadUsers();

            },

            updateUser(){

                // progressbar start
                this.$Progress.start()

                this.form.put("api/user/"+this.form.id)
                    .then(() => {

                        // progressbar finish
                        this.$Progress.finish()

                        $("#addNewUserModal").modal("hide");

                        // toast message is fired
                        Toast.fire({
                          type: 'success',
                          title: 'User Updated successfully'
                        })
                        this.loadUsers();

                    })
                    .catch(() => {
                        // progressbar fail
                        this.$Progress.fail()
                    });

            },

            deleteUser(id){
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

                    // send request to delete user
                    this.form.delete("api/user/"+id)
                        .then(() => {
                            Swal.fire(
                              'Deleted!',
                              'Your file has been deleted.',
                              'success'
                            )
                            this.loadUsers();
                            // progressbar finish
                            this.$Progress.finish()
                        })
                        .catch((message) => {
                            Swal.fire(
                              'Failed!',
                              'Something went wrong.',
                              'warning'
                            )
                            // progressbar fail
                            this.$Progress.fail()
                        });
                    
                  }
                })
            }

        },

        created(){

            this.loadUsers();

            // listening for custom event
            Fire.$on('AfterUserIsCreated' , () => {
                this.loadUsers();
            })
        }


    }
</script>
