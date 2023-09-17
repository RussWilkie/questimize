<template>
    <div>
        <form @submit.prevent="saveData">
            <input v-model="form.name" type="text" placeholder="Enter name here" class="form-control form-control-lg" aria-label="Name" aria-describedby="button-add-activity">
            <input v-model="form.xp_value" type="number" min="0" placeholder="0" class="form-control form-control-lg" aria-label="XP Value" aria-describedby="button-add-activity">
            <select v-model="form.sub_skill" @change="selectActivities($event)" id="subskills" class="form-control form-control-lg" name="subskills">
                <option v-for="sub_skill in sub_skills"  :key="sub_skill.id" :value="sub_skill.id">
                {{ sub_skill.name }}
                </option>
            </select>
            <div class="input-group-append">
                <button class="btn btn-success" type="submit" id="button-add-activity">
                    Add Activity
                </button>
            </div>
        </form>
    </div>
</template>
<script>
export default {
    props: {
        sub_skills: [],
    },
    data() {
        return {
            form: new Form({
                name: '',
                xp_value: 0,
                sub_skill: '',
            }),
        };
    },
    methods: {
        selectActivities(event){
            this.$emit('get-activities', event.target.value);
        },
        saveData() {
            let data = new FormData();
            let selectedSubSkill = this.form.sub_skill;
            data.append('name', this.form.name);
            data.append('default_xp_value', this.form.xp_value);
            data.append('sub_skill', selectedSubSkill);
            axios
                .post("/api/activities", data)
                .then((res) => {
                this.$emit('get-activities', this.form.sub_skill);
                this.form.reset();
                this.form.sub_skill = selectedSubSkill;
                })
                .catch((error) => {
                this.form.errors.record(error.response.data.errors);
                });
        }
    }
}
</script>
