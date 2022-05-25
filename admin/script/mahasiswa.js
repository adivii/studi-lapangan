function load_kelas(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200){
            document.getElementById("mhs-kelas").innerHTML = this.responseText;
        };
    };

    xmlhttp.open("GET", "../script/get-kelas.php", true);
    xmlhttp.send();
}

function load_bus(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200){
            document.getElementById("bus-id").innerHTML = this.responseText;
        };
    };

    xmlhttp.open("GET", "../script/get-bus.php", true);
    xmlhttp.send();
}

function load_kamar(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200){
            document.getElementById("kamar-id").innerHTML = this.responseText;
        };
    };

    xmlhttp.open("GET", "../script/get-kamar.php", true);
    xmlhttp.send();
}

function load_kelompok(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200){
            document.getElementById("kelompok-id").innerHTML = this.responseText;
        };
    };

    xmlhttp.open("GET", "../script/get-kelompok.php", true);
    xmlhttp.send();
}

function kelas_changed(){
    var kelas = document.getElementById("mhs-kelas").value;

    if(kelas == "other"){
        document.getElementById("kelas-other").style.display = "block";
    }else{
        document.getElementById("kelas-other").style.display = "none";
    }

    document.getElementById("placeholder-kelas").style.display = "none";
}

function bus_changed(){
    var kelas = document.getElementById("bus-id").value;

    if(kelas == "other"){
        document.getElementById("bus-other").style.display = "block";
    }else{
        document.getElementById("bus-other").style.display = "none";
    }

    document.getElementById("placeholder-bus").style.display = "none";
}

function kamar_changed(){
    var kelas = document.getElementById("kamar-id").value;

    if(kelas == "other"){
        document.getElementById("kamar-other").style.display = "block";
    }else{
        document.getElementById("kamar-other").style.display = "none";
    }

    document.getElementById("placeholder-kamar").style.display = "none";
}

function kelompok_changed(){
    var kelas = document.getElementById("kelompok-id").value;

    if(kelas == "other"){
        document.getElementById("kelompok-other").style.display = "block";
    }else{
        document.getElementById("kelompok-other").style.display = "none";
    }

    document.getElementById("placeholder-kelompok").style.display = "none";
}

load_kelas();
load_bus();
load_kamar();
load_kelompok();