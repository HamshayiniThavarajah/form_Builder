import './bootstrap';
import { createApp } from 'vue';

const app = createApp({});

// 👉 ExampleComponent-ஐ comment பண்ணுங்க அல்லது delete பண்ணுங்க
// import ExampleComponent from './components/ExampleComponent.vue';
// app.component('example-component', ExampleComponent);

// 👉 நம்ம FormBuilder-ஐ import பண்ணுங்க
import FormBuilder from './components/FormBuilder.vue';
app.component('form-builder', FormBuilder);

// Mount
app.mount('#app');
