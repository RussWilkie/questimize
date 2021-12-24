<template>
  <div>
    <h3>Add Quest</h3>
    <form @submit.prevent="saveData">
      <div class="input-group mb-3 w-100">
        <input
          v-model="form.title"
          placeholder="Name"
          :class="{ 'is-invalid': form.errors.has('title') }"
          type="text"
          class="form-control form-control-lg"
          @keydown="form.errors.clear('title')"
          aria-label="Quest Name"
          aria-describedby="button-addon2"
        />
        <select
          v-model="form.category"
          id="categories"
          class="form-control form-control-lg"
          name="categories"
        >
          <option v-for="category in addCategories" :key="category.value">
            {{ category.text }}
          </option>
        </select>
        <div class="input-group-append">
          <button class="btn btn-success" type="submit" id="button-addon2">
            Add this to your list
          </button>
        </div>
      </div>
      <span
        class="text-danger pt-3 pb-3"
        style="font-size: 20px"
        v-if="form.errors.has('title')"
        v-text="form.errors.get('title')"
      ></span>
    </form>
  </div>
</template>
<script>
export default {
  props: {
    categories: Array,
    quests: Array,
  },
  data() {
    return {
      form: new Form({
        title: "",
        category: "Mini-Quest",
      }),
    };
  },
  computed: {
    addCategories: function () {
      return this.categories.filter((category) => {
        return category.value != "All Categories";
      });
    },
  },
  methods: {
    saveData() {
      let data = new FormData();
      let category = this.form.category;
      data.append("title", this.form.title);
      data.append("category", category);
      axios
        .post("/api/quest", data)
        .then((res) => {
          this.form.reset();
          this.$emit("add");
          //   this.getQuests();
          this.form.category = category;
        })
        .catch((error) => {
          this.form.errors.record(error.response.data.errors);
        });
    },
  },
};
</script>
