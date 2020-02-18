<template>
  <div class="artistCard">
    <ArtistThumbnail />
    <span class="artistNickname">{{ artist.nickname }}</span>
    <span class="starIcon"><font-awesome-icon icon="star" /></span>
  </div>
</template>

<script>
import ArtistThumbnail from './ArtistThumbnail'

export default {
  name: 'ArtistCard',
  components: {
    ArtistThumbnail,
  },
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
  .artistCard {
    width: 360px;
    height: 60px;
    background-color: #403F4C;
    border: #403F4C solid 2px;
    border-radius: 5px;
    display: flex;
    flex-wrap: nowrap;
    align-items: center;
  }
  .artistNickname {
    color: #F3EFF5;
    margin-left: 2px;
  }
  .starIcon {
    color: #DB5C4D;
    margin-left: auto;
  }
</style>
