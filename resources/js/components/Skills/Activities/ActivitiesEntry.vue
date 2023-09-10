<template>
    <div>
        <h1>
            Skills Entry Component
        </h1>
        <form @submit.prevent="saveData">
            <input v-model="form.name" type="text" placeholder="Enter name here" class="form-control form-control-lg" aria-label="Name" aria-describedby="button-add-activity">
            <input v-model="form.xp_value" type="number" min="0" placeholder="0" class="form-control form-control-lg" aria-label="XP Value" aria-describedby="button-add-activity">
            <select v-model="form.sub_skill" id="subskills" class="form-control form-control-lg" name="subskills">
                <option v-for="sub_skill in sub_skills"  :key="sub_skill.id">
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
    mounted() {
    },
    methods: {
        saveData() {
            let data = new FormData();
            data.append('name', this.form.name);
            data.append('default_xp_value', this.form.xp_value);
            data.append('sub_skill', this.form.sub_skill);
            axios
                .post("/api/activities", data)
                .then((res) => {
                this.form.reset();
                this.$emit('add');
                })
                .catch((error) => {
                this.form.errors.record(error.response.data.errors);
                });
        }
    }
}
</script>
