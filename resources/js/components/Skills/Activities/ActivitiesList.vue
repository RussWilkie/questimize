<template>
    <div>
    <h1>
        Activities Page
    </h1>
    <ActivitiesEntry :SubSkills="SubSkills"></ActivitiesEntry>
    <div class="w-100 Activity">
            <v-card v-for="Activity in Activities" :key="Activity.id" elevation="2">
                <v-card-title>{{Activity.name}}
                </v-card-title>
                <v-card-subtitle>XP Value: {{Activity.default_xp_value }}
                </v-card-subtitle>
                <v-card-text>
                    This belongs to the skill: {{ Activity.sub_skills.name }}
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
                Activities: Array,
                SubSkills: []
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
            getActivities() {
            axios.get('/api/activities/' + 1).then((res) => {
                this.Activities = res.data
            }).catch((error) => {
                console.log(error)
            })
        },
            getSubSkills(){
                axios.get('/api/subskill').then((res) => {
                    this.SubSkills = res.data
                }).catch((error) => {
                    console.log(error)
                })
            },
        }
    }
</script>
