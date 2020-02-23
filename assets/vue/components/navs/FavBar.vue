<template>
  <div>
    <ArtistThumbnail
      v-for="(favResult, id) of favResults"
      :key="id"
      :artist="favResult"
    />
  </div>
</template>

<script>
import ArtistThumbnail from '../artists/ArtistThumbnail'

export default {
  name: 'FavBar',
  components: {
    ArtistThumbnail,
  },
  data() {
    return {
      favResults: null
    }
  },
  computed: {
    urlFav() {
      return `${window.rootUrl}fans/2`;
    }
  },
  created() {
    this.getFav();
  },
  methods: {
    async getFav() {
      try {
        const response = await fetch(this.urlFav);
        const result = await response.json();
        this.favResults = result.favoris;
      } catch (err) {
        console.log(err);
      }
    }
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
