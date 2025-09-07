import { createApp } from "vue";
import App from "./App.vue";
import routes from "./router/routes.js";

import "./bootstrap";
import "../css/app.scss";

// Importa Bootstrap JS completo
import "bootstrap";

const app = createApp(App);

app.use(routes);
app.mount("#app");
