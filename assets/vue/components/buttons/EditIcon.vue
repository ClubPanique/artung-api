<template>
  <div>
    <button
      type="submit"
      @click="isEdit = !isEdit"
    >
      <!-- Affichage du bouton edit -->
      <span v-show="isEdit">
        <span class="edit">
          <font-awesome-icon :icon="['fa', 'edit']" />
        </span>
      </span>
      <!-- Affichage du bouton check -->
      <span v-show="!isEdit">
        <span class="check">
          <font-awesome-icon :icon="['fa', 'check-square']" />
        </span>
      </span>
    </button>
  </div>
</template>

<script>
export default {
  name: "EditIcon",
  props: {
    isEdit: Boolean
  },
  methods: {}
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.edit {
  background: transparent;
  border: none !important;
  color: #f3eff5;
  font-size: 1.8em;
}
.check {
  background: transparent;
  border: none !important;
  color: #f3eff5;
  font-size: 1.8em;
}

button {
  background: transparent;
  border: none !important;
}
</style>
