<template>
    <div class="container pt-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3 class="page-title">Employee Contact Information</h3>
            </div>
        </div>
        <form @submit.prevent="createContact()">
            <div class="row mt-4">
                <div class="col-md-8">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="phone1">Phone 1 <sup class="red">*</sup></label>
                            <input v-model="form.phone1" id="phone1" type="phone" name="phone1" required  class="form-control" :class="{ 'is-invalid': form.errors.has('phone1') }">
                                <has-error :form="form" field="phone1"></has-error>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone2">Phone 2</label>
                            <input v-model="form.phone2" id="phone2" type="phone" name="phone2" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="email-address">Email Address <sup class="red">*</sup></label>
                            <input v-model="form.email" id="email-address" type="email" name="email" required  class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                            <has-error :form="form" field="email"></has-error>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="postal_address">Postal Address</label>
                            <input v-model="form.postal_address" id="postal_address" type="text" name="postal_address"  class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="residential_address1">Home Address 1 (On Site) <sup class="red">*</sup></label>
                            <input v-model="form.residential_address1" id="residential_address1" type="text" name="residential_address1" required class="form-control" :class="{ 'is-invalid': form.errors.has('residential_address1') }">    
                            <has-error :form="form" field="residential_address1"></has-error>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="residential_address2">Home Address 2 (Off Site) <sup class="red">*</sup></label>
                            <input v-model="form.residential_address2" id="residential_address2" type="text" name="residential_address2" required class="form-control" :class="{ 'is-invalid': form.errors.has('residential_address2') }">    
                            <has-error :form="form" field="residential_address2"></has-error>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="gps_address">GPS Digital Address 1 (On Site)<sup class="red">*</sup></label>
                            <input v-model="form.gps_address1" id="gps_address1" type="text" name="gps_address1" required  class="form-control" :class="{ 'is-invalid': form.errors.has('gps_address1') }">
                            <has-error :form="form" field="gps_address1"></has-error>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="gps_address">GPS Digital Address 2 (Off Site)<sup class="red">*</sup></label>
                            <input v-model="form.gps_address2" id="gps_address2" type="text" name="gps_address2" required  class="form-control" :class="{ 'is-invalid': form.errors.has('gps_address2') }">
                            <has-error :form="form" field="gps_address2"></has-error>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <h3 class="page-title">Emergency Contact Information</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="full_name">First Name <sup class="red">*</sup></label>
                            <input v-model="form.first_name" id="first_name" type="text" name="first_name" class="form-control" :class="{ 'is-invalid': form.errors.has('first_name') }">    
                            <has-error :form="form" field="first_name"></has-error>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="last_name">Last Name <sup class="red">*</sup></label>
                            <input v-model="form.last_name" id="last_name" type="text" name="last_name" class="form-control" :class="{ 'is-invalid': form.errors.has('last_name') }">    
                            <has-error :form="form" field="last_name"></has-error>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="other_name">Other Name <sup class="red">*</sup></label>
                            <input v-model="form.other_name" id="other_name" type="text" name="other_name" class="form-control" :class="{ 'is-invalid': form.errors.has('other_name') }">    
                            <has-error :form="form" field="other_name"></has-error>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="phone">Phone <sup class="red">*</sup></label>
                            <input v-model="form.phone" id="phone" maxlength="10" type="phone" name="phone" required  class="form-control" :class="{ 'is-invalid': form.errors.has('phone') }">
                            <has-error :form="form" field="phone"></has-error>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="relationship">Relationship <sup class="red">*</sup></label>
                            <input v-model="form.relationship" id="relationship" type="text" name="relationship" required  class="form-control" :class="{ 'is-invalid': form.errors.has('relationship') }">
                            <has-error :form="form" field="relationship"></has-error>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="home_address">Home Address <sup class="red">*</sup></label>
                            <input v-model="form.home_address" id="home_address" type="text" name="home_address" required  class="form-control" :class="{ 'is-invalid': form.errors.has('home_address') }">
                            <has-error :form="form" field="home_address"></has-error>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="digital_address">Digital Address <sup class="red">*</sup></label>
                            <input v-model="form.digital_address" id="digital_address" type="text" name="digital_address" required  class="form-control" :class="{ 'is-invalid': form.errors.has('digital_address') }">
                            <has-error :form="form" field="digital_address"></has-error>
                        </div>
                    </div>
                </div>    
            </div>
            <div class="row line">
                <div class="col-md-4"></div>
                <div class="col-md-8 mb-3 mt-1">
                    <button type="submit" class="btn btn-large btn-primary mt-3">
                        Save Employee's Contant Info
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
                    phone1: '',
                    phone2: '',
                    email: '',
                    postal_address: '',
                    residentail_address1: '',
                    residentail_address2: '',
                    gps_address1: '',
                    gps_address2: '',
                    first_name: '',
                    last_name: '',
                    other_name: '',
                    relationship: '',
                    phone: '',
                    digital_address: '',
                    home_address: '',
                }),
            }
        },
        methods: {
            createContact(){
                this.$Progress.start();
                this.form.post('api/contact')
                .then(() => {
                    setTimeout(() => {
                        Toast.fire({
                            icon: "success",
                            title: "Employee Contact Saved Successfully!",
                        });
                    }, 500);
                
                    this.$Progress.finish();
                })
                .catch(() => {
                     this.$Progress.fail();
                })
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>