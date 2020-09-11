<template>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3 class="page-title">Employee Personal Information</h3>
            </div>
        </div>
        <form @submit.prevent="createEmployee()">
            <div class="row mt-4">
                <div class="col-md-8">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="firstname">First Name <sup class="red">*</sup></label>
                            <input v-model="form.first_name" id="firstname" type="text" name="first_name" required  class="form-control" :class="{ 'is-invalid': form.errors.has('first_name') }">
                                <has-error :form="form" field="first_name"></has-error>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="lastname">Last Name <sup class="red">*</sup></label>
                            <input v-model="form.last_name" id="lastname" type="text" name="last_name" required  class="form-control" :class="{ 'is-invalid': form.errors.has('last_name') }">
                                <has-error :form="form" field="last_name"></has-error>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="middlename">Middle Name</label>
                            <input v-model="form.middle_name" id="middlename" type="text" name="middle_name" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="dob">Date of birth <sup class="red">*</sup></label>
                            <input v-model="form.dob" id="dob" type="date" name="dob" required  class="form-control" :class="{ 'is-invalid': form.errors.has('dob') }">
                            <has-error :form="form" field="dob"></has-error>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="gender">Gender <sup class="red">*</sup></label>
                            <select v-model="form.gender" id="gender" name="gender" required  class="form-control" :class="{ 'is-invalid': form.errors.has('gender') }">
                                <option value="">--Select--</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>    
                            <has-error :form="form" field="gender"></has-error>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="hometown">Hometown <sup class="red">*</sup></label>
                            <input v-model="form.hometown" id="hometown" type="text" name="hometown" required  class="form-control" :class="{ 'is-invalid': form.errors.has('hometown') }">
                                <has-error :form="form" field="hometown"></has-error>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="nationality">Nationality  <sup class="red">*</sup></label>
                            <select v-model="form.nationality" id="nationality" name="nationality" required  class="form-control" :class="{ 'is-invalid': form.errors.has('nationality') }">
                                <option value="">--Select--</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>    
                            <has-error :form="form" field="nationality"></has-error>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="placeofstay">Place of Stay <sup class="red">*</sup></label>
                            <input v-model="form.place_of_stay" type="text" id="placeofstay" name="place_of_stay" required  class="form-control" :class="{ 'is-invalid': form.errors.has('place_of_stay') }">   
                            <has-error :form="form" field="play_of_stay"></has-error>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="point_of_hire">Point of Hire  <sup class="red">*</sup></label>
                            <input v-model="form.point_of_hire" type="text" id="point_of_hire" name="point_of_hire" required  class="form-control" :class="{ 'is-invalid': form.errors.has('point_of_hire') }">  
                            <has-error :form="form" field="point_of_hire"></has-error>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="section">Section  <sup class="red">*</sup></label>
                            <input v-model="form.section" type="text" id="section" name="section" required  class="form-control" :class="{ 'is-invalid': form.errors.has('section') }">  
                            <has-error :form="form" field="section"></has-error>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="position">Position <sup class="red">*</sup></label>
                            <input v-model="form.position" type="text" id="position" name="position" required  class="form-control" :class="{ 'is-invalid': form.errors.has('position') }">  
                            <has-error :form="form" field="position"></has-error>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="department">Departmen <sup class="red">*</sup></label>
                            <select v-model="form.department" type="text" id="department" name="department" required  class="form-control" :class="{ 'is-invalid': form.errors.has('department') }">  
                                <option value="">--Select--</option>
                            </select>
                            <has-error :form="form" field="section"></has-error>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="allergy">Allergy  <sup class="red">*</sup></label>
                            <input v-model="form.allergy" type="text" id="allergy" name="allergy" required  class="form-control" :class="{ 'is-invalid': form.errors.has('allergy') }">  
                            <has-error :form="form" field="allergy"></has-error>
                        </div>
                        <div class="form-group col-md-6 pb-1">
                            <label for="position">Contract File <sup class="red">*</sup></label>
                            <input type="file" id="contract_file" name="contract_file" required :class="{ 'is-invalid': form.errors.has('contract_file') }">  
                            <has-error :form="form" field="contract_file"></has-error>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 pl-5">
                    <p class="red">Maximum file size is 2 MB</p>
                    <label>Passport Photo <sup class="red">*</sup></label>
                    <div class="photo-box">
                        
                    </div>
                    <div class="form-group mt-3">
                        <input type="file" id="photo" name="photo" required  :class="{ 'is-invalid': form.errors.has('photo') }">  
                        <has-error :form="form" field="photo"></has-error>
                    </div>
                </div>
            </div>
            <div class="row line">
                <div class="col-md-4"></div>
                <div class="col-md-8 mb-3 mt-1">
                    <button type="submit" class="btn btn-large btn-primary mt-3">
                        Save Employee's Personal Info
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        
        data(){

            return {
                form: new Form({
                    emp_id: '',
                    first_name: '',
                    last_name: '',
                    middle_name: '',
                    dob: '',
                    hometown: '',
                    marital_status: '',
                    nationality: '',
                    photo: '',
                    place_of_stay: '',
                    point_of_hire: '',
                    gender: '',
                    job_id: '',
                    department_id: '',
                    section: '',
                    contract_file: '',
                    allergy: ''
                })
            }
        },

        createEmployee() {

        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
