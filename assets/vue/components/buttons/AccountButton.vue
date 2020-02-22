<template>
  <a href="/fan/account">
    <div id="AccountButton">
      <img
        id="AccountButtonImg"
        :src="fan.photo"
        :alt="`photo de profil de ${ fan.nickname }`"
      >
    </div>
  </a>
</template>

<script>
export default {
  name: 'AccountButton',
  data() {
    return {
      fan: {
        nickname: "OSS117",
        photo: "https://image.flaticon.com/icons/svg/1177/1177568.svg",
      }
    }
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  #AccountButton{
    width: 54px;
    height: 54px;
    background-color: #131B23;
    display: flex;
    justify-content: center;
  }

  #AccountButtonImg{
    max-width: 54px;
    max-height: 54px;
  }
</style>
