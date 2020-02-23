<template>
  <div>
    <a href="/Login">
      <div id="dot">
        <img
          src="../../assets/Arrow.svg"
          alt="right arrow"
        >
      </div>
    </a>
  </div>
</template>

<script>
export default {
  name: "LoginButton"
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
#dot {
  height: 36px;
  width: 36px;
  background-color: #131b23;
  border-radius: 50%;
  border: 2px solid #db5c4d;
}

#dot > img {
  margin-inline-start: 4px;
}
</style>
