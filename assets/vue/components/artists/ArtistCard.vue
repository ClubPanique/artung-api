<template>
  <div
    :id="`artist-${ artist.id }`"
    class="artistCard"
  >
    <div
      class="artistInfos"
      @click.self="$router.push({ name: 'ArtistDetails', params: { id: artist.id, artist: artistProp }})"
    >
      <ArtistThumbnail :artist="artistProp" />
      <h2 class="artistNickname">
        {{ artist.nickname }}
      </h2>
      <button class="starIcon">
        <font-awesome-icon
          :icon="['far', 'star']"
          size="2x"
        />
      </button>
    </div>
    <div
      v-show="$route.name=='ArtistDetails'|$route.name=='ArtistPreview'"
      class="artistDescription"
    >
      <p>
        {{ artist.description }}
      </p>
    </div>
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
    min-height: 60px;
    max-height: 240px;
    margin: 0 5px 5px 5px;
    background-color: var(--dark);
    border-radius: 0 5px 5px 5px;
    cursor: pointer;
    transition: background-color 400ms;
  }
  .artistCard:hover {
    background-color: var(--light-transparent);
  }
  .artistInfos {
    position: relative;
    padding-top: 2px;
    display: flex;
    flex-wrap: nowrap;
    align-items: center;
  }

  .artistNickname {
    color: var(--light);
    margin-left: 5px;
    font-size: 1.5rem;
  }
  .starIcon {
    position: absolute;
    top: 2px;
    right: 2px;
    background-color: transparent;
    color: var(--primary);
    border: 0;
    padding: 0;
    margin-left: auto;
    margin-bottom: auto;
  }
  .artistDescription {
    padding: 2px;
  }
  @media (min-width: 768px) {
    .artistCard {
      width: 50%;
      margin-right: 0;
    }
  }
</style>
