<template>
  <div class="input-group m-2">
    <select
      class="form-control"
      :value="value"
      @input="emitValue($event)"
    >
      <option
        value=""
        selected
      >
        Rechercher une catégorie
      </option>
      <option
        v-for="(option, index) in options"
        :key="index"
        :value="option.englishOption"
      >
        {{ option.frenchOption }}
      </option>
    </select>
  </div>
</template>

<script>
import { searchBus } from "../../index.js";

export default {
  name: "SearchBySelect",
  data() {
    return {
      value: "",
      options: [
        {frenchOption: "Architecture", englishOption: "architecture"},
        {frenchOption: "Sculpture", englishOption: "sculpture"},
        {frenchOption: "Arts visuels", englishOption: "visual"},
        {frenchOption: "Musique", englishOption: "music"},
        {frenchOption: "Littérature", englishOption: "literature"},
        {frenchOption: "Arts de la scène", englishOption: "performing"},
        {frenchOption: "Cinéma", englishOption: "film"}
      ]
    };
  },
  methods: {
    emitValue($event) {
      searchBus.$emit("input-select", $event.target.value);
    }
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
/* Permet d'afficher une flèche personnalisée */
select {
  background-image: linear-gradient(45deg, transparent 50%, black 60%),
    linear-gradient(135deg, black 40%, transparent 50%) !important;
  background-position: calc(100% - 30px) 14px, calc(100% - 20px) 14px, 100% 0;
  background-size: 10px 10px, 10px 10px;
  background-repeat: no-repeat;
  -webkit-appearance: none;
  -moz-appearance: none;
}
</style>
