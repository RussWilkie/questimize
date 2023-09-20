<template>
    <div>
        <h1>Skills List</h1>
        <form @submit.prevent="saveData">
            <div class="input-group mb-3 w-100">
                <input v-model="form.name" placeholder="Skill Name"
                    :class="{ 'is-invalid': form.errors.has('name') }" type="text" class="form-control form-control-lg"
                    @keydown="form.errors.clear('name')" aria-label="skill name" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-success" type="submit" id="button-addon2">Add New Skill</button>
                </div>
            </div>
            <span class="text-danger pt-3 pb-3" style="font-size:20px;" v-if="form.errors.has('name')"
                v-text="form.errors.get('name')"></span>
        </form>
        <div class="w-100 Skill">
            <v-card v-for="skill in skills" :key="skill.id" elevation="2">
                <v-card-title>{{skill.name}}
                </v-card-title>
                <v-card-subtitle>Level: {{skill.level}}
                </v-card-subtitle>
                <v-card-text>XP: {{skill.xp_earned }} / {{ skill.xp_to_next_level }}
                </v-card-text>
            </v-card>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        skills: [],
    },
    data() {
        return {
            form: new Form({
                name: '',
            })
        }
    },
    methods: {
        deleteSkill(e) {
            let data = new FormData();
            data.append('_method', 'DELETE')
            axios.post('/api/skill/' + e.id, data).then((res) => {
                this.skills = res.data
            }).catch((error) => {
                this.form.errors.record(error.response.data.errors)
            })
        },
        updateSkill(e) {
            this.editmode = false
            let data = new FormData();
            data.append('_method', 'PATCH')
            data.append('name', e.name)
            axios.post('/api/skill/' + e.id, data)
                .catch((error) => {
                    this.form.errors.record(error.response.data.errors)
                })
        },
        toggleSkill(e) {
            e.completed = !e.completed
            let data = new FormData();
            data.append('_method', 'PATCH')
            if (e.completed == true) {
                data.append('completed', 1);
            }
            if (e.completed == false) {
                data.append('completed', 0)
            }
            axios.post('/api/skill/' + e.id, data)
        },
        saveData() {
            let data = new FormData();
            console.log(data);
            data.append('name', this.form.name)
            axios.post('/api/skill', data).then((res) => {
                this.form.reset()
                this.$emit('get-skills')
            }).catch((error) => {
                this.form.errors.record(error.response.data.errors)
            })
        }
    },
}
</script>