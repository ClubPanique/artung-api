<template>
  <div>
    <div>
      <!-- <font-awesome-icon :icon="['fab', 'twitter']" />
    <font-awesome-icon :icon="['fab', 'youtube']" />
      <font-awesome-icon :icon="['fab', 'wordpress']" />-->
      <label for="contenu">{{ text }}</label>
    </div>
    <span v-if="icon=='facebook'">
      <font-awesome-icon :icon="['fab', 'facebook']" />
    </span>
    <span v-else-if="icon=='twitter'">
      <font-awesome-icon :icon="['fab', 'twitter']" />
    </span>
    <span v-else-if="icon=='youtube'">
      <font-awesome-icon :icon="['fab', 'youtube']" />
    </span>
    <span v-else-if="icon=='wordpress'">
      <font-awesome-icon :icon="['fab', 'wordpress']" />
    </span>
    <span v-else>rien</span>&nbsp;
    <input id="contenu">
  </div>
</template>

<script>
export default {
  name: "FormGroupInline",
  props: {
    text: {
      type: String,
      required: true
    },
    iconStatus: {
      type: String,
      required: true
    }
  },
  mounted() {
    this.iconChange();
  },
  methods: {
    iconChange: function() {
      if (this.iconStatus == "facebook") {
        this.icon = "facebook";
      } else if (this.iconStatus == "twitter") {
        this.icon = "twitter";
      } else if (this.iconStatus == "youtube") {
        this.icon = "youtube";
      } else if (this.iconStatus == "wordpress") {
        this.icon = "wordpress";
      } else {
        // icon vide ou ?
      }
      this.$forceUpdate();
    }
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
</style>
