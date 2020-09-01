<template>
    <div class="container">
        <div class="col-md-12 mt-5">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Users List</h3>

                <div class="card-tools">
                
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addUserModal">
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
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Type</th>
                      <th>Manage</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>183</td>
                      <td>John Doe</td>
                      <td>11-7-2014</td>
                      <td><span class="tag tag-success">Approved</span></td>
                      <td>
                        <a href="#">
                            <i class="fa fa-edit blue"></i>
                        </a>
                        <a href="#">
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
                <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <form @submit.prevent="createUser">
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
                            <option value="admin">Admin</option>
                            <option value="standard">Standard User</option>
                        </select> 
                        <has-error :form="form" field="name"></has-error>
                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            <i class="fas fa-times fw"></i>
                            Close
                        </button>
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-check fw"></i>
                            Create User
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
            //Submit the form via a POST request
            createUser() {
                this.form.post('api/user');
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
 