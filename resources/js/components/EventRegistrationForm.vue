<template>
  <div class="form-container">
    <h2>Event Registration</h2>

    <form @submit.prevent="handleSubmit">
      <!-- Participant Name -->
      <div class="form-group">
        <label>Participant Name<span class="required">*</span></label>
        <input v-model="form.name" type="text" required />
      </div>

      <!-- Email -->
      <div class="form-group">
        <label>Email<span class="required">*</span></label>
        <input v-model="form.email" type="email" required />
      </div>

      <!-- Event Type -->
      <div class="form-group">
        <label>Event Type</label>
        <select v-model="form.eventType">
          <option disabled value="">Select an option</option>
          <option>Workshop</option>
          <option>Seminar</option>
          <option>Conference</option>
        </select>
      </div>

      <!-- Attendance Type -->
      <div class="form-group">
        <label>Attendance Type</label>
        <div>
          <label><input type="checkbox" value="In-person" v-model="form.attendance" /> In-person</label>
          <label><input type="checkbox" value="Virtual" v-model="form.attendance" /> Virtual</label>
        </div>
      </div>

      <!-- Dietary Restrictions -->
      <div class="form-group">
        <label>Dietary Restrictions</label>
        <div>
          <label><input type="checkbox" value="Vegetarian" v-model="form.dietary" /> Vegetarian</label>
          <label><input type="checkbox" value="Vegan" v-model="form.dietary" /> Vegan</label>
          <label><input type="checkbox" value="Gluten-free" v-model="form.dietary" /> Gluten-free</label>
          <label><input type="checkbox" value="None" v-model="form.dietary" /> None</label>
        </div>
      </div>

      <!-- Submit Button -->
      <button type="submit">Submit Form</button>
    </form>

    <div v-if="submitted" class="success-message">
      ✅ Form submitted successfully!
    </div>
  </div>
</template>

<script setup>
import { reactive, ref } from 'vue'

const form = reactive({
  name: '',
  email: '',
  eventType: '',
  attendance: [],
  dietary: []
})

const submitted = ref(false)

function handleSubmit() {
  // You can send this data to your Laravel backend via Axios or Fetch
  console.log('Form Data:', form)
  submitted.value = true
}
</script>

<style scoped>
.form-container {
  max-width: 600px;
  margin: auto;
  padding: 1rem;
  background: #f9f9f9;
  border-radius: 8px;
}
.form-group {
  margin-bottom: 1rem;
}
.required {
  color: red;
}
.success-message {
  margin-top: 1rem;
  color: green;
  font-weight: bold;
}
</style>