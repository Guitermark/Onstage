describe('Comakership 2 aanmelding ADSD ', () => {
    it('passes', () => {
      cy.visit('http://127.0.0.1:8000')
      cy.contains('ADSD Afstudeer').click()
    })
  })