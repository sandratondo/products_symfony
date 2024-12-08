describe('Product Management', () => {

    // Prueba de creación de producto
    it('creates a product successfully', () => {
      cy.visit('/product/create'); // Navega a la página de creación de producto
      
      // Rellenar el formulario de creación de producto
      cy.get('input[name="product[name]"]').type('New Product'); // Nombre del producto
      cy.get('input[name="product[price]"]').type('99.99'); // Precio del producto
      cy.get('textarea[name="product[description]"]').type('This is a test product.'); // Descripción
      cy.get('input[name="product[stock]"]').type('10'); // Stock
      
      cy.get('button[type="submit"]').click(); // Enviar el formulario de creación
  
      // Verificar que el producto se haya creado correctamente
      cy.url().should('include', '/product'); // Redirigir a la lista de productos
      cy.contains('New Product').should('exist'); // Verificar que el nombre del producto esté  en la lista
    });
  
    // Prueba de edición de producto
    it('edits an existing product successfully', () => {
      // Primero, asegurémonos de que el producto está en la lista
      cy.visit('/product');
      cy.contains('New Product') // Asegurarse de que "New Product" esté en la lista
        .parent()
        .find('a') // Encuentra el botón de editar (link)
        .click(); // Haz clic en el botón de editar
  
      // En la página de edición, modifica los campos
      cy.get('input[name="product[name]"]').clear().type('Updated Product'); // Actualizar nombre
      cy.get('input[name="product[price]"]').clear().type('129.99'); // Actualizar precio
      cy.get('textarea[name="product[description]"]').clear().type('This is an updated product.'); // Actualizar descripción
      cy.get('input[name="product[stock]"]').clear().type('15'); // Actualizar stock
      
      cy.get('button[type="submit"]').click(); // Enviar el formulario 
  
      // Verificar que el producto se haya actualizado
      cy.url().should('include', '/product'); // Redirigir a la lista de productos
      cy.contains('Updated Product').should('exist'); // Verificar que el nombre actualizado esté  en la lista
    });
  

  
  });
  