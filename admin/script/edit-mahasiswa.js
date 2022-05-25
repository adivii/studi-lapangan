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
    var isDelete = confirm("Delete Data?");

    if(isDelete){
        location.href="../script/delete-mahasiswa.php?key=" + npm;
    }else{
        location.href="./show-mahasiswa.php";
    }
}

load_data("all");