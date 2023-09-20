<template>
  <div>
    <v-tabs>
      <v-tab>Skills</v-tab>
      <v-tab-item>
        <SkillsList :skills="skills" @get-skills="getSkills"></SkillsList>
      </v-tab-item>
      <v-tab>Subskills</v-tab>
      <v-tab-item>
        <SubSkillsComponent :skills="skills" @get-skills="getSkills"></SubSkillsComponent>
      </v-tab-item>
        <v-tab>
          Skill Log
        </v-tab>
      <v-tab-item>
        <SkillLogEntry></SkillLogEntry>
      </v-tab-item>
        <v-tab>
          Activities Page
        </v-tab>
        <v-tab-item>
          <Activities></Activities>
        </v-tab-item>
    </v-tabs>
  </div>
</template>

<script>
import SkillsList from './SkillsList.vue';
import SubSkillsComponent from './Subskills/SubSkillsComponent.vue';
import SkillLogEntry from './SkillLog/SkillLogEntry.vue';
import Activities from './Activities/ActivitiesList.vue';

export default {
  data() {
    return {
      skills: [],
    }
  },
  components: {
    SkillsList,
    SubSkillsComponent,
    SkillLogEntry,
    Activities,
  },
  methods: {
    getSkills() {
      axios.get('/api/skill').then((res) => {
        this.skills = res.data
      }).catch((error) => {
        console.log(error)
      })
    },
  },
  mounted() {
    this.getSkills();
  }
}
</script>