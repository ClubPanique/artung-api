<template>
  <div>
    <label :for="contenu">{{ text }}</label>
    <input
      :id="contenu"
      :value="infosArtistResults.email"
      :placeholder="placeholder"
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
    contenu: {
      type: String,
      required: true
    },
    placeholder: {
      type: String,
      required: true
    }
  },
  data() {
    return {
      infosArtistResults: null
    };
  },
  computed: {
    urlArtist() {
      return `${window.rootUrl}fans/1`;
    }
  },
  created() {
    this.getInfosArtist();
  },
  mounted() {
    this.typeChange();
  },
  methods: {
    typeChange: function() {
      if (this.typeStatus == "email") {
        this.$el.querySelector("input").setAttribute("type", "email");
      } else if (this.typeStatus == "password") {
        this.$el.querySelector("input").setAttribute("type", "password");
      } else {
        this.$el.querySelector("input").setAttribute("type", "text");
      }
    },
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