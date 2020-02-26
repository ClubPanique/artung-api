<template>
  <div>
    <button
      type="submit"
      @click="isEdit = !isEdit; editable();"
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
// import readonly from "../forms/FormGroup";

export default {
  name: "EditIcon",
  props: {
    isEdit: Boolean
  },
  mounted() {
    this.editable()
  },
  methods: {
    editable: function() {
      if (this.isEdit) {
        this.$emit("readonlyStatus", false);
        alert("EditIcon -> readonly=" + !this.isEdit);
        //   this.$el.querySelector("button").toggleAttribute("readonly");
        //   this.$el.querySelector("button").attr('readonly', true);
      } else {
        this.$emit("readonlyStatus", true);
        alert("EditIcon -> readonly=" + this.isEdit);
      }
    }
  }
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
