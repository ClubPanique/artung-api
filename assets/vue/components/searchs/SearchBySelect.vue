<template>
  <div>
    <select
      :value="value"
      @input="$emit('input', $event.target.value)"
    >
      <option
        v-for="(option, index) in options"
        :key="index"
        :value="option"
      >
        {{ option }}
      </option>
    </select>
  </div>
</template>

<script>
export default {
  name: 'SearchBySelect',
  props: {
    value: {
      type: String,
      required: true,
    },
  },
  data() {
    return {
      options: [
        'Architecture',
        'Sculpture',
        'Arts visuels',
        'Musique',
        'Littérature',
        'Arts de la scène',
        'Cinéma',
      ],
    };
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped></style>
