<template>
  <div>
    <ArtistCard
      v-for="(infosArtistResult, id) of infosArtistResults"
      :key="id"
      :artist="infosArtistResult"
    />
  </div>
</template>

<script>
import ArtistCard from './ArtistCard'

export default {
  name: 'ListArtists',
  components: {
    ArtistCard,
  },
  data() {
    return {
      infosArtistResults: null
    }
  },
  computed: {
    urlArtist() {
      return `${window.rootUrl}artists`;
    }
  },
  created() {
    this.getInfosArtist();
  },
  methods: {
    async getInfosArtist() {
      try {
        const response = await fetch(this.urlArtist);
        const result = await response.json();
        this.infosArtistResults = result;
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
