function change(key){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200){
            // Write success action here
            document.getElementById("tugas-data").innerHTML = this.responseText;
        };
    };

    xmlhttp.open("GET", "../script/get-tugas.php?key=" + key, true);
    xmlhttp.send();
}

change("");