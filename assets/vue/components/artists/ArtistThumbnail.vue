<template>
  <div class="artistThumbnail">
    <img
      :src="artist.photo"
      :alt="`Photo de ${ artist.nickname }`"
    >
    <div
      class="categoryButton"
      @click="emitValue(artist.category)"
    >
      <font-awesome-icon :icon="artistCategory" />
    </div>
  </div>
</template>

<script>
import { searchBus } from "../../index.js";

/* eslint-disable no-unreachable */
export default {
  name: 'ArtistThumbnail',
  props: {
    artist: {
      type: Object,
      required: true
    }
  },
  computed: {
    artistCategory() {
      switch(this.artist.category) {
      case 'architecture':
        return 'university';
        break;
      case 'sculpture':
        return 'screwdriver';
        break;
      case 'visual':
        return 'paint-brush';
        break;
      case 'music':
        return 'music';
        break;
      case 'literature':
        return 'book';
        break;
      case 'performing':
        return 'theater-masks';
        break;
      case 'film':
        return 'film';
        break;
      default:
        return 'question';
      }
    }
  },
  methods: {
    emitValue($event) {
      searchBus.$emit("input-category", $event);
    }
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.artistThumbnail {
  position: relative;
}
  img {
    width: 56px;
    height: 56px;
    margin-left: 2px;
    border-bottom-left-radius: 5px;
  }
  .categoryButton {
    cursor: pointer;
    position: absolute;
    top: 0;
    left: 2px;
    border: 0;
    background-color: transparent;
    width: 0; 
    height: 0; 
    border-left: 25px solid var(--light-semi-transparent);
    border-bottom: 25px solid transparent;
  }
  svg {
    position: absolute;
    top: 1px;
    left: -26px;
    width: 12px;
    height: 12px;
    color: var(--primary);
  }
</style>
