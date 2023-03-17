<template>
    <div>
       <v-tabs>
        <v-tab>Skills</v-tab>
        <v-tab-item><SkillsList></SkillsList></v-tab-item>
        <v-tab>Subskills</v-tab>
        <v-tab-item><SubSkillsList></SubSkillsList></v-tab-item>
       </v-tabs>
    </div>
</template>

<script>
import SkillsList from './SkillsList.vue';
import SubSkillsList from './Subskills/SubSkillsList.vue';

export default {
    components: {
      SkillsList,
      SubSkillsList
    }
}
</script>