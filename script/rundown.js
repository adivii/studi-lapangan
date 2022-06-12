function change(id){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200){
            document.getElementById("rundown-data").innerHTML = this.responseText;
        };
    };

    xmlhttp.open("GET", "../script/get-rundown.php?id=" + id, true);
    xmlhttp.send();
}

function updateRundown(){
    var select = document.getElementById("hari");
    var hari = select.options[select.selectedIndex];

    change(hari.value)
}

function load_date(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200){
            document.getElementById("hari").innerHTML = this.responseText;
        };
    };

    xmlhttp.open("GET", "../script/get-date.php", true);
    xmlhttp.send();
}

load_date();
change("all");