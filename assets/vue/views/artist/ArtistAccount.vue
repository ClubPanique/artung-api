<template>
  <div>
    <Header />
    <FormGroup />
    <EditIcon />
    <FormGroupInline />
    <FormAccount />
    <TextButton />
  </div>
</template>

<script>
import Header from '../../components/navs/Header'
import FormGroup from '../../components/forms/FormGroup'
import EditIcon from '../../components/buttons/EditIcon'
import FormGroupInline from '../../components/forms/FormGroupInline'
import FormAccount from '../../components/forms/FormAccount'
import TextButton from '../../components/buttons/TextButton'

export default {
  name: 'ArtistAccount',
  components: {
    Header,
    FormGroup,
    EditIcon,
    FormGroupInline,
    FormAccount,
    TextButton,
  }
};
</script>

<style lang="scss">

</style>
