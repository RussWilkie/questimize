<template>
    <div>
        <h1>Subskills Component</h1>
        <form @submit.prevent="saveData">
            <div class="input-group mb-3 w-100">
                <input v-model="form.name" placeholder="Subskill name" :class="{ 'is-invalid': form.errors.has('name') }"
                    type="text" class="form-control form-control-lg" @keydown="form.errors.clear('name')"
                    aria-label="Subkill name" aria-describedby="button-addon2">
            </div>
            <span class="text-danger pt-3 pb-3" style="font-size:20px;" v-if="form.errors.has('name')"
                v-text="form.errors.get('name')"></span>
            <select v-model="form.skill" id="skills" class="form-control form-control-lg" name="skills">
                <option v-for="skill in addSkills" :key="skill.name">
                    {{ skill.name }}
                </option>
            </select>
            <div class="input-group-append">
                <button class="btn btn-success" type="submit" id="button-addon2">
                    Add this to your list
                </button>
            </div>
        </form>
    </div>
</template>
<script>
export default{
    props: {
        skills: []
    },
    data() {
        return {
            form: new Form({
                name: '',
                skill: 'Adventuring',
            }),
        };
    },
    computed: {
        addSkills() {
            return this.skills.filter((skill) => {
                return skill.name != "";
            });
        },
    },
    methods: {
        saveData() {
            let data = new FormData();
            let skill = this.form.skill;
            data.append('name', this.form.name);
            data.append('skill', skill);
            axios.post('/api/subskill', data).then((res) => {
                this.form.reset();
                this.$emit('get-sub-skills');
                this.form.skill = skill;
            }).catch((error) => {
                this.form.errors.record(error.response.data.errors);
            });
        }
    }
}
</script>
