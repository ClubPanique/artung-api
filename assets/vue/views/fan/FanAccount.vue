<template>
  <div>
    <Header />
    <FormGroup />
    <EditIcon />
    <FormAccount />
    <TextButton />
  </div>
</template>

<script>
import Header from '../../components/navs/Header'
import FormGroup from '../../components/forms/FormGroup'
import EditIcon from '../../components/buttons/EditIcon'
import FormAccount from '../../components/forms/FormAccount'
import TextButton from '../../components/buttons/TextButton'

export default {
  name: 'FanAccount',
  components: {
    Header,
    FormGroup,
    EditIcon,
    FormAccount,
    TextButton,
  }
};
</script>

<style lang="scss">

</style>
