<template>
  <div>
    <div class="listArtists">
      <ArtistCard
        v-for="(artist, id) of filteredArtists"
        :key="id"
        :artist="artist"
      />
    </div>
    <p v-show="filteredArtists.length == 0">
      Aucun artiste ne correspond à votre recherche.
    </p>
  </div>
</template>

<script>
import ArtistCard from "./ArtistCard";

export default {
  name: "ListArtists",
  components: {
    ArtistCard
  },
  props: {
    searchByCategory: {
      type: String,
      default: ""
    },
    searchByText: {
      type: String,
      default: ""
    }
  },
  data() {
    return {
      infosArtistResults: null
    };
  },
  computed: {
    urlArtist() {
      return `${window.rootUrl}artists`;
    },
    filteredArtists: function() {
      if (this.searchByText !== "") {
        return this.infosArtistResults.filter(this.filterArtistsByText);
      } else if (this.searchByCategory !== "") {
        return this.infosArtistResults.filter(this.filterArtistsByCategory);
      } else {
        return this.infosArtistResults;
      }
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
    },
    filterArtistsByText: function(obj) {
      if (
        obj.nickname.toLowerCase().includes(this.searchByText.toLowerCase())
      ) {
        return true;
      } else {
        return false;
      }
    },
    filterArtistsByCategory: function(obj) {
      if (obj.category === this.searchByCategory) {
        return true;
      } else {
        return false;
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
  padding-top: 5px;
}
@media (min-width: 768px) {
  .listArtists {
    flex-direction: row;
    padding-right: 5px;
  }
}
</style>
