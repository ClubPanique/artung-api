<template>
  <div class="fond">
    <FormGroupInline
      icon-status="youtube"
    />
    <FormGroup
      type-status="text"
      contenu="test"
      text="blabla"
    />
    <Checkbox />
    <TextButton
      secondary
      form
    />
    <EditIcon />
    <LoginButton />
    <AccountButton />
  </div>
</template>

<script>
import TextButton from "../../components/buttons/TextButton";
import Checkbox from "../../components/forms/Checkbox";
import FormGroup from "../../components/forms/FormGroup";
import FormGroupInline from "../../components/forms/FormGroupInline";
import EditIcon from "../../components/buttons/EditIcon";
import LoginButton from "../../components/buttons/LoginButton"
import AccountButton from "../../components/buttons/AccountButton"

export default {
  name: "Steve",
  components: {
    FormGroup,
    Checkbox,
    TextButton,
    FormGroupInline,
    EditIcon,
    LoginButton,
    AccountButton
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
