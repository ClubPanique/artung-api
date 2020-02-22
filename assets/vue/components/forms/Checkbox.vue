<template>
  <div class="custom-control custom-checkbox">
    <input
      id="customCheck"
      type="checkbox"
      class="custom-control-input"
      name="example1"
    >
    <label
      class="custom-control-label"
      for="customCheck"
    >{{ text }}</label>
  </div>
</template>


<script>
export default {
  name: "Checkbox",
  props: {
    text: {
      type: String,
      required: true
    }
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
</style>