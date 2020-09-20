<template>
    <div class="container pt-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3 class="page-title">Employee Beneficiaries</h3>
            </div>
        </div>
        <form @submit.prevent="createContact()">
            <div class="row mt-4">
                <div class="col-md-8" 
                    v-for="(beneficiary, counter) in beneficiaries" 
                    v-bind:key="counter++">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <h4>Beneficiary {{`#`+counter}}</h4>
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
                            <label for="relationship">Relationship <sup class="red">*</sup></label>
                            <input v-model="form.relationship" id="relationship" type="text" name="dob" required  class="form-control" :class="{ 'is-invalid': form.errors.has('relationship') }">
                            <has-error :form="form" field="relationship"></has-error>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="percentage">Percentage <sup class="red">*</sup></label>
                            <input v-model="form.percentage" id="percentage" type="number" name="percentage" required  class="form-control" :class="{ 'is-invalid': form.errors.has('percentage') }">
                            <has-error :form="form" field="percentage"></has-error>
                        </div>
                        <div class="row pb-3" v-show="addClicked" v-if="counter > 1">
                            <div class="col-md-12">
                                <button @click="deleteBeneficiary" class=" btn btn-danger btn-flat add-more" title="delete beneficiary">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <button @click="addBeneficiary" class=" btn btn-success btn-flat add-more" title="Add another beneficiary">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
           
            <div class="row line">
                <div class="col-md-4"></div>
                <div class="col-md-8 mb-3 mt-1">
                    <button type="submit" class="btn btn-large btn-primary mt-3">
                        Save Employee's Beneficiary Info
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
                beneficiaries: [{
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
            }
        },
        methods: {
            
            addBeneficiary(){
                this.beneficiaries.push({
                    phone1: '',
                    phone2: '',
                    email: '',
                    postal_address: '',
                    residentail_address: '',
                    gps_address: '',
                });
                this.addClicked = true;
            },
            deleteBeneficiary(counter){
                this.beneficiaries.splice(counter, 1);
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
