<template>
    <div class="container pt-4">
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
                            <label for="marital_status">Marital Status <sup class="red">*</sup></label>
                            <select v-model="form.marital_status" id="marital_status" name="marital_status" required  class="form-control" :class="{ 'is-invalid': form.errors.has('marital_status') }">
                                <option value="">--Select--</option>
                                <option value="single">Single</option>
                                <option value="married">Married</option>
                                <option value="divorsed">Divorced</option>
                                <option value="separeted">Separated</option>engaged
                                <option value="engaged">Engaged</option>
                            </select>    
                            <has-error :form="form" field="marital_status"></has-error>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="hometown">Hometown <sup class="red">*</sup></label>
                            <input v-model="form.hometown" id="hometown" type="text" name="hometown" required  class="form-control" :class="{ 'is-invalid': form.errors.has('hometown') }">
                                <has-error :form="form" field="hometown"></has-error>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nationality">Country  <sup class="red">*</sup></label>
                            <input v-model="form.country" id="country" type="text" name="country" required  class="form-control" :class="{ 'is-invalid': form.errors.has('country') }">
                            <has-error :form="form" field="country"></has-error>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 pl-5">
                    <p class="red label-desc">Image format: jpeg/jpg/png and not bigger than 2 MB</p>
                    <label>Passport Photo <sup class="red">*</sup></label>
                    <div 
                        class="photo-box"
                        :style="{ 'background-image': `url(${previewImage})` }"
                        @click="selectImage">
                        
                    </div>
                    <div class="form-group mt-3">
                        <input type="file" ref="photo" @change="showPhoto" id="photo"  required  :class="{ 'is-invalid': form.errors.has('photo') }">  
                        <has-error :form="form" field="photo"></has-error>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="nationality">Nationality  <sup class="red">*</sup></label>
                    <select v-model="form.nationality" id="nationality" name="nationality" required  class="form-control" :class="{ 'is-invalid': form.errors.has('nationality') }">
                        <option value="">--Select--</option>
                        <option value="Ghanaian">Ghanaian</option>
                        <option value="Non Ghanaian">Non Ghanaian</option>
                    </select>    
                    <has-error :form="form" field="nationality"></has-error>
                </div>
                <div class="form-group col-md-4">
                    <label for="religion">Religion <sup class="red">*</sup></label>
                    <select v-model="form.religion" id="religion" name="religion" required  class="form-control" :class="{ 'is-invalid': form.errors.has('religion') }">
                        <option value="">--Select--</option>
                        <option value="Christianity">Christianity</option>
                        <option value="Islam">Islam</option>
                        <option value="Traditionalist">Traditionalist</option>
                        <option value="other">Other</option>
                    </select>    
                    <has-error :form="form" field="religion"></has-error>
                </div>
                <div class="form-group col-md-4">
                    <label for="hobbies">Hobbies </label>
                    <input v-model="form.hobbies" type="text" id="hobbies" name="hobbies" class="form-control">  
                    <has-error :form="form" field="hobbies"></has-error>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="placeofstay">Place of Stay <sup class="red">*</sup></label>
                    <input v-model="form.place_of_stay" type="text" id="placeofstay" name="place_of_stay" required  class="form-control" :class="{ 'is-invalid': form.errors.has('place_of_stay') }">   
                    <has-error :form="form" field="play_of_stay"></has-error>
                </div>
                <div class="form-group col-md-4">
                    <label for="lang_spoken">Languages Spoken<sup class="red">*</sup></label>
                    <input v-model="form.lang_spoken" type="text" id="lang_spoken" name="lang_spoken" required  class="form-control" :class="{ 'is-invalid': form.errors.has('lang_spoken') }"> 
                    <has-error :form="form" field="lang_spoken"></has-error>
                </div>
            </div>
            <div class="row line pt-3">
                <div class="form-group col-md-4">
                    <label for="point_of_hire">Point of Hire  <sup class="red">*</sup></label>
                    <input v-model="form.point_of_hire" type="text" id="point_of_hire" name="point_of_hire" required  class="form-control" :class="{ 'is-invalid': form.errors.has('point_of_hire') }">  
                    <has-error :form="form" field="point_of_hire"></has-error>
                </div>
                <div class="form-group col-md-4">
                    <label for="department">Department <sup class="red">*</sup></label>
                    <select v-model="form.department" type="text" id="department" name="department" required  class="form-control" :class="{ 'is-invalid': form.errors.has('department') }">  
                        <option  value="" selected disabled>--Select--</option>
                        <option v-for="department in departments" v-bind:key="department.id">{{department.department_name}}</option>
                    </select>
                    <has-error :form="form" field="department"></has-error>
                </div>
                <div class="form-group col-md-4">
                    <label for="section">Section  <sup class="red">*</sup></label>
                    <input v-model="form.section" type="text" id="section" name="section" required  class="form-control" :class="{ 'is-invalid': form.errors.has('section') }">  
                    <has-error :form="form" field="section"></has-error>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="position">Position <sup class="red">*</sup></label>
                    <input v-model="form.position" type="text" id="position" name="position" required  class="form-control" :class="{ 'is-invalid': form.errors.has('position') }">  
                    <has-error :form="form" field="position"></has-error>
                </div>
                 <div class="form-group col-md-4">
                    <label for="allergy">Allergy <span class="label-desc red">(State any allergie(s) you have if there is any)</span></label>
                    <input v-model="form.allergy" type="text" id="allergy" name="allergy" class="form-control">  
                </div>
                <div class="form-group col-md-4">
                    <label for="contract_file">Contract File <sup class="red">*</sup> <span class="label-spec red">(file format: PDF)</span></label>
                    <input type="file"  @change="uploadFile" id="contract_file" ref="contract_file" required :class="{ 'is-invalid': form.errors.has('contract_file') }">  
                    <has-error :form="form" field="contract_file"></has-error>
                </div>
            </div>
            <div class="row line pt-3">
                <div class="form-group col-md-4">
                    <label for="passport_number">Passport Number  <sup class="red">*</sup></label>
                    <input v-model="form.passport_number" type="text" id="passport_number" name="passport_number" required  class="form-control" :class="{ 'is-invalid': form.errors.has('passport_number') }">  
                    <has-error :form="form" field="passport_number"></has-error>
                </div>
                <div class="form-group col-md-4">
                    <label for="ppt_exp_date">Expiry Date <sup class="red">*</sup></label>
                    <input v-model="form.ppt_exp_date" type="date" id="ppt_exp_date" name="ppt_exp_date" required  class="form-control" :class="{ 'is-invalid': form.errors.has('ppt_exp_date') }">  
                    <has-error :form="form" field="ppt_exp_date"></has-error>
                </div>
                <div class="form-group col-md-4">
                    <label for="license_number">Driver License No.  <sup class="red">*</sup></label>
                    <input v-model="form.license_number" type="text" id="license_number" name="license_number" required  class="form-control" :class="{ 'is-invalid': form.errors.has('license_number') }">  
                    <has-error :form="form" field="license_number"></has-error>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="license_class">Driver License Class <sup class="red">*</sup></label>
                    <select selected v-model="form.license_class" type="text" id="license_class" name="license_class" required  class="form-control" :class="{ 'is-invalid': form.errors.has('license_class') }">  
                        <option value="">--Select--</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                    </select>
                    <has-error :form="form" field="license_class"></has-error>
                </div>
                <div class="form-group col-md-4">
                    <label for="license_exp_date">Date of Expiry <sup class="red">*</sup></label>
                    <input v-model="form.license_exp_date" type="date" id="license_exp_date" name="license_exp_date" required  class="form-control" :class="{ 'is-invalid': form.errors.has('license_exp_date') }">  
                    <has-error :form="form" field="license_exp_date"></has-error>
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
                departments: {},
                form: new Form({
                    photo: '',
                    contract_file: ''
                }),
                previewImage: null,
            };
        },

        methods: {
            createEmployee() {

                this.$Progress.start();
                this.form.post('api/employee')
                .then(() => {                 
                    setTimeout(() => {
                        Toast.fire({
                            icon: "success",
                            title: "Employee Personal Info Saved Successfully!",
                        });
                    }, 500)
                
                    this.$Progress.finish();
                }).catch(() => {
                    this.$Progress.fail();
                });

            },
            // image selector
            selectImage () {
                this.$refs.photo.click()
            },
            // image previewer
            showPhoto(){

                let input = this.$refs.photo,
                    file = input.files[0];

                    if(file['size'] <= 2111775){

                        let reader = new FileReader();
                        reader.onloadend = (e) => {
                            this.form.photo = reader.result;
                            this.previewImage = e.target.result;
                        };
                        reader.readAsDataURL(file);
                    }else{
                       
                       Swal.fire({
                            title: 'Passport Photo too large!',
                            text: "Photo should not be more than 2MB",
                            icon: 'warning',
                        })
                    }
                
            },
            uploadFile(e){
                let file = e.target.files[0],
                    reader = new FileReader();

                    reader.onloadend = (e) => {
                        this.form.contract_file = reader.result;
                    }
                    reader.readAsDataURL(file);                     
            },
            loadDepartments(){
                axios.get('api/department').then(({data}) => (this.departments = data.data));
            }
        },
        mounted() {
            this.loadDepartments();
        }
    }
</script>
