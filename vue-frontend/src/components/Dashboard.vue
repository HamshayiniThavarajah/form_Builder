<template>
  <div id="app">
    <div class="app-container">
      <!-- Sidebar -->
      <div class="sidebar">
        <div class="sidebar-header">
          <h1>Form Builder</h1>
        </div>

        <div class="nav-section">
          <h2>Manage your forms</h2>

          <router-link
            to="/dashboard"
            class="nav-item"
            :class="{ active: activeNav === 'dashboard' }"
            @click.native="activeNav = 'dashboard'"
          >
            <i class="far fa-check-circle"></i> Dashboard
          </router-link>

          <router-link
            to="/create-form"
            class="nav-item"
            :class="{ active: activeNav === 'create-form' }"
            @click.native="activeNav = 'create-form'"
          >
            <i class="far fa-check-circle"></i> Form Builder
          </router-link>

          <router-link
            to="/submissions"
            class="nav-item"
            :class="{ active: activeNav === 'submissions' }"
            @click.native="activeNav = 'submissions'"
          >
            <i class="far fa-check-circle"></i> Submissions
          </router-link>

          <router-link
            to="/event-form"
            class="nav-item"
            :class="{ active: activeNav === 'event-form' }"
            @click.native="activeNav = 'event-form'"
          >
            <i class="far fa-check-circle"></i> Event Form
          </router-link>

          <router-link
            to="/preview"
            class="nav-item"
            :class="{ active: activeNav === 'preview' }"
            @click.native="activeNav = 'preview'"
          >
            <i class="far fa-check-circle"></i> Preview
          </router-link>

          <router-link
            to="/settings"
            class="nav-item"
            :class="{ active: activeNav === 'settings' }"
            @click.native="activeNav = 'settings'"
          >
            <i class="far fa-check-circle"></i> Settings
          </router-link>
        </div>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <div class="page-header">
          <h1>Forms</h1>
          <p>Manage your forms and view submissions</p>

          <!-- Create Form button navigates to /create-form -->
          <button class="create-btn" @click="goToCreateForm">+ Create Form</button>
        </div>

        <div class="form-list">
          <div class="form-item">
            <div class="form-title">Contact Form</div>
            <div class="form-actions">
              <button class="action-btn edit-btn">Edit</button>
              <button class="action-btn preview-btn">Preview</button>
              <span class="submission-count">24</span>
            </div>
          </div>

          <hr />

          <div class="form-item">
            <div class="form-title">Event Registration</div>
            <div class="form-actions">
              <button class="action-btn edit-btn">Edit</button>
              <button class="action-btn preview-btn">Preview</button>
              <span class="submission-count">156</span>
            </div>
          </div>

          <hr />

          <div class="form-item">
            <div class="form-title">Product Feedback</div>
            <div class="form-actions">
              <button class="action-btn edit-btn">Edit</button>
              <button class="action-btn preview-btn">Preview</button>
              <span class="submission-count">8</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Dashboard",
  data() {
    return {
      activeNav: "dashboard"
    };
  },
  methods: {
    goToCreateForm() {
      this.$router.push("/create-form"); // programmatic navigation
      this.activeNav = "create-form"; // highlight sidebar link
    }
  }
};
</script>

<style scoped>
/* Same styles as before */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

body {
  background-color: #f5f7f9;
  color: #333;
}

.app-container {
  display: flex;
  min-height: 100vh;
}

/* Sidebar Styles */
.sidebar {
  width: 250px;
  background-color: #2c3e50;
  color: #ecf0f1;
  padding: 20px 0;
  height: 100vh;
  position: fixed;
  overflow-y: auto;
}

.sidebar-header {
  padding: 0 20px 20px;
  border-bottom: 1px solid #34495e;
  margin-bottom: 20px;
}

.sidebar-header h1 {
  font-size: 22px;
  font-weight: 600;
}

.nav-section {
  margin-bottom: 25px;
}

.nav-section h2 {
  font-size: 14px;
  text-transform: uppercase;
  padding: 0 20px;
  margin-bottom: 15px;
  color: #7f8c8d;
  font-weight: 600;
}

.nav-item {
  padding: 12px 20px;
  display: flex;
  align-items: center;
  cursor: pointer;
  transition: all 0.3s;
  text-decoration: none;
  color: #ecf0f1;
}

.nav-item:hover {
  background-color: #34495e;
}

.nav-item.active {
  background-color: #3498db;
}

.nav-item i {
  margin-right: 10px;
  width: 20px;
  text-align: center;
}

.sub-item {
  padding-left: 50px;
  font-size: 14px;
  color: #bdc3c7;
}

/* Main Content Styles */
.main-content {
  flex: 1;
  margin-left: 250px;
  padding: 30px;
}

.page-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 30px;
}

.page-header h1 {
  font-size: 28px;
  font-weight: 600;
  color: #2c3e50;
}

.page-header p {
  color: #7f8c8d;
  font-size: 16px;
}

.create-btn {
  background-color: #3498db;
  color: white;
  border: none;
  padding: 10px 20px;
  font-size: 16px;
  border-radius: 6px;
  cursor: pointer;
  transition: all 0.3s;
}

.create-btn:hover {
  background-color: #2980b9;
}

/* Form List Styles */
.form-list {
  background-color: white;
  border-radius: 8px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
  overflow: hidden;
}

.form-item {
  padding: 20px;
  border-bottom: 1px solid #eee;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.form-item:last-child {
  border-bottom: none;
}

.form-title {
  font-size: 18px;
  font-weight: 600;
  color: #2c3e50;
}

.form-actions {
  display: flex;
  align-items: center;
}

.action-btn {
  padding: 8px 15px;
  border-radius: 4px;
  margin-left: 10px;
  cursor: pointer;
  font-size: 14px;
  transition: all 0.3s;
}

.edit-btn {
  background-color: #3498db;
  color: white;
  border: none;
}

.edit-btn:hover {
  background-color: #2980b9;
}

.preview-btn {
  background-color: #ecf0f1;
  color: #2c3e50;
  border: none;
}

.preview-btn:hover {
  background-color: #bdc3c7;
}

.submission-count {
  background-color: #f5f7f9;
  padding: 8px 15px;
  border-radius: 20px;
  font-size: 14px;
  color: #7f8c8d;
  margin-left: 15px;
}

hr {
  border: none;
  border-top: 1px solid #eee;
  margin: 20px 0;
}
</style>
