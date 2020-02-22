<template>
  <div class="wordpressPosts">
    <div
      v-for="(post, id) of posts"
      :key="id"
    >
      <h3>{{ post.title.rendered }}</h3>
      <!-- eslint-disable-next-line vue/no-v-html -->
      <p v-html="post.content.rendered" />
    </div>
  </div>
</template>

<script>
export default {
  name: 'WordpressPost',
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
