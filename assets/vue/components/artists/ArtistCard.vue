<template>
  <div
    :id="`artist-${ artist.id }`"
    class="artistCard"
  >
    <ArtistThumbnail :artist="artistProp" />
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
  props: {
    artist: {
      type: Object,
      required: true
    }
  },
  computed: {
    artistProp() {
      return this.artist
    }
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  .artistCard {
    position: relative;
    width: 360px;
    height: 60px;
    margin: 5px;
    background-color: #403F4C;
    border: #403F4C solid 2px;
    border-radius: 0 5px 5px 5px;
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
