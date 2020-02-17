<template>
  <div>
    <FavBar />
    <TextButton />
    <AccountButton />
    <LoginButton />
  </div>
</template>

<script>
import AccountButton from '../buttons/AccountButton'
import TextButton from '../buttons/TextButton'
import LoginButton from '../buttons/LoginButton'
import FavBar from '../navs/FavBar'

export default {
  name: 'Header',
  components: {
    AccountButton,
    TextButton,
    LoginButton,
    FavBar,
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
