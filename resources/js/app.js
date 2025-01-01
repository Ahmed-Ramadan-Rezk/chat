import "./bootstrap";

import Alpine from "alpinejs";
import { createApp } from "vue";
import ChatComponent from "./components/ChatComponent.vue";

window.Alpine = Alpine;

Alpine.start();
const app = createApp({});

app.component("ChatComponent", ChatComponent);

app.mount("#app");
