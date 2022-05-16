// Import function
async function loadJSON(__loc) {
    const response = await fetch(__loc);
    json = await response.json();

    return json;
}

// Function to change table values
async function change(id){
    // Load json file and load it into rundown data
    var rawData = await loadJSON("../json/rundown.json");
    var rundownData = eval(rawData);

    // Print into html file
    var result = "";

    rundownData.forEach(i => {
        if(i.id == id){
            result = result + "<tr>\
            <td class=\"card-text-font\">" + i.tanggal + "</td>\
            <td class=\"card-text-font\">" + i.waktu + "</td>\
            <td class=\"card-text-font\">" + i.kegiatan + "</td>\
            <td class=\"card-text-font\">" + i.keterangan + "</td>\
            </tr>";
        };
    });

    document.getElementById("rundown-data").innerHTML = result;
}

async function updateRundown(){
    document.getElementById("default-hari").hidden = true;

    var select = document.getElementById("hari");
    var hari = select.options[select.selectedIndex];

    change(hari.value)
}