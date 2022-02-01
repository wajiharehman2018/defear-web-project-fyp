let searchClient = document.getElementById('searchClient');
searchClient.addEventListener("input", function () {
var filter = searchClient.value.toUpperCase();
var rows = document.querySelector("#myTable tbody").rows;
for (var i = 0; i < rows.length; i++) {
    var firstCol = rows[i].cells[1].textContent.toUpperCase();
    var secondCol = rows[i].cells[2].textContent.toUpperCase();
    var name = firstCol + " " + secondCol;
    if (firstCol.indexOf(filter) > -1 || secondCol.indexOf(filter) > -1 || name.indexOf(filter) > -1) {
        rows[i].style.display = "";
    } else {
        rows[i].style.display = "none";
    }      
}
});
