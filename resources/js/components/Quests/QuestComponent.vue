<template>
  <div class="w-30">
    <search-quests
      :categories="categories"
      @search="filterQuests"
      :statuses="statuses"
    ></search-quests>
    <add-quest v-if="$can('edit quests')" :categories="categories"  @add="getQuests"> </add-quest>
    <quests-stats
      :quests="quests"
      :questsNotStarted="questsNotStarted"
      :questsInProgress="questsInProgress"
      :questsCompleted="questsCompleted"
    >
    </quests-stats>
    <div class="w-100 quest">
      <div v-for="(quest, index) in quests" :key="quest.id">
        <h1 class="font-weight-black text-white" v-if="newQuestHeader(quest, quests[index-1]) || index === 0">{{quest.quest_category.name}}</h1>
        <quest :quest="quest" @getQuests="getQuests"></quest>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      quests: Array,
      questHeaders: Array,
      questsNotStarted: Array,
      questsInProgress: Array,
      questsCompleted: Array,
      statuses: [
        { text: "All Statuses", value: "All Statuses" },
        { text: "Not Started", value: "Not Started" },
        { text: "In-Progress", value: "In-Progress" },
        { text: "Completed", value: "Completed" },
      ],
      categories: [
        { text: "All Categories", value: "All Categories" },
        { text: "Mini-Quest", value: "Mini-Quest" },
        { text: "Ninja/Assassin", value: "Ninja/Assasin" },
        { text: "Adventurer", value: "Adventurer" },
        { text: "Wizard", value: "Wizard" },
        { text: "Ranger", value: "Ranger" },
        { text: "Scout", value: "Scout" },
        { text: "Warrior", value: "Warrior" },
        { text: "Bard", value: "Bard" },
        { text: "Jester", value: "Jester" },
        { text: "Clergy", value: "Clergy" },
        { text: "Chef", value: "Chef" },
        { text: "Hero", value: "Hero" },
        { text: "Master", value: "Master" },
      ],
    };
  },
  methods: {
    getQuests() {
      axios
        .get("/api/quest")
        .then((res) => {
          this.quests = res.data;
          this.questsNotStarted = this.quests.filter(
            (quest) => quest.quest_status.name == "Not Started"
          );
          this.questsInProgress = this.quests.filter(
            (quest) => quest.quest_status.name == "In-Progress"
          );
          this.questsCompleted = this.quests.filter(
            (quest) => quest.quest_status.name == "Completed"
          );
        })
        .catch((error) => {
          console.log(error);
        });
    },
    filterQuests(filter) {
      this.quests = filter;
    },
    newQuestHeader(quest, questComparer){
      if(!questComparer){
        return false;
      }
      else{
        return quest.quest_category.name !== questComparer.quest_category.name
      }
    }
  },
  mounted() {
    this.getQuests();
  },
};
</script>
