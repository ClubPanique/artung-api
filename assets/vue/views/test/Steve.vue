<template>
  <div class="fond">
    <FormGroupInline
      icon-status="twitter"
    />
    <FormGroup
      type-status="email"
      contenu="test"
    />
    <Checkbox />
    <TextButton
      secondary
      form
    />
    <EditIcon />
  </div>
</template>

<script>
import TextButton from "../../components/buttons/TextButton";
import Checkbox from "../../components/forms/Checkbox";
import FormGroup from "../../components/forms/FormGroup";
import FormGroupInline from "../../components/forms/FormGroupInline";
import EditIcon from "../../components/buttons/EditIcon";

export default {
  name: "Steve",
  components: {
    FormGroup,
    Checkbox,
    TextButton,
    FormGroupInline,
    EditIcon
  },
  data() {
    return {
      typeStatus: "text mais il s'en fout..."
    };
  }
};
</script>

<style scoped lang="scss">
.fond {
  background: #131b23;
}
</style>
