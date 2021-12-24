<template>
  <div class="w-100 d-flex align-items-center p-3 bg-white border-bottom">
    <span class="mr-2">
      <svg
        @click="toggleQuest(quest)"
        v-if="quest.quest_status.name == 'Not Started'"
        xmlns="http://www.w3.org/2000/svg"
        class="icon icon-tabler icon-tabler-circle"
        width="36"
        height="36"
        viewBox="0 0 24 24"
        stroke-width="1.5"
        :stroke="quest.quest_status.color_hex_code"
        fill="none"
        stroke-linecap="round"
        stroke-linejoin="round"
      >
        <path stroke="none" d="M0 0h24v24H0z" />
        <circle cx="12" cy="12" r="9" />
      </svg>
      <svg
        @click="toggleQuest(quest)"
        v-if="quest.quest_status.name == 'In-Progress'"
        xmlns="http://www.w3.org/2000/svg"
        class="icon icon-tabler icon-tabler-blur"
        width="36"
        height="36"
        viewBox="0 0 24 24"
        stroke-width="1.5"
        :stroke="quest.quest_status.color_hex_code"
        fill="none"
        stroke-linecap="round"
        stroke-linejoin="round"
      >
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path
          d="M12 21a9.01 9.01 0 0 0 2.32 -.302a9.004 9.004 0 0 0 1.74 -16.733a9 9 0 1 0 -4.06 17.035z"
        />
        <path d="M12 3v17" />
        <path d="M12 12h9" />
        <path d="M12 9h8" />
        <path d="M12 6h6" />
        <path d="M12 18h6" />
        <path d="M12 15h8" />
      </svg>
      <svg
        @click="toggleQuest(quest)"
        v-if="quest.quest_status.name == 'Completed'"
        xmlns="http://www.w3.org/2000/svg"
        class="icon icon-tabler icon-tabler-circle-check"
        width="36"
        height="36"
        viewBox="0 0 24 24"
        stroke-width="1.5"
        stroke="#4CAF50"
        fill="none"
        stroke-linecap="round"
        stroke-linejoin="round"
      >
        <path stroke="none" d="M0 0h24v24H0z" />
        <circle cx="12" cy="12" r="9" />
        <path d="M9 12l2 2l4 -4" />
      </svg>
    </span>

    <div class="font-weight-bolder">
      <span v-if="editmode == false || editmode != quest.id">{{
        quest.title
      }}</span
      ><input v-if="editmode == quest.id" v-model="quest.title" type="text" />
    </div>
    <div
      v-if="showMode == quest.id"
      class="ml-auto mr-2 d-flex align-items-center"
    >
      {{ quest.description }}
    </div>
    <div class="ml-auto mr-2 d-flex align-items-center">
      <span>
        <span>{{ quest.quest_category.name }}</span>
        <svg
          @click="toggleMoreInfo(quest)"
          xmlns="http://www.w3.org/2000/svg"
          class="icon icon-tabler icon-tabler-eye"
          width="36"
          height="36"
          viewBox="0 0 24 24"
          stroke-width="1.5"
          stroke="currentColor"
          fill="none"
          stroke-linecap="round"
          stroke-linejoin="round"
        >
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <circle cx="12" cy="12" r="2" />
          <path
            d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"
          />
        </svg>
        <svg
          @click="editmode = quest.id"
          v-if="editmode != quest.id"
          xmlns="http://www.w3.org/2000/svg"
          class="icon icon-tabler icon-tabler-edit"
          width="36"
          height="36"
          viewBox="0 0 24 24"
          stroke-width="1.5"
          stroke="#FFC107"
          fill="none"
          stroke-linecap="round"
          stroke-linejoin="round"
        >
          <path stroke="none" d="M0 0h24v24H0z" />
          <path
            d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3"
          />
          <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
          <line x1="16" y1="5" x2="19" y2="8" />
        </svg>
        <svg
          v-if="editmode == quest.id"
          @click="updateQuest(quest)"
          xmlns="http://www.w3.org/2000/svg"
          class="icon icon-tabler icon-tabler-checkbox"
          width="36"
          height="36"
          viewBox="0 0 24 24"
          stroke-width="1.5"
          stroke="#4CAF50"
          fill="none"
          stroke-linecap="round"
          stroke-linejoin="round"
        >
          <path stroke="none" d="M0 0h24v24H0z" />
          <polyline points="9 11 12 14 20 6" />
          <path
            d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9"
          />
        </svg>
      </span>
      <span>
        <svg
          @click="deleteQuest(quest)"
          xmlns="http://www.w3.org/2000/svg"
          class="icon icon-tabler icon-tabler-trash ml-1"
          width="36"
          height="36"
          viewBox="0 0 24 24"
          stroke-width="1.5"
          stroke="#FF5722"
          fill="none"
          stroke-linecap="round"
          stroke-linejoin="round"
        >
          <path stroke="none" d="M0 0h24v24H0z" />
          <line x1="4" y1="7" x2="20" y2="7" />
          <line x1="10" y1="11" x2="10" y2="17" />
          <line x1="14" y1="11" x2="14" y2="17" />
          <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
          <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg
      ></span>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    quest: Object,
  },
  data() {
    return {
      editmode: false,
      showMode: false,
    };
  },
  methods: {
    deleteQuest(e) {
      let data = new FormData();
      data.append("_method", "DELETE");
      axios
        .post("/api/quest/" + e.id, data)
        .then((res) => {
          this.quests = res.data;
          //   this.getQuests();
          this.$emit("getQuests");
        })
        .catch((error) => {
          this.form.errors.record(error.response.data.errors);
        });
    },
    toggleMoreInfo(e) {
    //   console.log(e);
    //   console.log(this.showMode);
      if (!this.showMode) {
        this.showMode = e.id;
      } else {
        this.showMode = false;
      }
    },
    toggleQuest(e) {
      let data = new FormData();
      data.append("_method", "PATCH");
      if (e.quest_status.name == "Not Started") {
        data.append("quest_status[name]", "In-Progress");
      }
      if (e.quest_status.name == "In-Progress") {
        data.append("quest_status[name]", "Completed");
      }
      if (e.quest_status.name == "Completed") {
        data.append("quest_status[name]", "Not Started");
      }
      axios.post("/api/quest/" + e.id, data);
      //   this.getQuests();
      this.$emit("getQuests");
    },

    updateQuest(e) {
      this.editmode = false;
      let data = new FormData();
      data.append("_method", "PATCH");
      data.append("title", e.title);
      axios.post("/api/quest/" + e.id, data).catch((error) => {
        this.form.errors.record(error.response.data.errors);
      });
    },
  },
};
</script>
