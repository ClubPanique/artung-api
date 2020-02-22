<template>
  <div class="listPosts">
    <FacebookPost />
    <TwitterPost />
    <YoutubePost :posts="youtubeResults" />
    <WordpressPost :posts="wordpressResults" />
  </div>
</template>

<script>
import FacebookPost from './FacebookPost'
import TwitterPost from './TwitterPost'
import YoutubePost from './YoutubePost'
import WordpressPost from './WordpressPost'

export default {
  name: 'ListPosts',
  components: {
    FacebookPost,
    TwitterPost,
    YoutubePost,
    WordpressPost,
  },
  props: {
    artist: {
      type: Object,
      required: true
    }
  },
  data() {
    return {
      wordpressResults: null,
      youtubeResults: null
    }
  },
  computed: {
    urlWordpress() {
      return `${this.artist.wordpressLink}wp-json/wp/v2/posts`;
    },
    urlYoutube() {
      return `https://www.googleapis.com/youtube/v3/search?part=snippet&channelId=${this.artist.youtubeLink}&order=date&type=video&videoEmbeddable=true&videoSyndicated=true&key=AIzaSyDBifHZVuZDCRkX0o97MGznVQv_sNNBmio`;
    }
  },
  created() {
    this.getInfosWordpress();
    this.getInfosYoutube();
  },
  methods: {
    async getInfosWordpress() {
      try {
        const response = await fetch(this.urlWordpress);
        const wpResult = await response.json();
        this.wordpressResults = wpResult;
      } catch (err) {
        console.log(err);
      }
    },
    async getInfosYoutube() {
      try {
        const response = await fetch(this.urlYoutube);
        const ytResult = await response.json();
        this.youtubeResults = ytResult.items;
      } catch (err) {
        console.log(err);
      }
    }
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
