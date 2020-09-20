<template>
    <div class="container pt-4">
        <div class="row">
            <div class="col-md-12">
                <h3 class="page-title">Employee Working Experience</h3>
            </div>
        </div>
        <form>
            <div class="row mt-4">
                <div class="col-md-8 working-experience" 
                    v-for="(experience, counter) in working_experience" 
                    v-bind:key="counter++">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="comapny_name">Company Name<sup class="red">*</sup></label>
                            <input v-model="form.company_name" id="company_name" type="text" required  class="form-control" :class="{ 'is-invalid': form.errors.has('company_name') }">
                            <has-error :form="form" field="company_name"></has-error>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="title">Job Title <sup class="red">*</sup></label>
                            <input v-model="form.title" id="title" type="text" name="title" required  class="form-control" :class="{ 'is-invalid': form.errors.has('title') }">
                            <has-error :form="form" field="title"></has-error>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="from">From <sup class="red">*</sup></label>
                            <input v-model="form.from" id="from" type="date" name="from" required  class="form-control" :class="{ 'is-invalid': form.errors.has('from') }">
                            <has-error :form="form" field="from"></has-error>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="to">To <sup class="red">*</sup></label>
                            <input v-model="form.to" id="to" type="date" name="to" required  class="form-control" :class="{ 'is-invalid': form.errors.has('to') }">
                            <has-error :form="form" field="to"></has-error>
                        </div>
                    </div>
                    <div class="row pb-3" v-show="addClicked" v-if="counter > 1">
                        <div class="col-md-12">
                            <button @click="deleteWorkingExperience" class=" btn btn-danger btn-flat add-more" title="delete working experience">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <button @click="addWorkingExperience" class=" btn btn-success btn-flat add-more" title="add another working experience">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
            <div class="row line">
                <div class="col-md-4"></div>
                <div class="col-md-8 mb-3 mt-1">
                    <button type="submit" class="btn btn-large btn-primary mt-3">
                        Save Employee's Working Experience Info
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
                working_experience: [
                    {
                        company_name: '',
                        title: '',
                        from: '',
                        to: ''
                    }
                ],
                form: new Form({
                    company_name: '',
                    title: '',
                    from: '',
                    to: ''
                }),
            };
        },
        methods: {
            addWorkingExperience(){
                this.working_experience.push({
                    company_name: '',
                    title: '',
                    from: '',
                    to: ''
                });
                this.addClicked = true;
            },
            deleteWorkingExperience(counter){
                this.working_experience.splice(counter, 1);
                
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
