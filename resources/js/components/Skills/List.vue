<template>
    <div>
        <h1>Skills List</h1>
        <form @submit.prevent="saveData">
            <div class="input-group mb-3 w-100">
                <input v-model="form.name" placeholder="Skill name"
                    :class="{ 'is-invalid': form.errors.has('name') }" type="text" class="form-control form-control-lg"
                    @keydown="form.errors.clear('name')" aria-label="Skill name" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-success" type="submit" id="button-addon2">Add New Skill</button>
                </div>
            </div>
            <span class="text-danger pt-3 pb-3" style="font-size:20px;" v-if="form.errors.has('name')"
                v-text="form.errors.get('name')"></span>
        </form>
        <div class="w-100 Skill">
            <v-card v-for="Skill in Skills" :key="Skill.id" elevation="2">
                <v-card-title>{{Skill.name}}
                </v-card-title>
                <v-card-subtitle>Level: {{Skill.level}}
                </v-card-subtitle>
                <v-card-text>XP: {{Skill.xp_earned }} / {{ Skill.xp_to_next_level }}
                </v-card-text>
            </v-card>
        
        </div>
    </div>
</template>

<script>
import SkillsTabs from './SkillsTabs.vue';
export default {
    components: {
      SkillsTabs
    },
    data() {
        return {
            editmode: false,
            Skills: '',
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
                this.Skills = res.data
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
        getSkills() {
            axios.get('/api/skill').then((res) => {
                this.Skills = res.data
            }).catch((error) => {
                console.log(error)
            })
        },
        saveData() {
            let data = new FormData();
            data.append('name', this.form.name)
            axios.post('/api/skill', data).then((res) => {
                this.form.reset()
                this.getSkills()
            }).catch((error) => {
                this.form.errors.record(error.response.data.errors)
            })
        }
    },
    mounted() {
        this.getSkills()
    }
}
</script>