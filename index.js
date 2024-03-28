function searchOrder() {
    var searchInput = document.getElementById("searchInput").value;

    // Send AJAX request to search.php with searchInput
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("orderDetailsContainer").innerHTML = this.responseText;
            document.getElementById("orderDetailsContainer").style.visibility = "visible";
        }
    };
    xhttp.open("GET", "search.php?searchInput=" + searchInput, true);
    xhttp.send();
}
