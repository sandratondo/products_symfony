const { defineConfig } = require('cypress');

module.exports = defineConfig({
  e2e: {
    baseUrl: 'http://127.0.0.1:8080',
    specPattern: 'cypress/e2e/**/*.spec.js', // Define el patrón de archivos de prueba
  },
});
