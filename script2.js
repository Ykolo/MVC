var ContainerInfos = document.getElementById("ContainerInfos") //Endroit ou afficher les infos
var Afficher = false;

let data;
fetch('../infos.json')
    .then(response => response.json())
    .then(jsonData => {data = jsonData;})
    .catch(error => console.error('Error fetching JSON:', error));


function GenerateInfos(race) {
    var cat = race.substring(0,3);
    var gp = race.substring(3);

    var parentDiv = document.createElement("div"); //Create parent div
    parentDiv.classList.add("parentinfos");

    var closebutton = document.createElement("button");
    closebutton.id = "closebutton";
    closebutton.innerHTML = "<img src ='../img/close.png' id = 'closebutton' alt ='Fermer les informations' onclick='CloseInfos()' role ='button' tabindex='0'>";

    var firstrow = document.createElement("div");
    firstrow.classList.add("InfosFirstRow")

    var secondrow = document.createElement("div");
    secondrow.classList.add("InfosSecondRow")

        var gpname = document.createElement("div");
        gpname.innerHTML = data[cat][gp].gpname;
        gpname.id = "gpname";

        var gpdate = document.createElement("div");
        gpdate.innerHTML = "<p>" + data[cat][gp].gpdate + "</p>" +
        "<p>" + " Round " + data[cat][gp].gpround + " of " + data[cat][gp].gpseasonrounds + "</p>";
        gpdate.id = "gpdate";

        firstrow.appendChild(gpname);
        firstrow.appendChild(gpdate);
        firstrow.appendChild(closebutton);

        var gpmap = document.createElement("div");
        if (cat == 'wrc') {gpmap.innerHTML = "<img src='../" +  data[cat][gp].gpmap + "' alt = 'Country flag of " + data[cat][gp].gpname + "'/>";}
        else {gpmap.innerHTML = "<img src='../" +  data[cat][gp].gpmap + "' alt = 'Track Layout of " + data[cat][gp].gpname + "'/>";}
        gpmap.id = "gpmap";

        var gpinfos = document.createElement("div");
        gpinfos.innerHTML = "<span> Infos coming soon </span>";
        gpinfos.id = "gpinfos";
        
        secondrow.appendChild(gpmap);
        secondrow.appendChild(gpinfos);
        
    parentDiv.appendChild(firstrow);
    parentDiv.appendChild(secondrow);
    return parentDiv;
}

function ShowInfos(race) {

    if (Afficher == false){
        ContainerInfos.style.display = "grid";
        Afficher = true;
        ContainerInfos.appendChild(GenerateInfos(race));
    }
    else {
        CloseInfos();
    }
}

function CloseInfos() {
    ContainerInfos.style.display = "none";
    ContainerInfos.innerHTML = "";
    Afficher = false;
}
