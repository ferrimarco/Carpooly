document.querySelector('.folder-user').addEventListener('click', function(event) {
    event.preventDefault();
    const menu = document.querySelector('#menu');
    const icon = document.querySelector('#icon');
    
    if (menu.style.display === "none" || menu.style.display === "") {
        menu.style.display = "block";
        icon.classList.remove('fa-chevron-down');
        icon.classList.add('fa-chevron-up');
    } else {
        menu.style.display = "none";
        icon.classList.add('fa-chevron-down');
        icon.classList.remove('fa-chevron-up');
    }
});


function trovaCittaPerIniziale(iniziale) {
    
    const cittaItaliane = [
        "Agrigento", "Ancona", "Aosta", "Arezzo", "Ascoli Piceno", "Asti", "Avellino",
        "Bari", "Barletta", "Belluno", "Benevento", "Bergamo", "Biella", "Bologna",
        "Bolzano", "Brescia", "Brindisi",
        "Cagliari", "Caltanissetta", "Campobasso", "Carbonia", "Caserta", "Catania",
        "Catanzaro", "Chieti", "Como", "Cosenza", "Cremona", "Crotone", "Cuneo",
        "Enna",
        "Fermo", "Ferrara", "Firenze", "Foggia", "Forlì", "Frosinone",
        "Genova", "Gorizia",
        "Grosseto",
        "Imperia", "Isernia",
        "La Spezia", "L'Aquila", "Latina", "Lecce", "Lecco", "Livorno", "Lodi", "Lucca",
        "Macerata", "Mantova", "Massa", "Matera", "Messina", "Milano", "Modena", "Monza",
        "Napoli", "Novara",
        "Nuoro",
        "Olbia", "Oristano",
        "Padova", "Palermo", "Parma", "Pavia", "Perugia", "Pesaro", "Pescara", "Piacenza",
        "Pisa", "Pistoia", "Pordenone", "Potenza", "Prato",
        "Ragusa", "Ravenna", "Reggio Calabria", "Reggio Emilia", "Rieti", "Rimini", "Roma",
        "Rovigo",
        "Salerno", "Sassari", "Savona", "Siena", "Siracusa", "Sondrio", "Taranto", "Teramo",
        "Terni", "Torino", "Trapani", "Trento", "Treviso", "Trieste",
        "Udine",
        "Varese", "Venezia", "Verbania", "Vercelli", "Verona", "Vibo Valentia", "Vicenza", "Viterbo"
    ];

    const cittaTrovate = cittaItaliane.filter(citta => citta.toLowerCase().startsWith(iniziale.toLowerCase()));

    return cittaTrovate;
}


function eseguiProgramma() {
    const departureInput = document.getElementById("departure");
    const destinationInput = document.getElementById("destination");

    departureInput.addEventListener("input", function() {
        mostraCittaCorrispondenti(this.value, "departure");
    });

    destinationInput.addEventListener("input", function() {
        mostraCittaCorrispondenti(this.value, "destination");
    });

    
    document.addEventListener("click", function(event) {
        if (!event.target.closest(".citta-corrispondenti")) {
            document.querySelectorAll(".citta-corrispondenti").forEach(element => {
                element.style.display = "none";
            });
        }
    });
}


function mostraCittaCorrispondenti(iniziale, inputId) {
    const cittaCorrispondenti = trovaCittaPerIniziale(iniziale);

    const resultsContainer = document.querySelector(`.${inputId}-corrispondenti`);
    resultsContainer.innerHTML = "";

    if (cittaCorrispondenti.length > 0) {
        const ul = document.createElement("ul");
        cittaCorrispondenti.forEach(citta => {
            const listItem = document.createElement("li");
            listItem.textContent = citta;
            listItem.addEventListener("click", function() {
                document.getElementById(inputId).value = citta;
                resultsContainer.style.display = "none";
            });
            ul.appendChild(listItem);
        });
        resultsContainer.appendChild(ul);
        resultsContainer.style.display = "block";
    } else {
        const noResult = document.createElement("div");
        noResult.textContent = "Nessuna corrispondenza trovata";
        resultsContainer.appendChild(noResult);
        resultsContainer.style.display = "none";
    }
}


        document.querySelector('#date-date').addEventListener('click', function(event){
        event.preventDefault()
        const table = document.querySelector('.format-date');

        if(table.style.display === "none"){
            table.style.display = "block"
        } else {
            table.style.display ="none"
        }
    })


document.addEventListener("DOMContentLoaded", eseguiProgramma);