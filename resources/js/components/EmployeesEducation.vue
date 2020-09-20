<template>
    <div class="container pt-4">
        <div class="row">
            <div class="col-md-12">
                <h3 class="page-title">Employee Educational Background</h3>
            </div>
        </div>
        <form>
            <div class="row mt-4">
                <div class="col-md-8">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name">Name of Institution <span class="label-desc">(Last One)</span><sup class="red">*</sup></label>
                            <input v-model="form.name" id="name" type="text" name="name" required  class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                            <has-error :form="form" field="name"></has-error>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="certificate">Qualification <sup class="red">*</sup></label>
                            <input v-model="form.certificate" id="certificate" type="text" name="certificate" required  class="form-control" :class="{ 'is-invalid': form.errors.has('certificate') }">
                            <has-error :form="form" field="certificate"></has-error>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="start_date">Start Date <sup class="red">*</sup></label>
                            <input v-model="form.start_date" id="start_date" type="date" name="start_date" required  class="form-control" :class="{ 'is-invalid': form.errors.has('start_date') }">
                            <has-error :form="form" field="start_date"></has-error>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="end_date">End Date <sup class="red">*</sup></label>
                            <input v-model="form.end_date" id="end_date" type="date" name="end_date" required  class="form-control" :class="{ 'is-invalid': form.errors.has('end_date') }">
                            <has-error :form="form" field="end_date"></has-error>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="core_area">Core Area <sup class="red">*</sup></label>
                            <input v-model="form.core_area" id="name" type="text" name="core_area" required  class="form-control" :class="{ 'is-invalid': form.errors.has('core_area') }">
                            <has-error :form="form" field="core_area"></has-error>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="professional_title">Professional Title <sup class="red">*</sup></label>
                            <input v-model="form.professional_title" id="professional_title" type="text" name="professional_title" required  class="form-control" :class="{ 'is-invalid': form.errors.has('professional_title') }">
                            <has-error :form="form" field="professional_title"></has-error>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="core_area">Grade <sup class="red">*</sup></label>
                            <select v-model="form.core_area" id="name" name="core_area" required  class="form-control" :class="{ 'is-invalid': form.errors.has('core_area') }">
                                <option value="">--Select--</option>
                            </select>
                            <has-error :form="form" field="core_area"></has-error>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <h3 class="page-title">Other Skills</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4" 
                        v-for="(skill, counter) in skills"
                        v-bind:key="counter++">
                            <label for="skill">Skill {{`#`+counter}}</label>
                            <input v-model="form.skill" id="skill" type="text" name="skill" class="form-control">
                            <button @click="deleteSkill" v-show="addClicked" v-if="counter > 1" class="btn btn-danger btn-flat mt-2 add-more" title="Delete Skill">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        <div class="col-md-1">
                            <button @click="addSkill" class=" btn btn-success btn-flat add-more" title="Add Another Skill">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row line">
                <div class="col-md-4"></div>
                <div class="col-md-8 mb-3 mt-1">
                    <button type="submit" class="btn btn-large btn-primary mt-3">
                        Save Employee's Educational Info
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
                skills: [{
                    skill: '',
                }],
                form: new Form({
                    name: '',
                    certificate: '',
                    start_date: '',
                    end_date: '',
                    core_area: '',
                    professional_title: '',
                    skill: ''
                }),
            };
        },
        methods: {
            addSkill(){
                this.skills.push({
                    skill: ''
                });
                this.addClicked = true;
            },
            deleteSkill(counter){
                this.skills.splice(counter, 1);
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
