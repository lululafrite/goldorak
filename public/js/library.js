document.addEventListener("DOMContentLoaded", function() {
    // Charger jQuery
    var jqueryScript = document.createElement('script');
    jqueryScript.src = 'https://code.jquery.com/jquery-3.6.0.min.js';
    document.head.appendChild(jqueryScript);
  
    // Charger Bootstrap
    var bootstrapScript = document.createElement('script');
    bootstrapScript.src = 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js';
    document.head.appendChild(bootstrapScript);
  
    // Charger FancyBox
    var fancyboxScript = document.createElement('script');
    fancyboxScript.src = 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js';
    document.head.appendChild(fancyboxScript);
  });
  