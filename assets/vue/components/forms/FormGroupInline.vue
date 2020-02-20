<template>
  <div>
    <div>
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
      switch (this.iconStatus) {
      case "facebook":
        this.icon = "facebook";
        break;
      case "twitter":
        this.icon = "twitter";
        break;
      case "youtube":
        this.icon = "youtube";
        break;
      case "wordpress":
        this.icon = "wordpress";
        break;
      default:
        this.icon = "";
      }
      this.$forceUpdate();
    }
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
svg {
  color: white;
  font-size: 150%;
}
</style>
