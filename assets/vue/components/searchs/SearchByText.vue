<template>
  <div>
    <p>Coucou</p>
    <input
      type="text"
      placeholder="Rechercher par nom"
      :value="value"
      @input="$emit('input', $event.target.value)"
    >
  </div>
</template>

<script>
export default {
  name: 'SearchByText',
  props: {
    value: {
      type: String,
      required: true,
    },
  },
  methods: {
    inputChanged() {
      // On émet un événement inputChanged et on envoie la valeur de l'input recherche.
      this.$emit('input', this.$event.target.value);
    },
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped></style>
