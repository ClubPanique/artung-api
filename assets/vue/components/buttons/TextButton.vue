<template>
  <div>
    <button
      type="button"
      class="btn btn-primary"
    >
      {{ text }}
    </button>
  </div>
</template>
<!-- Le classList.add("btn-secondary") ajoutera btn-secondary APRES btn-primary, Ã©crasant le CSS -->

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
  mounted() {
    // this.isSecondary();
    this.checkForm();
    this.addSecondaryClass();
  },
  methods: {
    checkForm: function() {
      if (this.form) {
        this.$el.querySelector("button").setAttribute("type", "submit");
      } else {
        this.$el.querySelector("button").setAttribute("type", "button");
      }
    },
    addSecondaryClass: function() {
      if (this.secondary) {
        this.$el.querySelector("button").classList.add("btn-secondary");        
      } else {
        this.$el.querySelector("button").classList.remove("btn-secondary");
        // alert("removed !")
      }
    },
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

.btn-primary {
  color: #db5c3d;
  background: #131b23;
  border-color: #db5c3d;
}

.btn-secondary {
  color: #131b23;
  background: #db5c3d;
  border-color: #db5c3d;
}
</style>