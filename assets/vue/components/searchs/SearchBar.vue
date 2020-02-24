<template>
  <div>
    <div class="d-flex">
      <div
        v-for="(type, index) in searchTypes"
        :key="index"
        class="w-50 mx-2"
      >
        <SearchBySelect
          v-if="type == 'category'"
          :search="searchByCategory"
        />
        <SearchBySelect
          v-if="type == 'flux'"
          :search="searchByFlux"
        />
        <SearchBySelect
          v-if="type == 'date'"
          :search="searchByDate"
        />
        <SearchByText v-if="type == 'text'" />
      </div>
    </div>
  </div>
</template>

<script>
import SearchBySelect from "./SearchBySelect";
import SearchByText from "./SearchByText";

export default {
  name: "SearchBar",
  components: {
    SearchBySelect,
    SearchByText
  },
  props: {
    searchTypes: {
      type: Array,
      required: true
    }
  },
  data() {
    return {
      searchByCategory: {
        type: "category",
        label: "Rechercher une catégorie",
        options: [
          { text: "Architecture", value: "architecture" },
          { text: "Sculpture", value: "sculpture" },
          { text: "Arts visuels", value: "visual" },
          { text: "Musique", value: "music" },
          { text: "Littérature", value: "literature" },
          { text: "Arts de la scène", value: "performing" },
          { text: "Cinéma", value: "film" }
        ]
      },
      searchByFlux: {
        type: "flux",
        label: "Rechercher un réseau social",
        options: [
          { text: "Facebook", value: "facebook" },
          { text: "Twitter", value: "twitter" },
          { text: "YouTube", value: "youtube" },
          { text: "Wordpress", value: "wordpress" }
        ]
      },
      searchByDate: {
        type: "date",
        label: "Trier par date",
        options: [
          { text: "Du plus récent au plus ancien", value: "desc" },
          { text: "Du plus ancien au plus récent", value: "asc" }
        ]
      }
    };
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped></style>
