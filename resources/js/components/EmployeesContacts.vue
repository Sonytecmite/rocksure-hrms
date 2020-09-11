<template>
    <div class="container mt-4">
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
                            <label for="phone2">Phone 2 <sup class="red">*</sup></label>
                            <input v-model="form.phone2" id="phone2" type="phone" name="phone2" required  class="form-control" :class="{ 'is-invalid': form.errors.has('phone2') }">
                            <has-error :form="form" field="phone2"></has-error>
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
                            <label for="residential_address">Residential Address <sup class="red">*</sup></label>
                            <input v-model="form.residential_address" id="residential_address" type="text" name="residential_address" class="form-control" :class="{ 'is-invalid': form.errors.has('residential_address') }">    
                            <has-error :form="form" field="residential_address"></has-error>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="gps_address">GPS Address <sup class="red">*</sup></label>
                            <input v-model="form.gps_address" id="gps_address" type="text" name="gps_address" required  class="form-control" :class="{ 'is-invalid': form.errors.has('gps_address') }">
                            <has-error :form="form" field="gps_address"></has-error>
                        </div>
                    </div>
                    
                    <div class="row justify-content-center mt-3">
                        <div class="col-md-12">
                            <h3 class="page-title">Emergency Contact Information</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="full_name">Full Name <sup class="red">*</sup></label>
                            <input v-model="form.full_name" id="full_name" type="text" name="full_name" class="form-control" :class="{ 'is-invalid': form.errors.has('full_name') }">    
                            <has-error :form="form" field="full_name"></has-error>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="relation">Relation <sup class="red">*</sup></label>
                            <input v-model="form.relation" id="relation" type="text" name="relation" required  class="form-control" :class="{ 'is-invalid': form.errors.has('relation') }">
                            <has-error :form="form" field="relation"></has-error>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="relation">Phone <sup class="red">*</sup></label>
                            <input v-model="form.phone" id="relation" maxlength="10" type="phone" name="phone" required  class="form-control" :class="{ 'is-invalid': form.errors.has('phone') }">
                            <has-error :form="form" field="phone"></has-error>
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
                    residentail_address: '',
                    gps_address: '',
                }),
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
