import { createApp } from "vue";
import App from "./App.vue";
import routes from "./routes";


import './bootstrap';
import '../css/app.scss';

// Importa Bootstrap JS completo
import 'bootstrap';



createApp(App).use(routes).mount("#app");
