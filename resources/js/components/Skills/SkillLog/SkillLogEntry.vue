<template>
    <div>
        <h1>Skills Log</h1>
        <form @submit.prevent="saveData">
            <!-- DATE(Auto selected to today) -->
            <div class="input-group mb-3 w-100">
                <input v-model="form.date" placeholder="Date" :class="{ 'is-invalid': form.errors.has('date') }"
                    type="date" class="form-control form-control-lg" @keydown="form.errors.clear('date')"
                    aria-label="Date" aria-describedby="button-addon2">
            </div>
            <!-- name, drop-down -->
            <div class="input-group mb-3 w-100">
                <select v-model="form.activities" id="skills" class="form-control form-control-lg" name="activities">
                <option v-for="activity in form.activities" :key="activity.name">
                    {{ activity.name }}
                </option>
            </select>
            </div>
            <div class="input-group mb-3 w-100">
                <input v-model="form.xp_earned" placeholder=0 :class="{ 'is-invalid': form.errors.has('xp_earned') }"
                    type="number" class="form-control form-control-lg" @keydown="form.errors.clear('xp_earned')"
                    aria-label="XP Earned" aria-describedby="button-addon2">
            </div>
            <!-- notes, text area -->
            <div class="input-group mb-3 w-100">
                <textarea v-model="form.notes" placeholder="Enter Notes Here" :class="{ 'is-invalid': form.errors.has('notes') }"
                    type="text" class="form-control form-control-lg" @keydown="form.errors.clear('notes')"
                    aria-label="Notes" aria-describedby="button-addon2"></textarea>
            </div>
            <div class="input-group-append">
                <button class="btn btn-success" type="submit" id="button-addon2">
                    Add this to your list
                </button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    props: {
        skills: Array,
    },
    data() {
        return {
            form: new Form({
                name: '',
                activities: {
                    name: 'Session',
                    name: 'Media Consumed'
                },
                xp_earned: 0,
                date: new Date().toISOString().substr(0, 10)
            }),
            
        }
    },
    computed: {
    
    },
    methods: {
        getSkillLogs(){
            axios.get('/api/objective').then((res) => {
                this.Objectives = res.data
            }).catch((error) => {
                console.log(error)
            })
        },
        saveData() {
            
        }
    },
    mounted() {
    }
}
</script>