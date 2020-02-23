<template>
  <div>
    <Header />
    <SearchBar />
    <ListArtists
      :search-by-category="searchCategory"
      :search-by-text="searchText"
    />
  </div>
</template>

<script>
import Header from '../components/navs/Header'
import SearchBar from '../components/searchs/SearchBar'
import {searchBus} from '../index.js';
import ListArtists from '../components/artists/ListArtists'

export default {
  name: 'Home',
  components: {
    Header,
    SearchBar,
    ListArtists,
  },
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

<style lang="scss">

</style>
