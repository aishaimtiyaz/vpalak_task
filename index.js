document.addEventListener("DOMContentLoaded", function() {
    // Get reference to search button
    var searchOrderBtn = document.getElementById("searchOrderBtn");
    
    // Add click event listener to search button
    searchOrderBtn.addEventListener("click", function() {
        // Get selected search option
        var searchOptions = document.getElementsByName("searchOptionsList");
        var selectedOption;
        for (var i = 0; i < searchOptions.length; i++) {
            if (searchOptions[i].checked) {
                selectedOption = searchOptions[i].value;
                break;
            }
        }
        
        // Get search value
        var searchValue = document.querySelector("#searchBar > input").value;

        // Make AJAX request
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Display order details
                    document.getElementById("orderDetailsContainer").innerHTML = xhr.responseText;
                    document.getElementById("orderDetailsContainer").style.visibility = "visible";
                } else {
                    console.log("Error: " + xhr.status);
                }
            }
        };
        
        // Prepare and send AJAX request
        xhr.open("POST", "search.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send("searchOption=" + selectedOption + "&searchValue=" + searchValue);
    });
});
