<template>
<div class="w-150" v-if="quests.length > 0">
      <h4 class="text-white text-center">
        Not Started: {{ questsNotStarted.length }} | In-Progress:
        {{ questsInProgress.length }} | Completed: {{ questsCompleted.length }}
      </h4>
      <p class="text-white text-center">
        Completion Progress: {{ questsCompleted.length }}/{{
          questsNotStarted.length +
          questsInProgress.length +
          questsCompleted.length
        }}
        ({{
          Math.floor(
            (questsCompleted.length /
              (questsNotStarted.length +
                questsInProgress.length +
                questsCompleted.length)) *
              100
          )
        }}%)
      </p>
    </div>
</template>
<script>
export default({
    props:{
        quests: Array,
        questsNotStarted: Array,
        questsInProgress: Array,
        questsCompleted: Array,
    },
    data() {
        return{

        };
    },
})
</script>
