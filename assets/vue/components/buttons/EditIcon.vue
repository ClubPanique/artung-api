<template>
  <div>
    <button
      type="submit"
      class="edit"
    >
      <font-awesome-icon :icon="['fa', 'edit']" />
    </button>

    <button
      type="submit"
      class="btn btn-default btn-circle btn-lg"
    >
      <span class="check">
        <font-awesome-icon :icon="'check'" />
      </span>
    </button>
  </div>
</template>

<!-- Icone d'édition si non check : .fa-pencil-square-o -->

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

.check {
  color: #f3eff5;
  position: relative;
  right: 13px;
  bottom: 6px;
  font-size: 150%;
}

.edit {
  background: transparent;
  border: none !important;
  color: #f3eff5;
  font-size: 1.8em;
}
</style>
