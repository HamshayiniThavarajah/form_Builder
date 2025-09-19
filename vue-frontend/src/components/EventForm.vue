<template>
  <div class="form-container">
    <div class="form-card">
      <h1 class="form-header">Create Form</h1>
      <p class="form-subheader">Fill out the details below</p>

      <!-- Participant Name -->
      <div class="form-group">
        <label>Participant Name</label>
        <input type="text" v-model="formData.name" placeholder="Enter participant name" />
      </div>

      <!-- Email -->
      <div class="form-group">
        <label>Email</label>
        <input type="email" v-model="formData.email" placeholder="Enter email" />
      </div>

      <!-- Event Type -->
      <div class="form-group">
        <label>Event Type</label>
        <select v-model="formData.eventType">
          <option disabled value="">Select Event Type</option>
          <option>Conference</option>
          <option>Workshop</option>
          <option>Webinar</option>
          <option>Other</option>
        </select>
      </div>

      <!-- Attendance Type -->
      <div class="form-group">
        <label>Attendance Type</label>
        <div class="radio-group">
          <label>
            <input type="radio" value="In-Person" v-model="formData.attendance" />
            In-Person
          </label>
          <label>
            <input type="radio" value="Virtual" v-model="formData.attendance" />
            Virtual
          </label>
        </div>
      </div>

      <!-- Dietary Restrictions -->
      <div class="form-group">
        <label>Dietary Restrictions</label>
        <div class="checkbox-group">
          <label>
            <input type="checkbox" value="Vegetarian" v-model="formData.dietary" />
            Vegetarian
          </label>
          <label>
            <input type="checkbox" value="Vegan" v-model="formData.dietary" />
            Vegan
          </label>
          <label>
            <input type="checkbox" value="Gluten-Free" v-model="formData.dietary" />
            Gluten-Free
          </label>
          <label>
            <input type="checkbox" value="None" v-model="formData.dietary" />
            None
          </label>
        </div>
      </div>

      <!-- Additional Notes -->
      <div class="form-group">
        <label>Notes</label>
        <textarea v-model="formData.notes" placeholder="Enter any notes" rows="4"></textarea>
      </div>

      <!-- Submit Button -->
      <button class="submit-btn" @click="submitForm">Submit Form</button>
    </div>
  </div>
</template>

<script setup>
import { reactive } from "vue";

const formData = reactive({
  name: "",
  email: "",
  eventType: "",
  attendance: "",
  dietary: [],
  notes: ""
});

const submitForm = () => {
  if (!formData.name || !formData.email || !formData.eventType || !formData.attendance) {
    alert("Please fill all required fields!");
    return;
  }
  console.log("Form Submitted:", formData);
  alert("Form Submitted Successfully!");
  // Reset form
  formData.name = "";
  formData.email = "";
  formData.eventType = "";
  formData.attendance = "";
  formData.dietary = [];
  formData.notes = "";
};
</script>

<style scoped>
/* Centered container */
.form-container {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  background-color: #f5f7f9;
  padding: 20px;
}

/* Card */
.form-card {
  background-color: #fff;
  padding: 30px 40px;
  border-radius: 10px;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
  width: 100%;
  max-width: 500px;
}

/* Header */
.form-header {
  font-size: 26px;
  font-weight: 600;
  margin-bottom: 5px;
  color: #2c3e50;
  text-align: center;
}

.form-subheader {
  text-align: center;
  font-size: 14px;
  color: #7f8c8d;
  margin-bottom: 25px;
}

/* Form Groups */
.form-group {
  display: flex;
  flex-direction: column;
  margin-bottom: 20px;
}

.form-group label {
  margin-bottom: 8px;
  font-weight: 500;
  color: #34495e;
}

/* Inputs */
.form-group input,
.form-group select,
.form-group textarea {
  padding: 10px 15px;
  border-radius: 6px;
  border: 1px solid #ccc;
  font-size: 14px;
  outline: none;
  transition: all 0.3s;
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
  border-color: #3498db;
  box-shadow: 0 0 5px rgba(52, 152, 219, 0.3);
}

/* Radio Buttons */
.radio-group {
  display: flex;
  gap: 20px;
}

.radio-group label {
  display: flex;
  align-items: center;
  gap: 6px;
  cursor: pointer;
  font-weight: 500;
}

/* Checkboxes */
.checkbox-group {
  display: flex;
  flex-wrap: wrap;
  gap: 15px;
}

.checkbox-group label {
  display: flex;
  align-items: center;
  gap: 6px;
  cursor: pointer;
  font-weight: 500;
}

/* Submit Button */
.submit-btn {
  background-color: #3498db;
  color: #fff;
  padding: 12px;
  font-size: 16px;
  font-weight: 600;
  border: none;
  border-radius: 6px;
  width: 100%;
  cursor: pointer;
  transition: all 0.3s;
}

.submit-btn:hover {
  background-color: #2980b9;
}

/* Responsive */
@media (max-width: 550px) {
  .form-card {
    padding: 25px 20px;
  }
}
</style>
