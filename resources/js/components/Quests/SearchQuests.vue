<template>
  <div>
    <h3>Search Feature</h3>
    <form @submit.prevent="searchData">
      <div class="input-group mb-3 w-100">
        <input
          v-model="searchForm.keyword"
          placeholder=" Search Quest Name"
          type="text"
          class="form-control form-control-lg"
          aria-label="Quest Search"
          aria-describedby="button-addon2"
        />
        <!-- CATEGORY SEARCH SELECTION -->
        <select
          v-model="searchForm.category"
          id="searchCategories"
          class="form-control form-control-lg"
          name="searchCategories"
        >
          <option v-for="category in categories" :key="category.value">
            {{ category.text }}
          </option>
        </select>
        <select
          v-model="searchForm.status"
          id="searchStatus"
          class="form-control form-control-lg"
          name="searchStatus"
        >
          <option v-for="status in statuses" :key="status.value">
            {{ status.text }}
          </option>
        </select>
        <div class="input-group-append">
          <button class="btn btn-success" type="submit" id="button-addon2">
            Search
          </button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  props: {
    categories: Array,
    quests: Array,
    statuses: Array,
  },
  data() {
    return {
      searchForm: new Form({
        keyword: "",
        category: "All Categories",
        status: "All Statuses",
      }),
    };
  },
  methods: {
    searchData() {
      let fields = new FormData();
      fields.append("keyword", this.searchForm.keyword);
      fields.append("category", this.searchForm.category);
      fields.append("status", this.searchForm.status);
      axios
        .post("/api/search", fields)
        .then((res) => {
          this.$emit('search', res.data);
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>
