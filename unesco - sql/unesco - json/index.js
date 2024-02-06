/**
 * ETML
 * Auteur : Quentin Métroz
 * Date : 23.1.2024
 * Description : Traite les données du JSON et écris les données dans des balises p
 */

// import le json
import data from './real.planet.unesco.json' assert {type: 'json'};

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
   document.getElementById(`json${count}`).textContent = `("${element.states_name_en}", "${element.region_en}", "${element.iso_code}", "${element.udnp_code}", "${element.image}", "${element.link}", "${element.short_description_en}", "${element.name_en}", "${element.longitude}", "${element.latitude}", "${element.category}"), `;
   
   // Incrémente la variable count pour changer de p à chaque itération
   count++;
});
