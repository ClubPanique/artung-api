<template>
  <div>
    <SearchByText v-model="searchText" />
  </div>
</template>

<script>
import SearchByText from '../../components/searchs/SearchByText.vue';

export default {
  name: 'Alice',
  components: {SearchByText},
  data() {
    return {
      searchText: '',
    };
  },
};
</script>

<style lang="scss"></style>
