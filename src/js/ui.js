import { init as navigation } from "./navigation.js";
import { init as contactform } from "./form.js";

navigation();
// formValidityState is rendered by form.php
// eslint-disable-next-line
contactform(formValidityState);
