<template>
  <div>
    <Header />
    <SearchBar :search-types="searchTypes" />
    <ListArtists
      :search-by-category="searchCategory"
      :search-by-text="searchText"
    />
  </div>
</template>

<script>
import Header from "../../components/navs/Header";
import SearchBar from "../../components/searchs/SearchBar";
import { searchBus } from "../../index.js";
import ListArtists from "../../components/artists/ListArtists";

export default {
  name: "Catalog",
  components: {
    Header,
    SearchBar,
    ListArtists
  },
  data() {
    return {
      searchTypes: ["category", "text"],
      searchText: "",
      searchCategory: ""
    };
  },
  created() {
    searchBus.$on("input-text", data => {
      this.searchText = data;
    });
    searchBus.$on("input-category", data => {
      this.searchCategory = data;
    });
  }
};
</script>

<style lang="scss">
</style>
