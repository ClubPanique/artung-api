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
  data() {
    return {
      artist: {
        nickname: "Sébastien Velly",
        photo: "https://png.pngtree.com/png-clipart/20190614/original/pngtree-avatar-vector-icon-png-image_3725465.jpg",
        category: "musique"
      }
    }
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  img {
    width: 50px;
    height: 50px;
  }
  .categoryButton {
    cursor: pointer;
    position: absolute;
    top: 0;
    left: 0;
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
