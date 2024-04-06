function sendDataToServer(url, data){

    return fetch(url, {

        method: 'POST',
        body: data

    })
    .then(response => {

        if (!response.ok){

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