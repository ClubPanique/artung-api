<template>
  <div>
    <button
      type="button"
      class="btn btn-default btn-circle btn-lg"
    >
      <i class="glyphicon glyphicon-ok" />
    </button>
  </div>
</template>

<script>
export default {
  name: "EditIcon"
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

.btn-circle.btn-lg {
  width: 2em;
  height: 2em;
  padding: 10px 16px;
  font-size: 18px;
  line-height: 1.33;
  border-radius: 1em;
  border: 2px solid #f3eff5;
}

.btn-circle.btn-lg:checked {
  width: 50px;
  height: 50px;
  padding: 10px 16px;
  font-size: 18px;
  line-height: 1.33;
  border-radius: 25px;
  border: 2px solid #f3eff5;
}

.glyphicon-ok {
  color: #f3eff5;

}


</style>
