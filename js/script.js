// window.onload = () => {
    
//     $("#part2").hide();
//     $("#finish-button").hide();
//     $("#back-button").hide();
//     $("#SensitivityAdded").hide();
//     $("#MedicationAdded").hide();
    
//     document.getElementById("next-step-button").onclick = function() {
//         $("#back-button").show();
//         $("#process-bar").css("width", "100%");
//         $("#process-bar").text("stage 2");
//         $("#part1").hide();
//         $("#part2").show();
//         $("#next-step-button").hide();
//         $("#finish-button").show();
//     };

//     document.getElementById("back-button").onclick = function() {
//         $("#back-button").hide();
//         $("#process-bar").css("width", "50%");
//         $("#process-bar").text("stage 1");
//         $("#part1").show();
//         $("#part2").hide();
//         $("#next-step-button").show();
//         $("#finish-button").hide();
//     };

//     document.getElementById("cancel-button").onclick = function() {
//         window.location.href = 'http://se.shenkar.ac.il/students/2022-2023/web1/dev_204/index.html';
//     };

//     document.getElementById("addSensitivity").onclick = function() {
//         $("#SensitivityAdded").show();
//     };

//     document.getElementById("addMedication").onclick = function() {
//         $("#MedicationAdded").show();
//     };
// };

window.onload = () => {
    
    $("#register-form").hide();

    
    document.getElementById("register-btn").onclick = function() {
        $("#register-form").show();
        $("#login-form").hide();
        $("#register-btn").hide();
    };

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