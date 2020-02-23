<template>
  <div>
    <SearchBar />
    <p>{{ searchText }}</p>
    <p>{{ searchCategory }}</p>
  </div>
</template>

<script>
import SearchBar from '../../components/searchs/SearchBar.vue';

import {searchBus} from '../../index.js';

export default {
  name: 'Alice',
  components: {SearchBar},
  data() {
    return {
      searchText: '',
      searchCategory: '',
    };
  },
  created() {
    searchBus.$on('input-text', data => {
      this.searchText = data;
    });
    searchBus.$on('input-select', data => {
      this.searchCategory = data;
    });
  },
};
</script>

<style lang="scss"></style>
