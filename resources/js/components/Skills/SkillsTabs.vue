<template>
    <v-app>
      <v-main>
        <v-container>
          <v-tabs>
            <v-tab>Test 1</v-tab>
            <v-tab>Test 2</v-tab>
          </v-tabs>
        </v-container>
      </v-main>
    </v-app>
  </template>
<script>
  export default {
    data: () => ({
      tab: null,
    }),
  }
</script>