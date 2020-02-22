<template>
  <div>
    <SearchByText v-model="searchText" />
    <SearchBySelect v-model="searchCategory" />
  </div>
</template>

<script>
import SearchByText from '../../components/searchs/SearchByText.vue';
import SearchBySelect from '../../components/searchs/SearchBySelect';

export default {
  name: 'Alice',
  components: {SearchByText, SearchBySelect},
  data() {
    return {
      searchText: '',
      searchCategory: '',
    };
  },
};
</script>

<style lang="scss"></style>
