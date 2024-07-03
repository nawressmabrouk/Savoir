function search(){
    var s= document.getElementById('search').value;
    var t= document.getElementById('selection').value;
    var Term = s.trim();


    document.getElementById('rechForm').submit();
}


function handleSelectionChange() {
    var selectElement = document.getElementById("selection");
    var selectedIndex = selectElement.selectedIndex;

    if (selectedIndex !== 0) {
      // Si une sélection est faite, masquer l'image de fond
        selectElement.style.backgroundImage = "none";
    } else {
      // Si aucune sélection n'est effectuée, afficher l'image de fond
        selectElement.style.backgroundImage = 'url("filter.png")';
    }

}





/*
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOMContentLoaded event fired');
    
    fetch('main.php', {
        method: 'POST',
        body: new FormData(document.getElementById('rechForm'))
    })
    .then(response => {
        //console.log('Response:', response);
        return response.json();
    })
    .then(documents => {
        //console.log('Documents:', documents);
        const cardsContainer = document.querySelector('.cards');
        documents.forEach(doc => {
            const card = document.createElement('div');
            card.classList.add('card');
            card.innerHTML = `
                <div class="docname">${doc.nomdoc}</div>
                <div class="body">${doc.file_content}</div>
                <div class="date">${doc.date}</div>
            `;
            cardsContainer.appendChild(card);
        });
    })
    .catch(error => {
        console.error('Error fetching documents:', error);
    });
});
*/

        
    
    