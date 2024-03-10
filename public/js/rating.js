function handleRating(event){

    if(event.target.tagName === 'I'){

        // Récupérer la valeur de data-rating
        var ratingValue = event.target.getAttribute('data-rating');

        // Mettre à jour la valeur du champ de texte
        document.getElementById('selectedRating').value = ratingValue;

        // Réinitialiser les classes "active" pour toutes les étoiles
        var stars = document.querySelectorAll('.rating i');
        stars.forEach(function(star) {
        star.classList.remove('active');
        });

        // Ajouter la classe "active" pour les étoiles jusqu'à la note sélectionnée
        for (var i = 0; i < ratingValue; i++) {
        stars[i].classList.add('active');
        }
        
    }

}