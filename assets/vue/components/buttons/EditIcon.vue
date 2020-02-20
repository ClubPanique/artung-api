<template>
  <div>
    <button type="submit" class="btn btn-default btn-circle btn-lg">
      <span class="checked">
        <font-awesome-icon :icon="'check'" />
      </span>
    </button>
  </div>
</template>

<script>
export default {
  name: "EditIcon"
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.btn-circle.btn-lg {
  width: 2em;
  height: 2em;
  padding: 10px 16px;
  font-size: 18px;
  line-height: 0;
  border-radius: 1em;
  border: 2px solid #f3eff5;
}

.checked {
  opacity: 0;
}

.checked:checked,
.checked:hover {
  opacity: 1;
  color: #f3eff5;
  position: relative;
  right: 13px;
  bottom: 6px;
  font-size: 150%;
}
</style>
