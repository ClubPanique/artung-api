<template>
  <div>
    <div>
      <label for="contenu">{{ text }}</label>
    </div>
    <span v-switch="icon">
      <span v-case="'facebook'">
        <font-awesome-icon :icon="['fab', 'facebook']" />
      </span>
      <span v-case="'twitter'">
        <font-awesome-icon :icon="['fab', 'twitter']" />
      </span>
      <span v-case="'youtube'">
        <font-awesome-icon :icon="['fab', 'youtube']" />
      </span>
      <span v-case="'wordpress'">
        <font-awesome-icon :icon="['fab', 'wordpress']" />
      </span>
      <span v-default>rien</span>
    </span>
    &nbsp;
    <input id="contenu">
  </div>
</template>

<script>
import { vSwitch, vCase, vDefault } from "v-switch-case";

export default {
  name: "FormGroupInline",
  directives: {
    switch: vSwitch,
    case: vCase,
    default: vDefault
  },
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
