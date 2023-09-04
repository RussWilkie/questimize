<template>
    <div>
        <h1>
            Skills Entry Component
        </h1>
        <form @submit.prevent="saveData">
            <input v-mode="Form.Name" type="text" placeholder="Enter name here" class="form-control form-control-lg" aria-label="Name" aria-describedby="button-add-activity">
            <input v-mode="Form.XpValue" type="number" placeholder="0" class="form-control form-control-lg" aria-label="XP Value" aria-describedby="button-add-activity">
            <select id="subskills" class="form-control form-control-lg" name="subskills">
                <option v-for="SubSkill in SubSkills"  :key="SubSkill.name">
                {{ SubSkill.name }}
                </option>
            </select>
            <div class="input-group-append">
                <button class="btn btn-success" type="submit" id="button-add-activity">
                    Add Activity
                </button>
            </div>
        </form>
    </div>
</template>
<script>
export default {
    props: {
        SubSkills: [],
    },
    data() {
        return {
            Form: new Form({
                Name: String,
                XpValue: Number,
            }),
        };
    },
    mounted() {
    },
    methods: {
        saveData() {
            let data = new FormData();
        }
    }
}
</script>
