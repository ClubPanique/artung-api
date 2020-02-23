<template>
  <div>
    <FormGroup />
    <Checkbox />
    <TextButton />
  </div>
</template>

<script>
import FormGroup from '../components/forms/FormGroup'
import Checkbox from '../components/forms/Checkbox'
import TextButton from '../components/buttons/TextButton'

export default {
  name: 'Login',
  components: {
    FormGroup,
    Checkbox,
    TextButton,
  }
};
</script>

<style lang="scss">

</style>
