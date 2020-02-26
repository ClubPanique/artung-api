<template>
  <div>
    <label :for="formGroup">{{ text }}</label>
    <input
      :id="formGroup"
      :value="infosArtistResults.nickname"
      :placeholder="placeholder"
      @readonlyStatus="readonlyStatus"
    >
  </div>
</template>
  <!-- Types : text, password, email -->


<script>
export default {
  name: "FormGroup",
  props: {
    text: {
      type: String,
      required: true
    },
    typeStatus: {
      type: String,
      required: true
    },
    formGroup: {
      type: String,
      required: true
    },
    placeholder: {
      type: String,
      required: true
    },
    readonlyStatus: Boolean
  },
  data() {
    return {
      infosArtistResults: null
    };
  },
  computed: {
    urlArtist() {
      return `${window.rootUrl}artists/1`;
    },
    isReadonly: function() {
      if (this.readonlyStatus) {
        return "readonly";
      } else {
        return "";
      }
    }
  },
  // methods: {
  //   typeChange: function() {
  //     if (this.typeStatus == "email") {
  //       this.$el.querySelector("input").setAttribute("type", "email");
  //     } else if (this.typeStatus == "password") {
  //       this.$el.querySelector("input").setAttribute("type", "password");
  //     } else {
  //       this.$el.querySelector("input").setAttribute("type", "text");
  //     }
  //   },
  created() {
    this.getInfosArtist();
  },
  mounted() {
    this.typeChange();
  },
  methods: {
    typeChange: function() {
      switch (this.typeStatus) {
      case "email":
        this.$el.querySelector("input").setAttribute("type", "email");
        break;
      case "password":
        this.$el.querySelector("input").setAttribute("type", "password");
        break;
      case "text":
        this.$el.querySelector("input").setAttribute("type", "text");
        break;
      default:
        this.$el.querySelector("input").setAttribute("type", "text");
      }
    },
    // isReadonly: function() {
    //   if (this.readonlyStatus) {
    //     this.$el.querySelector("input").attr("readonly", true);
    //     alert(
    //       "FormGroup : if lancé ! readonly ok -> readonly =" + this.readonly
    //     );
    //   } else {
    //     this.$el.querySelector("input").attr("readonly", false);
    //     alert("FormGroup : else lancé ! readonly ko -> readonly =" + readonly);
    //   }
    // },

    async getInfosArtist() {
      try {
        const response = await fetch(this.urlArtist);
        const result = await response.json();
        this.infosArtistResults = result;
      } catch (err) {
        console.log(err);
      }
    }
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
</style>