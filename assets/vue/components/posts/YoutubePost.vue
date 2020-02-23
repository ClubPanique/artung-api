<template>
  <div class="youtubePosts">
    <!-- <div
      v-for="(post, id.videoId) of posts"
      :key="id.videoId"
    > -->
    <iframe
      width="560"
      height="315"
      :src="`https://www.youtube.com/embed/${posts[0].id.videoId}`"
      frameborder="0"
      allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
      allowfullscreen
    />
  </div>
  <!-- </div> -->
</template>

<script>

export default {
  name: 'YoutubePost',
  props: {
    posts: {
      type: Array,
      required: true
    }
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
