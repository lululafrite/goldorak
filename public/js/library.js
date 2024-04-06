document.addEventListener("DOMContentLoaded", function() {
    // Charger jQuery
    let jqueryScript = document.createElement('script');
    jqueryScript.src = 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js';
    document.head.appendChild(jqueryScript);

    let jqueryScript_ = document.createElement('script');
    jqueryScript_.src = "https://code.jquery.com/jquery-3.7.1.js"
    integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous";
    document.head.appendChild(jqueryScript_);
  
    // Charger Bootstrap
    let bootstrapScript = document.createElement('script');
    bootstrapScript.src = 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js';
    document.head.appendChild(bootstrapScript);
  
    // Charger FancyBox
    let fancyboxScript = document.createElement('script');
    fancyboxScript.src = 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js';
    document.head.appendChild(fancyboxScript);
  });

