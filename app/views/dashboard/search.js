var search = function () {
    var title = document.getElementById("text_search").value;
    var reponse = new XMLHttpRequest();

    reponse.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {
                document.getElementById("searched_offre").innerHTML = this.responseText;
        }
    };
    
    reponse.open("GET","search.php?title=" + title, true);
    reponse.send();

    };