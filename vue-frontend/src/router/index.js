import { createRouter, createWebHistory } from 'vue-router';
import Dashboard from '../components/Dashboard.vue';
import CreateForm from '../components/CreateForm.vue';
import EventForm from '../components/EventForm.vue';
import FormSubmissions from '../components/SubmissionForm.vue'; // PascalCase matches file

const routes = [
  { path: '/', redirect: '/dashboard' },
  { path: '/dashboard', component: Dashboard },
  { path: '/create-form', component: CreateForm },
  { path: '/event-form', component: EventForm },
  { path: '/submissions', component: FormSubmissions },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
