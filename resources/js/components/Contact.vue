<template>
    <div class="container">
        <div class="row pt-5">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Contact Messages List</h3>

                <div class="card-tools">
                  
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-hover text-center">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Service</th>
                      <th>Message</th>
                      <th>Sent At</th>
                      <th>Modify</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="contact in contacts" :key="contact.id">
                      <td> {{ contact.id }} </td>
                      <td> {{ contact.name | capitalText }} </td>
                      <td> {{ contact.email }} </td>
                      
                      <td> 
                        {{ contact.service }}
                      </td>
                      <td style="width: 400px;">{{ contact.message | capitalText}}</td>
                      <td> {{ contact.created_at }} </td>


                      <!-- if user is not admin then hide delete option -->
                      <!-- v-if="$gate.isAdmin()" -->
                      <td>
                          <a href="#" @click="deleteContact(contact.id)">
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
    </div>
</template>

<script>
    export default {
        
        data(){
            return{

                contacts:{}

            }
        },

        methods:{

            loadContacts(){

                axios.get("api/contact")
                    .then(({data}) => {
                        this.contacts = data;
                    })
                    .catch();

                    console.log(this.contacts);

            },

            deleteContact(id){

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

                        axios.delete("api/contact/"+id)
                            .then(() => {

                                // if(this.$gate.isAdmin()){

                                  Swal.fire(
                                    'Deleted!',
                                    'Contact has been deleted.',
                                    'success'
                                  )

                                  // progressbar finish
                                  this.$Progress.finish();

                                  this.loadContacts();

                                

                               

                            })
                            .catch((response) => {
                                // progressbar fail
                                console.log(response);
                                this.$Progress.fail();
                            });

                    }
                })

            }

        },

        created(){

            this.loadContacts();

        }

    }
</script>
