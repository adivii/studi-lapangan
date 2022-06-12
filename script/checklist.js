function change(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200){
            // Write success action here
            document.getElementById("checklist-data").innerHTML = this.responseText;
        };
    };

    xmlhttp.open("GET", "../script/get-checklist.php", true);
    xmlhttp.send();
}

change();