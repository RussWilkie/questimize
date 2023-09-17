<template>
    <div>
        <SubSkillsEntry :skills="skills" @get-sub-skills="getSubSkills"></SubSkillsEntry>
        <h1>SubSkills List</h1>
        <div class="w-100 SubSkill">
            <v-card v-for="subSkill in subSkills" :key="subSkill.id" elevation="2">
                <v-card-title>{{ subSkill.name }}
                </v-card-title>
                <v-card-subtitle>
                    Skill: {{ subSkill.skill.name }}
                </v-card-subtitle>
                <v-card-subtitle>Level: {{ subSkill.level }}
                </v-card-subtitle>
                <v-card-text>XP: {{ subSkill.xp_earned }} / {{ subSkill.xp_to_next_level }}
                </v-card-text>
            </v-card>
        </div>
    </div>
</template>

<script>
import SubSkillsEntry from './SubSkillsEntry.vue';

export default {
    props: {
        skills: []
    },
    components: {
        SubSkillsEntry
    },
    data() {
        return {
            subSkills: [],
        };
    },
    mounted() {
        this.getSubSkills();
    },
    methods: {
        getSubSkills() {
            axios.get('/api/subskill').then((res) => {
                this.subSkills = res.data;
            }).catch((error) => {
                console.log(error);
            });
        }
    },
}
</script>