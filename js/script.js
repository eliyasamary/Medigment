window.onload = () => {
    $("#part2").hide();
    $("#submit-button").hide();
    document.getElementById("next-step-button").onclick = function() {
        $("#back-button").prop( "disabled", false );
        $("#process-bar").css("width", "100%");
        $("#process-bar").text("stage 2");
        $("#part1").hide();
        $("#part2").show();
        $("#next-step-button").hide();
        $("#submit-button").show();
    };

    document.getElementById("back-button").onclick = function() {
        $("#back-button").prop( "disabled", true );
        $("#process-bar").css("width", "50%");
        $("#process-bar").text("stage 1");
        $("#part1").show();
        $("#part2").hide();
        $("#next-step-button").show();
        $("#submit-button").hide();
    };

    document.getElementById("addSensitivity").onclick = function() {
      const sensitiveBox = document.createElement("div");
      sensitiveBox.innerText = "";  
    };
};