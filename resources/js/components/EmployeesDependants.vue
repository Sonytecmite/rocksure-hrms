<template>
    <div class="container pt-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3 class="page-title">Employee Dependants</h3>
            </div>
        </div>
        <form @submit.prevent="createContact()">
            <div class="row mt-3">
                <div class="col-md-8" 
                    v-for="(dependant, counter) in dependants" 
                    v-bind:key="counter++">
                    <div class="row mb-2">
                        <div class="col md-12">
                            <h4>Dependant {{`#`+counter}}</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="first_name">First Name <sup class="red">*</sup></label>
                            <input v-model="form.first_name" id="first_name" type="text" name="first_name" required  class="form-control" :class="{ 'is-invalid': form.errors.has('first_name') }">
                            <has-error :form="form" field="first_name"></has-error>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="last_name">Last Name <sup class="red">*</sup></label>
                            <input v-model="form.last_name" id="last_name" type="text" name="last_name" required  class="form-control" :class="{ 'is-invalid': form.errors.has('last_name') }">
                            <has-error :form="form" field="last_name"></has-error>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="middle_name">Other Name</label>
                            <input v-model="form.middle_name" id="middle_name" type="tex" name="middle_name" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="contact">Contact <sup class="red">*</sup></label>
                            <input v-model="form.contact" id="contact" type="phone" name="contact" required  class="form-control" :class="{ 'is-invalid': form.errors.has('contact') }">
                            <has-error :form="form" field="contact"></has-error>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="dob">Date of Birth <sup class="red">*</sup></label>
                            <input v-model="form.dob" id="first_name" type="date" name="dob" required  class="form-control" :class="{ 'is-invalid': form.errors.has('dob') }">
                            <has-error :form="form" field="dob"></has-error>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="relationship">Relationship <sup class="red">*</sup></label>
                            <input v-model="form.relationship" id="relationship" type="textrelationship" name="dob" required  class="form-control" :class="{ 'is-invalid': form.errors.has('relationship') }">
                            <has-error :form="form" field="relationship"></has-error>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="dob">Nationality <sup class="red">*</sup></label>
                            <input v-model="form.nationality" id="nationality" type="text" name="nationality" required  class="form-control" :class="{ 'is-invalid': form.errors.has('nationality') }">
                            <has-error :form="form" field="nationality"></has-error>
                        </div>
                    </div>
                    <button @click="deleteDependant" v-show="addClicked" v-if="counter > 1" class="btn btn-danger btn-flat m-2 add-more" title="Delete Dependant">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="col-md-4">
                    <button @click="addDependant" class=" btn btn-success btn-flat add-more" title="Add Another Dependant">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>    
            </div>
            <div class="row line">
                <div class="col-md-4"></div>
                <div class="col-md-8 mb-3 mt-1">
                    <button type="submit" class="btn btn-large btn-primary mt-3">
                        Save Employee's Dependant Info
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
                addClicked: false,
                dependants: [{
                    phone1: '',
                    phone2: '',
                    email: '',
                    postal_address: '',
                    residentail_address: '',
                    gps_address: '',
                }],
                form: new Form({
                    phone1: '',
                    phone2: '',
                    email: '',
                    postal_address: '',
                    residentail_address: '',
                    gps_address: '',
                }),
                previewImage: null,
            }
        },
        methods: {
            // image selector
            selectImage () {
                this.$refs.fileInput.click()
            },
            // image previewer
            showPhoto(){
                let input = this.$refs.fileInput
                let file = input.files
                if (file && file[0]) {
                    let reader = new FileReader
                    reader.onload = e => {
                        this.previewImage = e.target.result
                    }
                    reader.readAsDataURL(file[0])
                    this.$emit('input', file[0])
                }
            },
            addDependant(){
                this.dependants.push({
                    phone1: '',
                    phone2: '',
                    email: '',
                    postal_address: '',
                    residentail_address: '',
                    gps_address: '',
                });
                this.addClicked = true;
            },
            deleteDependant(counter){
                this.dependants.splice(counter, 1);
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
