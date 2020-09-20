<template>
    <div class="container pt-4">
        <div class="col-md-8 col-sm-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Department List</h3>

                <div class="card-tools">
                
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addDepartmentModal" @click="newModal">
                      <i class="fas fa-plus"></i>
                      Add New Department
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
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="department in departments" :key="department.id">
                      <td>{{department.id}}</td>
                      <td>{{department.department_name}}</td>
                      <td>
                        <a href="#" title="Edit Department" @click="editModal(department)">
                            <i class="fa fa-edit blue"></i>
                        </a>
                        <a href="#" title="Delete Department" @click="deleteDepartment(department.id)">
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
        <div class="modal fade" id="addDepartmentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" v-show="!editmode">Add New Department</h5>
                <h5 class="modal-title" id="exampleModalLabel" v-show="editmode">Update Department's Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <form @submit.prevent="editmode ? updateDepartment() : createDepartment()">
                    <div class="form-group">
                        <input v-model="form.department_name" placeholder="Department Name" type="text" name="department_name"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('department_name') }">
                        <has-error :form="form" field="department_name"></has-error>
                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            <i class="fas fa-times fw"></i>
                            Close
                        </button>
                        <button type="submit" class="btn btn-success" v-show="!editmode">
                            <i class="fas fa-check fw"></i>
                            Create Department
                        </button>
                        <button type="submit" class="btn btn-success" v-show="editmode">
                            <i class="fas fa-check fw"></i>
                            Update Department
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
                departments: {},
                // Create a new Form instance
                form: new Form({
                    id: '',
                    department_name: '',
                })
            }
        },
        methods: {
            //update user's info
            updateDepartment(){
                this.$Progress.start();
                this.form.put('api/department/'+this.form.id)
                .then(() => {

                   $('#addDepartmentModal').modal('hide');
                        Swal.fire(
                        'Updated!',
                        'Department Updated.',
                        'success'
                        )
                        Fire.$emit('AfterUserCreated');
                        this.$Progress.finish();
                })
                .catch(() => {
                    this.$Progress.fail();
                })
            },
            //reset modal
            newModal(){
                this.editmode = false;
                this.form.reset();
                $('#addDepartmentModal').modal('show');
            },
            // edit modal
            editModal(department){
                this.editmode = true;
                this.form.reset();
                $('#addDepartmentModal').modal('show');
                this.form.fill(department);
            },
            // delete user 
            deleteDepartment(id){
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
                    this.form.delete('api/department/'+id).then(() => {
                        
                        if (result.isConfirmed) {
                            Swal.fire(
                            'Deleted!',
                            'Department has been deleted.',
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
            loadDepartments(){
                this.$Progress.start();
                axios.get('api/department').then(({data}) => {
                        this.departments = data.data;
                        this.$Progress.finish();
                    });
                 
            },

            //Submit the form via a POST request
            createDepartment() {
                this.$Progress.start();
                this.form.post('api/department')
                .then(() => {

                    Fire.$emit('AfterUserCreated');
                    $('#addDepartmentModal').modal('hide');
                    
                    setTimeout(() => {
                        Toast.fire({
                            icon: "success",
                            title: "Department Created Successfully!"
                        });
                    }, 1000)
                
                    this.$Progress.finish();
                }).catch(() => {

                });
            }
        },
        created() {
            this.loadDepartments();
            Fire.$on('AfterUserCreated', () =>  { this.loadDepartments() });
        }
    }
</script>

 