<template>
  <div class="app-container">
    <!-- Sidebar -->
    <div class="sidebar">
      <div class="sidebar-header">
        <h1>Form Builder</h1>
      </div>

      <div class="nav-section">
        <h2>Manage your forms</h2>
        <div class="nav-item" :class="{ active: activeNav === 'dashboard' }">
          <router-link to="/dashboard">Dashboard</router-link>
        </div>
        <div class="nav-item" :class="{ active: activeNav === 'create-form' }">
          <router-link to="/create-form">Create Form</router-link>
        </div>
        <div class="nav-item" :class="{ active: activeNav === 'event-form' }">
          <router-link to="/event-form">Event Form</router-link>
        </div>
        <div class="nav-item" :class="{ active: activeNav === 'submissions' }">
          <router-link to="/submissions">Submissions</router-link>
        </div>
      </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
      <div class="form-card">
        <h1 class="form-title">Create Form</h1>
        <p class="form-subtitle">Manage your form fields</p>

        <!-- Form Title -->
        <div class="form-group">
          <label>Form Title</label>
          <input type="text" v-model="formTitle" placeholder="Enter form title" />
        </div>
        <!-- Add Fields Section -->
        <h2 class="section-heading">Add Fields</h2>
        <div class="add-fields">
          <button class="field-btn" @click="addField('text')">+ Text Input</button>
          <button class="field-btn" @click="addField('textarea')">+ Text Area</button>
          <button class="field-btn" @click="addField('radio')">+ Radio Button</button>
          <button class="field-btn" @click="addField('checkbox')">+ Checkbox</button>
        </div>

        <!-- Form Fields Section -->
        <h2 class="section-heading">Form Fields</h2>
        <div class="form-fields">
          <div
            v-for="(field, index) in formFields"
            :key="field.id"
            class="form-field-card"
          >
            <div class="field-type-heading">{{ getFieldTypeName(field.type) }}</div>

            <label>Label</label>
            <input type="text" v-model="field.label" placeholder="Enter label" />

            <div v-if="field.type === 'text' || field.type === 'textarea'">
              <label>Placeholder</label>
              <input type="text" v-model="field.placeholder" placeholder="Placeholder text" />
            </div>

            <div v-if="field.type === 'radio' || field.type === 'checkbox'">
              <label>Options</label>
              <div v-for="(option, optIndex) in field.options" :key="optIndex" class="option-item">
                <input type="text" v-model="field.options[optIndex]" placeholder="Option text" />
              </div>
            </div>

            <div class="checkbox-container">
              <input type="checkbox" :id="'required-' + field.id" v-model="field.required" />
              <label :for="'required-' + field.id">Required field</label>
            </div>
          </div>
        </div>

        <!-- Submit Button -->
        <button class="submit-btn">Submit Form</button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";

const activeNav = ref("create-form");
const formTitle = ref("");

const formFields = ref([
  {
    id: 1,
    type: "text",
    label: "",
    placeholder: "",
    required: false,
    options: []
  },
  {
    id: 2,
    type: "textarea",
    label: "",
    placeholder: "",
    required: false,
    options: []
  },
  {
    id: 3,
    type: "radio",
    label: "",
    placeholder: "",
    required: false,
    options: ["Option 1", "Option 2"]
  },
  {
    id: 4,
    type: "checkbox",
    label: "",
    placeholder: "",
    required: false,
    options: ["Option 1", "Option 2"]
  }
]);

const getFieldTypeName = (type) => {
  const typeNames = {
    text: "Text Input",
    textarea: "Text Area",
    radio: "Radio Button",
    checkbox: "Checkbox",
  };
  return typeNames[type] || type;
};
</script>

<style scoped>
.app-container {
  display: flex;
  min-height: 100vh;
  background-color: #f5f7f9;
}

/* Sidebar */
.sidebar {
  width: 250px;
  background-color: #2c3e50;
  color: #ecf0f1;
  padding: 20px 0;
  position: fixed;
  height: 100vh;
  overflow-y: auto;
}

.sidebar-header h1 {
  font-size: 22px;
  font-weight: 600;
  padding: 0 20px 20px;
}

.nav-section {
  margin-top: 20px;
}

.nav-item {
  padding: 12px 20px;
  display: flex;
  align-items: center;
  transition: all 0.3s;
}

.nav-item.active,
.nav-item:hover {
  background-color: #3498db;
}

.nav-item a {
  color: #fff;
  text-decoration: none;
  width: 100%;
}

/* Main Content */
.main-content {
  margin-left: 250px;
  padding: 30px;
  flex: 1;
}

.form-card {
  background-color: #fff;
  padding: 30px 25px;
  border-radius: 12px;
  box-shadow: 0 6px 20px rgba(0,0,0,0.08);
  max-width: 700px;
  margin: 0 auto;
}

.form-title {
  font-size: 28px;
  font-weight: 600;
  color: #2c3e50;
  text-align: center;
}

.form-subtitle {
  font-size: 14px;
  color: #7f8c8d;
  text-align: center;
  margin-bottom: 20px;
}

.form-group label {
  font-weight: 500;
  margin-bottom: 8px;
  display: block;
}

.form-group input {
  width: 100%;
  padding: 10px 12px;
  border-radius: 6px;
  border: 1px solid #ccc;
  margin-bottom: 20px;
}

.section-heading {
  font-weight: 600;
  margin-bottom: 15px;
  color: #2c3e50;
  font-size: 18px;
}
/* Add Fields Buttons Grid */
.add-fields {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 12px;
  margin-bottom: 25px;
}

.field-btn {
  background-color: #fff;
  border: 1px solid #3498db;
  color: #3498db;
  font-weight: 600;
  padding: 12px;
  border-radius: 8px;
  cursor: pointer;
  text-align: center;
  transition: all 0.3s;
}

.field-btn:hover {
  background-color: #3498db;
  color: #fff;
}

.form-fields {}

.form-field-card {
  background: #f8f8f8;
  border-radius: 8px;
  padding: 15px;
  margin-bottom: 15px;
}

.field-type-heading {
  font-weight: 700;
  color: #7f8c8d;
  margin-bottom: 8px;
}

.form-field-card input[type="text"] {
  width: 100%;
  padding: 10px;
  border-radius: 6px;
  border: 1px solid #ccc;
  margin-bottom: 10px;
}

.option-item {
  display: flex;
  align-items: center;
  gap: 10px;
  margin-bottom: 5px;
}

.checkbox-container {
  margin-top: 8px;
  display: flex;
  align-items: center;
  gap: 8px;
}

/* Submit Button */
.submit-btn {
  width: 100%;
  background-color: #3498db;
  color: #fff;
  padding: 12px;
  font-weight: 600;
  border: none;
  border-radius: 8px;
  cursor: pointer;
  margin-top: 20px;
}

.submit-btn:hover {
  background-color: #2980b9;
}
</style>
