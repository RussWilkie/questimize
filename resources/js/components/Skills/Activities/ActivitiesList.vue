<template>
    <div>
    <h1>
        Activities List
    </h1>
    <ActivitiesEntry :sub_skills="sub_skills" @get-activities="getActivities"></ActivitiesEntry>
    <div class="w-100 Activity">
            <v-card v-for="activity in activities" :key="activity.id" elevation="2">
                <v-card-title>{{activity.name}}
                </v-card-title>
                <v-card-subtitle>XP Value: {{activity.default_xp_value }}
                </v-card-subtitle>
                <v-card-text>
                    This belongs to the skill: {{ activity.sub_skills.name }}
                </v-card-text>
            </v-card>
        </div>
    </div>
</template>
<script>
import ActivitiesEntry from './ActivitiesEntry.vue';
    export default {
        data() {
            return {
                activities: [],
                sub_skills: [],
            }
        },
        components: {
            ActivitiesEntry
        },
        mounted() {
            this.getActivities();
            this.getSubSkills();
        },
        methods: {
            getActivities(sub_skill_id) {
            axios.get('/api/activities/' + sub_skill_id).then((res) => {
                this.activities = res.data;
            }).catch((error) => {
                console.log(error)
            })
        },
            getSubSkills(){
                axios.get('/api/subskill').then((res) => {
                    this.sub_skills = res.data
                }).catch((error) => {
                    console.log(error)
                })
            },
        }
    }
</script>
