<template>
  <div>
    <div>
      <label for="contenu">{{ text }}</label>
    </div>
    <input
      id="contenu"
      placeholder="Champ requis"
    >
  </div>
</template>
  <!-- Types : text, password, email -->

<script>
export default {
  name: "FormGroup",
  props: {
    text: {
      type: String,
      required: true
    },
    typeStatus: {
      type: String,
      required: true
    } 
  },
  mounted() {
    this.typeChange();
  },
  methods: {
    typeChange: function() {
      if (this.typeStatus == "email") {
        this.$el.querySelector("input").setAttribute("type", "email");
      } else if (this.typeStatus == "password") {
        this.$el.querySelector("input").setAttribute("type", "password");
      } else {
        this.$el.querySelector("input").setAttribute("type", "text");
      }
    }
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
</style>