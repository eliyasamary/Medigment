window.onload = () => {

    $("#register-form").hide();

    document.getElementById("register-btn").onclick = function() {
        $("#register-form").show();
        $("#login-form").hide();
        $("#register-btn").hide();
        $("#landing-img").hide();
    };
    
    $("#part2").hide();
    $("#finish-button").hide();
    $("#back-button").hide();
    $("#SensitivityAdded").hide();
    $("#MedicationAdded").hide();

};

function showData(data) {

    const navFrag = document.createDocumentFragment(); 
    
    for(const key in data.sorts) {
        const li = document.createElement('li');

        sHtml = `<a class="dropdown-item" href="./list.php?sort=${data.sorts[key].id}">${data.sorts[key].name}</a>`;

        li.innerHTML = sHtml;

        navFrag.appendChild(li);
   }

   document.getElementById("nav-place").appendChild(navFrag);
}

fetch("./data/data.json")
    .then(Response => Response.json())
    .then(data => showData(data));