<template>
  <div class="listPosts">
    <div
      v-for="(post, generateId) of listPostsArray"
      :key="generateId"
    >
      <div
        v-if="post.typePost=='youtube'"
        class="youtubePost"
      >
        <iframe
          width="560"
          height="315"
          :src="`https://www.youtube.com/embed/${post.id.videoId}`"
          frameborder="0"
          allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
          allowfullscreen
        />
      </div>
      <div
        v-if="post.typePost=='wordpress'"
        class="wordpressPost"
      >
        <h3>{{ post.title.rendered }}</h3>
        <!-- eslint-disable-next-line vue/no-v-html -->
        <p v-html="post.content.rendered" />
      </div>
    </div>
    <p v-show="listPostsArray.length == 0">
      Cet artiste n'a pas d'actualités.
    </p>
  </div>
</template>

<script>
export default {
  name: 'ListPosts',
  props: {
    artist: {
      type: Object,
      required: true
    }
  },
  data() {
    return {
      wordpressResults: null,
      youtubeResults: null,
      listPostsArray: []
    }
  },
  computed: {
    urlWordpress() {
      return `${this.artist.wordpressLink}wp-json/wp/v2/posts`;
    },
    urlYoutube() {
      return `https://www.googleapis.com/youtube/v3/search?part=snippet&channelId=${this.artist.youtubeLink}&order=date&type=video&videoEmbeddable=true&videoSyndicated=true&key=${window.youtubeApi}`;
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
        this.pushWordpressPosts();
      } catch (err) {
        console.log(err);
      }
    },
    async getInfosYoutube() {
      try {
        const response = await fetch(this.urlYoutube);
        const ytResult = await response.json();
        this.youtubeResults = ytResult.items;
        this.pushYoutubePosts();
      } catch (err) {
        console.log(err);
      }
    },
    pushYoutubePosts() {
      let i=0;
      this.youtubeResults.forEach(element => {
        element.generateId=i;
        element.typePost="youtube";
        element.date=element.snippet.publishedAt;
        this.listPostsArray.push(element);
        i++;
      });
    },
    pushWordpressPosts() {
      this.wordpressResults.forEach(element => {
        element.generateId=element.id;
        element.typePost="wordpress";
        this.listPostsArray.push(element);
      })
    }
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
