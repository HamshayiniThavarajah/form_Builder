<template>
  <div class="p-6 max-w-3xl mx-auto">
    <h1 class="text-2xl font-bold mb-4">Form Builder</h1>

    <!-- Form Title -->
    <input v-model="form.title" type="text" placeholder="Enter form title"
      class="border p-2 w-full mb-4" />

    <!-- Fields List -->
    <div v-for="(field, index) in form.fields" :key="index" class="mb-3 border p-3 rounded">
      <label class="block font-semibold mb-2">Field {{ index + 1 }}</label>
      <input v-model="field.label" type="text" placeholder="Label"
        class="border p-2 w-full mb-2" />

      <select v-model="field.type" class="border p-2 w-full mb-2">
        <option value="text">Text</option>
        <option value="textarea">Textarea</option>
        <option value="checkbox">Checkbox</option>
        <option value="radio">Radio</option>
      </select>

      <!-- Options for Checkbox/Radio -->
      <div v-if="field.type === 'checkbox' || field.type === 'radio'" class="mb-2">
        <input v-model="field.options" type="text" placeholder="Comma separated options"
          class="border p-2 w-full" />
      </div>

      <button @click="removeField(index)" class="bg-red-500 text-white px-2 py-1 rounded">Remove</button>
    </div>

    <!-- Add Field Button -->
    <button @click="addField" class="bg-blue-500 text-white px-4 py-2 rounded">Add Field</button>

    <!-- Save Button -->
    <button @click="saveForm" class="bg-green-500 text-white px-4 py-2 rounded ml-3">Save Form</button>

    <!-- Preview -->
    <h2 class="text-xl font-bold mt-6">Preview</h2>
    <div class="border p-4 rounded">
      <h3 class="font-semibold mb-3">{{ form.title }}</h3>
      <div v-for="(field, index) in form.fields" :key="index" class="mb-3">
        <label class="block mb-1">{{ field.label }}</label>
        <input v-if="field.type === 'text'" type="text" class="border p-2 w-full" />
        <textarea v-if="field.type === 'textarea'" class="border p-2 w-full"></textarea>
        <div v-if="field.type === 'checkbox'">
          <label v-for="(opt, i) in splitOptions(field.options)" :key="i" class="block">
            <input type="checkbox" /> {{ opt }}
          </label>
        </div>
        <div v-if="field.type === 'radio'">
          <label v-for="(opt, i) in splitOptions(field.options)" :key="i" class="block">
            <input type="radio" :name="'radio-' + index" /> {{ opt }}
          </label>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: {
        title: '',
        fields: []
      }
    }
  },
  methods: {
    addField() {
      this.form.fields.push({ label: '', type: 'text', options: '' });
    },
    removeField(index) {
      this.form.fields.splice(index, 1);
    },
    saveForm() {
      alert('Form saved! (you can connect API later)');
    },
    splitOptions(options) {
      return options ? options.split(',').map(o => o.trim()) : [];
    }
  }
}
</script>

<style>
body { font-family: Arial, sans-serif; }
</style>
