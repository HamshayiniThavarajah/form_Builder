<template>
  <div class="container">
    <!-- Header -->
    <div class="header">
      <h1>Form Submissions</h1>
      <p>Contact Form - {{ submissions.length }} submissions</p>
    </div>

    <!-- Left Section: Search + List -->
    <div>
      <div class="card">
        <div class="card-header">
          <h2>Search submissions...</h2>
        </div>
        <input
          type="text"
          class="search-box"
          placeholder="Search by name, email, etc."
          v-model="searchQuery"
        />
      </div>

      <div class="card">
        <div class="card-header">
          <h2>Submissions</h2>
        </div>

        <div
          class="submission-item"
          v-for="submission in filteredSubmissions"
          :key="submission.id"
          :class="{ selected: selectedSubmission && selectedSubmission.id === submission.id }"
          @click="selectSubmission(submission)"
        >
          <div class="submission-id">Submission #{{ submission.id }}</div>
          <div class="submission-field">
            <span class="field-name">Full Name:</span> {{ submission.fullName }}
          </div>
          <div class="submission-field">
            <span class="field-name">Email Address:</span> {{ submission.email }}
          </div>
          <div class="more-fields">+1 more fields</div>
        </div>
      </div>
    </div>

    <!-- Right Section: Details -->
    <div v-if="selectedSubmission">
      <div class="card">
        <div class="card-header">
          <h2>Submission Details</h2>
        </div>

        <div class="details-section">
          <div class="details-item">
            <div class="details-label">Submitted</div>
            <div class="details-value">{{ selectedSubmission.date }}</div>
          </div>
          <div class="details-item">
            <div class="details-label">IP Address</div>
            <div class="details-value">{{ selectedSubmission.ip }}</div>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          <h2>Form Data</h2>
        </div>

        <div class="form-data-item">
          <div class="form-data-label">Full Name</div>
          <div class="form-data-value">{{ selectedSubmission.fullName }}</div>
        </div>

        <div class="form-data-item">
          <div class="form-data-label">Email Address</div>
          <div class="form-data-value">{{ selectedSubmission.email }}</div>
        </div>

        <div class="form-data-item">
          <div class="form-data-label">Message</div>
          <div class="form-data-value">{{ selectedSubmission.message }}</div>
        </div>
      </div>
    </div>

    <!-- If nothing selected -->
    <div v-else>
      <div class="card">
        <div class="card-header">
          <h2>Submission Details</h2>
        </div>
        <p style="color: #7f8c8d; text-align: center; padding: 30px;">
          Select a submission to view details
        </p>
      </div>

      <div class="card">
        <div class="card-header">
          <h2>Form Data</h2>
        </div>
        <p style="color: #7f8c8d; text-align: center; padding: 30px;">
          No submission selected
        </p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "FormSubmissions",
  data() {
    return {
      searchQuery: "",
      selectedSubmission: null,
      submissions: [
        {
          id: 51,
          fullName: "Hamsi",
          email: "Hamsi@gmail.com",
          message: "I would like to know more about your services.",
          date: "1/27/2024, 8:00:00 PM",
          ip: "192.168.1.100",
        },
        {
          id: 42,
          fullName: "janani",
          email: "jeni@email.com",
          message: "I have a question.",
          date: "1/26/2024, 3:45:12 PM",
          ip: "192.168.1.101",
        },
        {
          id: 38,
          fullName: "Ron",
          email: "ron@email.com",
          message: "call me to discuss partnership opportunities.",
          date: "1/25/2024, 10:30:45 AM",
          ip: "192.168.1.102",
        },
      ],
    };
  },
  computed: {
    filteredSubmissions() {
      if (!this.searchQuery) {
        return this.submissions;
      }
      const query = this.searchQuery.toLowerCase();
      return this.submissions.filter(
        (sub) =>
          sub.fullName.toLowerCase().includes(query) ||
          sub.email.toLowerCase().includes(query) ||
          sub.message.toLowerCase().includes(query)
      );
    },
  },
  methods: {
    selectSubmission(submission) {
      this.selectedSubmission = submission;
    },
  },
  mounted() {
    if (this.submissions.length > 0) {
      this.selectedSubmission = this.submissions[0];
    }
  },
};
</script>

<style scoped>
/* same CSS as your HTML */
.container {
  max-width: 1200px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 20px;
}
.header {
  grid-column: 1 / -1;
  margin-bottom: 20px;
}
.header h1 {
  font-size: 24px;
  font-weight: 600;
  color: #2c3e50;
  margin-bottom: 5px;
}
.header p {
  color: #7f8c8d;
  font-size: 16px;
}
.card {
  background-color: white;
  border-radius: 8px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
  padding: 20px;
  margin-bottom: 20px;
}
.card-header {
  margin-bottom: 15px;
}
.card-header h2 {
  font-size: 18px;
  font-weight: 600;
  color: #2c3e50;
}
.card-header p {
  color: #7f8c8d;
  font-size: 14px;
}
.search-box {
  width: 100%;
  padding: 10px 15px;
  border: 1px solid #ddd;
  border-radius: 4px;
  font-size: 14px;
  margin-bottom: 15px;
}
.submission-item {
  padding: 15px;
  border: 1px solid #eee;
  border-radius: 4px;
  margin-bottom: 15px;
  cursor: pointer;
  transition: all 0.3s;
}
.submission-item:hover {
  border-color: #3498db;
  background-color: #f9f9f9;
}
.submission-item.selected {
  border-color: #3498db;
  background-color: #f0f7ff;
}
.submission-id {
  font-weight: 600;
  color: #2c3e50;
  margin-bottom: 8px;
}
.submission-field {
  margin-bottom: 5px;
  font-size: 14px;
}
.field-name {
  font-weight: 500;
}
.more-fields {
  color: #3498db;
  font-size: 14px;
  margin-top: 5px;
}
.details-section {
  margin-bottom: 20px;
}
.details-item {
  margin-bottom: 15px;
}
.details-label {
  font-weight: 500;
  color: #7f8c8d;
  margin-bottom: 5px;
  font-size: 14px;
}
.details-value {
  color: #2c3e50;
  font-size: 14px;
}
.form-data-item {
  margin-bottom: 20px;
}
.form-data-label {
  font-weight: 600;
  color: #2c3e50;
  margin-bottom: 8px;
}
.form-data-value {
  color: #2c3e50;
  font-size: 14px;
  line-height: 1.5;
}
hr {
  border: none;
  border-top: 1px solid #eee;
  margin: 20px 0;
}
@media (max-width: 900px) {
  .container {
    grid-template-columns: 1fr;
  }
}
</style>
