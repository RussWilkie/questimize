<template>
    <div>
        <h1>SubSkills List</h1>
        <form @submit.prevent="saveData">
            <div class="input-group mb-3 w-100">
                <input v-model="form.name" placeholder="SubSkill name"
                    :class="{ 'is-invalid': form.errors.has('name') }" type="text" class="form-control form-control-lg"
                    @keydown="form.errors.clear('name')" aria-label="SubSkill name" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-success" type="submit" id="button-addon2">Add New SubSkill</button>
                </div>
            </div>
            <span class="text-danger pt-3 pb-3" style="font-size:20px;" v-if="form.errors.has('name')"
                v-text="form.errors.get('name')"></span>
                <select
          v-model="form.skills"
          id="skills"
          class="form-control form-control-lg"
          name="skills"
        >
          <option v-for="skill in addSkills" :key="skill.value">
            {{ skill.name }}
          </option>
        </select>
        <div class="input-group-append">
          <button class="btn btn-success" type="submit" id="button-addon2">
            Add this to your list
          </button>
        </div>

        <!--Edit this to assign skill to subskill-->
                
        </form>
        <div class="w-100 SubSkill">
            <v-card v-for="SubSkill in SubSkills" :key="SubSkill.id" elevation="2">
                <v-card-title>{{SubSkill.name}}
                </v-card-title>
                <v-card-subtitle>Level: {{SubSkill.level}}
                </v-card-subtitle>
                <v-card-text>XP: {{SubSkill.xp_earned }} / {{ SubSkill.xp_to_next_level }}
                </v-card-text>
            </v-card>
        
        </div>
    </div>
</template>

<script>
export default {
    props: {
        skills: Array,
    },
    data() {
        return {
            SubSkills: '',
            form: new Form({
                name: '',
            })
        }
    },
    computed: {
    addSkills: function () {
      return this.skills.filter((skill) => {
        return skill.name != "All Skills";
      });
    },
  },
    methods: {
        deleteSubSkill(e) {
            let data = new FormData();
            data.append('_method', 'DELETE')
            axios.post('/api/subskill/' + e.id, data).then((res) => {
                this.SubSkills = res.data
            }).catch((error) => {
                this.form.errors.record(error.response.data.errors)
            })
        },
        updateSubSkill(e) {
            this.editmode = false
            let data = new FormData();
            data.append('_method', 'PATCH')
            data.append('name', e.name)
            axios.post('/api/subskill/' + e.id, data)
                .catch((error) => {
                    this.form.errors.record(error.response.data.errors)
                })
        },
        toggleSubSkill(e) {
            e.completed = !e.completed
            let data = new FormData();
            data.append('_method', 'PATCH')
            if (e.completed == true) {
                data.append('completed', 1);
            }
            if (e.completed == false) {
                data.append('completed', 0)
            }
            axios.post('/api/subskill/' + e.id, data)
        },
        getSubSkills() {
            axios.get('/api/subskill').then((res) => {
                this.SubSkills = res.data
            }).catch((error) => {
                console.log(error)
            })
        },
        saveData() {
            let data = new FormData();
            data.append('name', this.form.name)
            axios.post('/api/subskill', data).then((res) => {
                this.form.reset()
                this.getSubSkills()
            }).catch((error) => {
                this.form.errors.record(error.response.data.errors)
            })
        }
    },
    mounted() {
        this.getSubSkills()
    }
}
</script>