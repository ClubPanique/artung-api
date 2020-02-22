<template>
  <div
    :id="`artist-${ artist.id }`"
    class="artistCard"
    @click="$router.push({ name: 'ArtistDetails', params: { id: artist.id }})"
  >
    <ArtistThumbnail :artist="artistProp" />
    <span class="artistNickname">{{ artist.nickname }}</span>
    <button class="starIcon">
      <font-awesome-icon icon="star" />
    </button>
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
    width: 100%;
    height: 60px;
    margin-bottom: 5px;
    background-color: var(--dark);
    border: var(--dark) solid 2px;
    border-radius: 0 5px 5px 5px;
    display: flex;
    flex-wrap: nowrap;
    align-items: center;
    cursor: pointer;
  }
  .artistNickname {
    color: var(--light);
    margin-left: 5px;
  }
  .starIcon {
    background-color: transparent;
    color: var(--primary);
    border: 0;
    margin-left: auto;
    margin-bottom: auto;
  }
  @media (min-width: 768px) {
    .artistCard {
      width: 50%;
      margin-right: 5px;
    }
  }
</style>
