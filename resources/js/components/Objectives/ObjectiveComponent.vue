<template>
    <div>
        <form @submit.prevent="saveData">
            <div class="input-group mb-3 w-100">
                <input v-model="form.name" placeholder="Objective name"
                    :class="{ 'is-invalid': form.errors.has('name') }" type="text" class="form-control form-control-lg"
                    @keydown="form.errors.clear('name')" aria-label="Objective name" aria-describedby="button-addon2">
                <input v-model="form.skill" placeholder="Related skill"
                    :class="{ 'is-invalid': form.errors.has('skill') }" type="text" class="form-control form-control-lg"
                    @keydown="form.errors.clear('skill')" aria-label="Related skill" aria-describedby="button-addon2">
                <input v-model="form.xp_value" placeholder="XP Value"
                    :class="{ 'is-invalid': form.errors.has('xp_value') }" type="number"
                    class="form-control form-control-lg" @keydown="form.errors.clear('xp_value')" aria-label="XP Value"
                    aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-success" type="submit" id="button-addon2">Add this to your list</button>
                </div>
            </div>
            <span class="text-danger pt-3 pb-3" style="font-size:20px;" v-if="form.errors.has('name')"
                v-text="form.errors.get('name')"></span>
            <span class="text-danger pt-3 pb-3" style="font-size:20px;" v-if="form.errors.has('skill')"
                v-text="form.errors.get('skill')"></span>
            <span class="text-danger pt-3 pb-3" style="font-size:20px;" v-if="form.errors.has('xp_value')"
                v-text="form.errors.get('xp_value')"></span>
        </form>

        <div class="w-100 Objective">
            <v-card v-for="Objective in Objectives" :key="Objective.id" elevation="2">
                <v-card-title>{{Objective.name}}
                </v-card-title>
                <v-card-subtitle>{{Objective.xp_value }}
                </v-card-subtitle>
                <v-card-text>{{ Objective.skill }}
                </v-card-text>
            </v-card>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            editmode: false,
            Objectives: Object,
            form: new Form({
                name: "",
                skill: "",
                xp_value: "",
            })
        }
    },
    methods: {
        deleteObjective(e) {
            let data = new FormData();
            data.append('_method', 'DELETE')
            axios.post('/api/objective/' + e.id, data).then((res) => {
                this.Objectives = res.data
            }).catch((error) => {
                this.form.errors.record(error.response.data.errors)
            })
        },
        updateObjective(e) {
            this.editmode = false
            let data = new FormData();
            data.append('_method', 'PATCH')
            data.append('name', e.name)
            axios.post('/api/objective/' + e.id, data)
                .catch((error) => {
                    this.form.errors.record(error.response.data.errors)
                })
        },
        toggleObjective(e) {
            e.completed = !e.completed
            let data = new FormData();
            data.append('_method', 'PATCH')
            if (e.completed == true) {
                data.append('completed', 1);
            }
            if (e.completed == false) {
                data.append('completed', 0)
            }
            axios.post('/api/objective/' + e.id, data)
        },
        getObjectives() {
            axios.get('/api/objective').then((res) => {
                this.Objectives = res.data
            }).catch((error) => {
                console.log(error)
            })
        },
        saveData() {
            let data = new FormData();
            data.append('name', this.form.name)
            data.append('skill', this.form.skill)
            data.append('xp_value', this.form.xp_value)
            axios.post('/api/objective', data).then((res) => {
                this.form.reset()
                this.getObjectives()
            }).catch((error) => {
                this.form.errors.record(error.response.data.errors)
            })
        }
    },
    mounted() {
        this.getObjectives()
    }
}
</script>