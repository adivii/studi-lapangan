function load_data(key){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200){
            document.getElementById("mahasiswa-data").innerHTML = this.responseText;
        };
    };

    xmlhttp.open("GET", "../script/get-mahasiswa.php?key=" + key, true);
    xmlhttp.send();
}

function edit_data(npm){
    location.href="./edit-mahasiswa.php?key=" + npm; 
}

function hapus_data(npm){

}

load_data("all");