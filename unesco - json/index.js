/**
 * ETML
 * Auteur : Quentin Métroz
 * Date : 23.1.2024
 * Description : Traite les données du JSON et écris les données dans des balises p
 */

// import le json
import data from './world-heritage-list.json' assert {type: 'json'};

// Selectionne le body dans le html
const body = document.querySelector("body");

// Incrémente 
let count = 1;

// Boucle pour crée tout les p pour stocker les données
for(let i=1;i <= data.length;i++) {

    // Cette ligne crée un element p
    let p = document.createElement("p");

    // On lui mets un id pour pouvoir stocker les données 
    p.id = `json${i}`;

    // Ajoute le paragraphe au body
    body.appendChild(p);
}

// Cette boucle permet de parcourire le json
data.forEach(element => {

    // prend le bon paragraphe et insérer lui les données contenu du json
   document.getElementById(`json${count}`).textContent = `${element.category} | [ lat : ${element.coordinates.lat} ||| lon : ${element.coordinates.lon} ] | ${element.criteria_txt} | ${element.danger} | ${element.date_inscribed} | ${element.extension} | ${element.http_url} | ${element.id_number} | [ color summary : ${element.image_url.color_summary} ||| etag : ${element.image_url.etag} ||| filename : ${element.image_url.filename} ||| format : ${element.image_url.format} ||| height : ${element.image_url.height} ||| id : ${element.image_url.id} ||| last synchronized : ${element.image_url.last_synchronized} ||| mimetype : ${element.image_url.mimetype} ||| thumbnail : ${element.image_url.thumbnail} ||| width : ${element.image_url.width} ] | ${element.iso_code} | ${element.justification} | ${element.location} | ${element.region} | ${element.revision} | ${element.secondary_dates} | ${element.short_description} | ${element.site} | ${element.states} | ${element.transboundary}`;
   
   // Incrémente la variable count pour changer de p à chaque itération
   count++;
});
