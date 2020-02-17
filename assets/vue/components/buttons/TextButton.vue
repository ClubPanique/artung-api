<template>
  <div>
    <button
      variant="outline-primary"
      class="btn btn-outline-primary"
      :class="{ secondary: secondary }"
    >
      {{ text }}
    </button>
  </div>
</template>

<script>
export default {
  name: "TextButton",
  props: {
    text: {
      type: String,
      required: true
    },
    secondary: Boolean,
    form: Boolean
  },
  data() {
    return {
      testVariable: "test"
    };
  },
  computed: {
  },

  watch: {
  },
  mounted() {
    // this.isSecondary();
    this.checkForm();
  },
  methods: {
    // isSecondary: function() {
    //   if (this.secondary) {
    //     this.$el.querySelector("button").style.color = "#131b23";
    //     this.$el.querySelector("button").style.background = "#db5c3d";
    //     this.$el.querySelector("button").style.borderColor = "#db5c3d";
    //   } else {
    //     this.$el.querySelector("button").style.color = "#db5c3d";
    //     this.$el.querySelector("button").style.background = "#131b23";
    //     this.$el.querySelector("button").style.borderColor = "#db5c3d";
    //   }
    // },
    checkForm: function() {
      if (this.form) {
        this.$el.querySelector("button").setAttribute("type", "submit");
      } else {
        this.$el.querySelector("button").setAttribute("type", "button");
      }
    }
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
</style>