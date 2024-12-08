describe('Product Creation', () => {
    it('loads the product creation page', () => {
      cy.visit('/product/create'); // Abre la URL de creación de producto
      cy.get('form').should('exist'); // Verifica que el formulario esté presente
    });
  
    it('creates a product successfully', () => {
      cy.visit('/product/create');
      cy.get('input[name="product[name]"]').type('New Product'); // Completa el nombre
      cy.get('input[name="product[price]"]').type('99.99'); // Completa el precio
      cy.get('textarea[name="product[description]"]').type('This is a test product.'); // Completa la descripción
      cy.get('input[name="product[stock]"]').type('10');
      
      cy.get('button[type="submit"]').click(); // Envía el formulario
  
      // Verifica que el producto se haya creado correctamente
      cy.url().should('include', '/product'); // Redirige a la página de productos
      cy.contains('New Product').should('exist'); // Verifica que el producto se muestra
    });
  });
  