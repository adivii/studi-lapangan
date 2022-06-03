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

function edit_data(id){
    location.href="./edit-checklist.php?key=" + id; 
}

function hapus_data(id){
    var isDelete = confirm("Delete Data?");

    if(isDelete){
        location.href="../script/delete-checklist.php?key=" + id;
    }else{
        location.href="./show-checklist.php";
    }
}

change();