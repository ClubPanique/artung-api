<template>
  <div class="listArtists">
    <ArtistCard
      v-for="(infosArtistResult, id) of infosArtistResults"
      v-show="searchByCategory==''|infosArtistResult.category==searchByCategory"
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
  props: {
    searchByCategory: {
      type: String,
      default: 'all'
    }
  },
  data() {
    return {
      infosArtistResults: null
    }
  },
  computed: {
    urlArtist() {
      return `${window.rootUrl}artists`;
    },
    // show() {
    //   if (this.searchByCategory==''|this.infosArtistResults.category==this.searchByCategory) return true
    //   else return false
    // }
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
.listArtists {
  display: flex;
  flex-direction: column;
  padding: 5px;
}
@media (min-width: 768px) {
  .listArtists {
    flex-direction: row;
    padding-right: 0;
  }
}
</style>
