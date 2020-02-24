<template>
  <div>
    <Header />
    <ArtistCard :artist="artistProp" />
    <SearchBar :search-types="searchTypes" />
    <ListPosts :artist="artistProp" />
  </div>
</template>

<script>
import Header from "../../components/navs/Header";
import ArtistCard from "../../components/artists/ArtistCard";
import SearchBar from "../../components/searchs/SearchBar";
import ListPosts from "../../components/posts/ListPosts";

export default {
  name: "ArtistDetails",
  components: {
    Header,
    ArtistCard,
    SearchBar,
    ListPosts
  },
  data() {
    return {
      searchTypes: ["flux", "date"]
    };
  },
  computed: {
    artistProp() {
      return this.$route.params.artist;
    }
  }
};
</script>

<style lang="scss">
</style>
