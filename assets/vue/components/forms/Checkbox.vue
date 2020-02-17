<template>
  <div class="form-check">
    <label class="checkbox-button">
      <input
        id="choice1-1"
        type="checkbox"
        class="checkbox-button__input"
        name="choice1"
      >
      <span class="checkbox-button__control" />
      <span class="checkbox-button__label">{{ text }}</span>
    </label>
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
  .checkbox-button {
  cursor: pointer;
}

input[type=checkbox] {
    box-sizing: border-box;
    padding: 0;
}

input {
    font-size: 1rem;
    line-height: 1.5;
    padding: 11px 23px;
    border: 1px solid rgba(0,0,0,.15);
    border-radius: 0;
    outline: 0;
    background-color: transparent;
}

.checkbox-button__input {
    opacity: 0;
    position: absolute;
}

.checkbox-button__control {
    position: relative;
    display: inline-block;
    width: 20px;
    height: 20px;
    margin-right: 12px;
    vertical-align: middle;
    background-color: inherit;
    color: #131b23;
    border: 2px solid #f3eff5;
}

.checkbox-button__input:checked+.checkbox-button__control:after {
    content: "";
    display: block;
    position: absolute;
    top: 1px;
    left: 1px;
    width: 14px;
    height: 14px;
    background-color: rgb(219, 92, 61);
}

.checkbox-button__input:checked+.checkbox-button__control {
    border-color: #f3eff5;
}

.checkbox-button__control {
  transform: scale(0.75);
}
</style>