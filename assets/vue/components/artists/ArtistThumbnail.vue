<template>
  <div>
    <img
      :src="artist.photo"
      :alt="`Photo de ${ artist.nickname }`"
    >
    <div class="categoryButton">
      <font-awesome-icon icon="music" />
    </div>
  </div>
</template>

<script>
export default {
  name: 'ArtistThumbnail',
  props: {
    artist: {
      type: Object,
      required: true
    }
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  img {
    width: 56px;
    height: 56px;
  }
  .categoryButton {
    cursor: pointer;
    position: absolute;
    top: 2px;
    left: 2px;
    border: 0;
    background-color: transparent;
    width: 0; 
    height: 0; 
    border-left: 25px solid rgba(255, 255, 255, .5);
    border-bottom: 25px solid transparent;
  }
  svg {
    position: absolute;
    left: -25px;
    width: 12px;
    height: 12px;
  }
</style>
