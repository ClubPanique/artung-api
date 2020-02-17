<template>
  <div>
    <Header />
    <ArtistCard />
    <SearchBar />
    <ListPosts />
  </div>
</template>

<script>
import Header from '../../components/navs/Header'
import ArtistCard from '../../components/artists/ArtistCard'
import SearchBar from '../../components/searchs/SearchBar'
import ListPosts from '../../components/posts/ListPosts'

export default {
  name: 'ArtistPreview',
  components: {
    Header,
    ArtistCard,
    SearchBar,
    ListPosts,
  }
};
</script>

<style lang="scss">

</style>
