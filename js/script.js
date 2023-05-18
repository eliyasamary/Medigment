window.onload = () => {
    $("#part2").hide();
    $("#finish-button").hide();
    $("#back-button").hide();
    document.getElementById("next-step-button").onclick = function() {
        $("#back-button").show();
        $("#process-bar").css("width", "100%");
        $("#process-bar").text("stage 2");
        $("#part1").hide();
        $("#part2").show();
        $("#next-step-button").hide();
        $("#finish-button").show();
    };

    document.getElementById("back-button").onclick = function() {
        $("#back-button").hide();
        $("#process-bar").css("width", "50%");
        $("#process-bar").text("stage 1");
        $("#part1").show();
        $("#part2").hide();
        $("#next-step-button").show();
        $("#finish-button").hide();
    };

    // let sensNum = 1;
    
    document.getElementById("add-section-btn").onclick = function() {
        // sensNum++;
        const pNode = document.getElementById("add-sensitive-section");
        pNode.innerHTML += '<div class="col-md-4"><select class="form-select" name="Sensitivity1"><option selected>Select Sensitivity</option><option value="1">Anaphylaxis</option><option value="2">Sinusitis</option><option value="3">Urticaria & Angioedema</option><option value="4">Rhinitis</option><option value="5">Asthma</option><option value="6">Autoimmunity-Immune Deficiency</option><option value="7">Drug Allergy</option><option value="8">Else...</option></select></div><div class="col-md-4"><input type="text" class="form-control" placeholder="Add Comment" id="inputSensitivity"></div><div class="col-md-4"></div>';
    };

    document.getElementById("add-medication-btn").onclick = function() {
        
    };

    document.getElementById("cancel-button").onclick = function() {
        window.location.href = 'http://se.shenkar.ac.il/students/2022-2023/web1/dev_204/index.html';
    };
};