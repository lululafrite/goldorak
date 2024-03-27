// Fonction pour envoyer les données au serveur via Fetch
function sendDataToServer(url, data) {
    return fetch(url, {
        method: 'POST',
        body: data
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Une erreur s\'est produite lors de la requête.');
        }
        return response.text();
    })
    .then(data => {
        console.log('Réponse du serveur :', data);
    })
    .catch(error => {
        console.error('Erreur :', error);
    });
}

document.getElementById('btn_home_save').addEventListener('click', function(event) {

    event.preventDefault(); // Empêche le comportement par défaut du bouton
    let formData = new FormData();
    sendData(formData, 'btn_home_save');

});

document.getElementById('btn_img_chapter1').addEventListener('click', function(event) {

    event.preventDefault(); // Empêche le comportement par défaut du bouton
    let formData = new FormData();
    sendData(formData, 'btn_img_chapter1');
    
    changePicture('file_img_chapter1', 'id_img_chapter1')

});

document.getElementById('btn_img_chapter2').addEventListener('click', function(event) {

    event.preventDefault(); // Empêche le comportement par défaut du bouton
    let formData = new FormData();
    sendData(formData, 'btn_img_chapter2');
    
    changePicture('file_img_chapter2', 'id_img_chapter2')

});

function changePicture(nameInputFile, idImage){
    
    let inputElement = document.getElementById(nameInputFile);
    let files = inputElement.files;

    if(files[0].name != ''){
        let imgElement = document.getElementById(idImage);
        let nouveauChemin = 'img/picture/' + files[0].name;
        imgElement.src = nouveauChemin;
    }

}

function sendData(formData, button){
    
     // Empêche le comportement par défaut du bouton

    // Créer et remplir un objet FormData
    formData = new FormData();

    formData.append(button, document.querySelector('input[name="' + button + '"]').value);

    formData.append('csrf', document.querySelector('input[name="csrf"]').value);

    formData.append('txt_titre1', document.querySelector('input[name="txt_titre1"]').value);

    formData.append('txt_titre_chapter1', document.querySelector('input[name="txt_titre_chapter1"]').value);
    formData.append('txt_chapter1', document.querySelector('textarea[name="txt_chapter1"]').value);
    formData.append('file_img_chapter1', document.querySelector('input[name="file_img_chapter1"]').files[0]);
    formData.append('txt_img_chapter1', document.querySelector('input[name="txt_img_chapter1"]').value);
    
    formData.append('txt_titre_chapter2', document.querySelector('input[name="txt_titre_chapter2"]').value);
    formData.append('txt_chapter2', document.querySelector('textarea[name="txt_chapter2"]').value);
    formData.append('file_img_chapter2', document.querySelector('input[name="file_img_chapter2"]').files[0]);
    formData.append('txt_img_chapter2', document.querySelector('input[name="txt_img_chapter2"]').value);

    // Envoyer les données au serveur
    sendDataToServer('index.php?page=home', formData)
    .then(response => {
        // Affichez le message lorsque la réponse du serveur est reçue avec succès
        document.getElementById('message').innerText = 'Enregistrement effectué avec succès!';
    })
    .catch(error => {
        // Affichez un message d'erreur en cas d'échec de la requête
        document.getElementById('message').innerText = 'Une erreur s\'est produite lors de l\'enregistrement.';
        console.error('Erreur :', error);
    });
}