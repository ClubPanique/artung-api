<template>
  <div>
    <SearchBySelect />
    <SearchByText />
  </div>
</template>

<script>
import SearchBySelect from './SearchBySelect'
import SearchByText from './SearchByText'

export default {
  name: 'SearchBar',
  components: {
    SearchBySelect,
    SearchByText,
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
