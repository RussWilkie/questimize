<template>
    <div>
        <SubSkillsEntry :skills="skills"></SubSkillsEntry>
        <SubSkillsList :skills="skills"></SubSkillsList>
    </div>
</template>
<script>
import SubSkillsEntry from './SubSkillsEntry.vue';
import SubSkillsList from './SubSkillsList.vue';

export default {
    components: {
        SubSkillsEntry,
        SubSkillsList
    },
    props: {
        skills: []
    },
    emits: [
        'get-sub-skills'
    ]
}
</script>
