<template>
    <div>
    <h1>
        Activities Page
    </h1>
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
    export default {
        data() {
            return {
                Activities: Object,
            }
        },
        mounted() {
            this.getActivities();
        },
        methods: {
            getActivities() {
            axios.get('/api/activities/' + 1).then((res) => {
                this.Activities = res.data
            }).catch((error) => {
                console.log(error)
            })
        },
        }
    }
</script>
