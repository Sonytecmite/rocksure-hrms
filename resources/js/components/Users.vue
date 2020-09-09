<template>
    <div class="container">
        <div class="col-md-12 mt-5">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Users List</h3>

                <div class="card-tools">
                
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addUserModal" @click="newModal">
                      <i class="fas fa-user-plus"></i>
                      Add New
                  </button>
                </div>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Type</th>
                      <th>Date Created</th>
                      <th>Manage</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="user in users" :key="user.id">
                      <td>{{user.name}}</td>
                      <td>{{user.email}}</td>
                      <td>{{user.type}}</td>
                      <td>{{user.created_at | formatDate}}</td>
                      <td>
                        <a href="#" title="Edit User" @click="editModal(user)">
                            <i class="fa fa-edit blue"></i>
                        </a>
                        <a href="#" title="Delete User" @click="deleteUser(user.id)">
                            <i class="fa fa-trash red"></i>
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
          
        <!-- Modal -->
        <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" v-show="!editmode">Add New User</h5>
                <h5 class="modal-title" id="exampleModalLabel" v-show="editmode">Update User's Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <form @submit.prevent="editmode ? updateUser() : createUser()">
                    <div class="form-group">
                        <input v-model="form.name" placeholder="Name" type="text" name="name"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                        <has-error :form="form" field="name"></has-error>
                    </div>

                    <div class="form-group">
                        <input v-model="form.email" placeholder="Email Address" type="email" name="email"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                        <has-error :form="form" field="email"></has-error>
                    </div>
                    
                    <div class="form-group">
                        <input v-model="form.password" placeholder="Password" type="password" name="password"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                        <has-error :form="form" field="password"></has-error>
                    </div>

                    <div class="form-group">
                        <select name="type" v-model="form.type" id="type" class="form-control" :class="{
                            'is-invalid': form.errors.has('type')
                        }">
                            <option value="">Select User Role</option>
                            <option value="HR">HR</option>
                            <option value="HOD">HOD</option>
                            <option value="PM">Project Manager</option>
                            <option value="Standard">Standard User</option>
                        </select> 
                        <has-error :form="form" field="type"></has-error>
                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            <i class="fas fa-times fw"></i>
                            Close
                        </button>
                        <button type="submit" class="btn btn-success" v-show="!editmode">
                            <i class="fas fa-check fw"></i>
                            Create User
                        </button>
                        <button type="submit" class="btn btn-success" v-show="editmode">
                            <i class="fas fa-check fw"></i>
                            Update 
                        </button>
                    </div>
                </form>
            </div>

            </div>
        </div>
        </div>
    </div>
</template>

<script>
    export default {
        
        data() {

            return {
                editmode: true,
                users: {},
                // Create a new Form instance
                form: new Form({
                    name: '',
                    email: '',
                    password: '',
                    type: '',
                    photo: ''
                })
            }
        },
        methods: {
            //update user's info
            updateUser(){
                console.log("editing user ...");
            },
            //reset modal
            newModal(){
                this.editmode = false;
                this.form.reset();
                $('#addUserModal').modal('show');
            },
            // edit modal
            editModal(user){
                this.editmode = true;
                this.form.reset();
                $('#addUserModal').modal('show');
                this.form.fill(user);
            },
            // delete user 
            deleteUser(id){
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {

                    // send http request to the server 
                    this.form.delete('api/user/'+id).then(() => {
                        
                        if (result.isConfirmed) {
                            Swal.fire(
                            'Deleted!',
                            'User has been deleted.',
                            'success'
                            )

                            Fire.$emit('AfterUserCreated');
                        }
                    }).catch(() => {
                        Swal("Failed!", "Oops there was an error", "warning")
                    });
                })
            },
            //Loads users from db
            loadUsers(){
                axios.get('api/user').then(({data}) => (this.users = data.data));
            },

            //Submit the form via a POST request
            createUser() {
                this.$Progress.start();
                this.form.post('api/user')
                .then(() => {

                    Fire.$emit('AfterUserCreated');
                    $('#addUserModal').modal('hide');
                    
                    setTimeout(() => {
                        Toast.fire({
                            icon: "success",
                            title: "User Created Successfully!"
                        });
                    }, 1000)
                
                    this.$Progress.finish();
                }).catch(() => {

                });
            }
        },
        created() {
            this.loadUsers();
            Fire.$on('AfterUserCreated', () =>  { this.loadUsers() });
        }
    }
</script>

 