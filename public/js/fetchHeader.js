fetch('http://example.com/api/resource', {
  headers: {
    'Authorization': 'Bearer YOUR_JWT_TOKEN'
  }
})
.then(response => {
  // Traitement de la réponse
});
