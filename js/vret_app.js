function openScenario(phobia, level, milestone) {
    console.log(phobia + "\t" + level + "\t" + milestone + "\t");
    var btnOpenScenario = document.getElementById("btnStartScenario");
    btnOpenScenario.href = "#";
    localStorage.clear();
    var scenarioNum = 0;
    switch (phobia) {
        case "Social Phobia":
            switch (level) {
                case "1":
                    switch (milestone) {
                        case "A":
                            btnOpenScenario.href = "scenes/SocialPhobia_L1M1.exe";
                            break;
                        case "B":
                            btnOpenScenario.href = "scenes/SocialPhobia_L1M2.exe";
                            break;
                        case "C":
                            console.log("Currently unavailable");
                            break;
                        default:
                            console.log("Unknown social phobia scenario");
                    }
                    break;
                case "2":
                    switch (milestone) {
                        case "A":
                            btnOpenScenario.href = "scenes/SocialPhobia_L2M1.exe";
                            break;
                        case "B":
                            console.log("Currently unavailable");
                            break;
                        case "C":
                            console.log("Currently unavailable");
                            break;
                        default:
                            console.log("");
                    }
                    break;
                case "3":
                    switch (milestone) {
                        case "A":
                            console.log("Currently unavailable");
                            break;
                        case "B":
                            console.log("Currently unavailable");
                            break;
                        case "C":
                            console.log("Currently unavailable");
                            break;
                        default:
                            console.log("");
                    }
                    break;
                default:
            }
            break;
        case "Acrophobia":
            switch (level) {
                case "1":
                    switch (milestone) {
                        case "A":
                            btnOpenScenario.href = "scenes/Acrophobia_L1M1.exe";
                            console.log('hello')
                            break;
                        case "B":
                            btnOpenScenario.href = "scenes/Acrophobia_L1M2.exe";
                            console.log('hello2')
                            break;
                        case "C":
                            btnOpenScenario.href = "scenes/Acrophobia_L1M3.exe";
                            break;
                        default:
                            console.log("Unknown acrophobia scenario");
                    }
                    break;
                case "2":
                    switch (milestone) {
                        case "A":
                            btnOpenScenario.href = "scenes/Acrophobia_L2M1.exe";
                            break;
                        case "B":
                            btnOpenScenario.href = "scenes/Acrophobia_L2M2.exe";
                            break;
                        case "C":
                            btnOpenScenario.href = "scenes/Acrophobia_L2M3.exe";
                            break;
                        default:
                            console.log("");
                    }
                    break;
                case "3":
                    switch (milestone) {
                        case "A":
                            console.log("Currently unavailable");
                            break;
                        case "B":
                            console.log("Currently unavailable");
                            break;
                        case "C":
                            console.log("Currently unavailable");
                            break;
                        default:
                            console.log("");
                    }
                    break;
                default:
            }
            break;

        case "Entomophobia":
            switch (level) {
                case "1":
                    switch (milestone) {
                        case "A":
                            btnOpenScenario.href = "scenes/Entomophobia_L1M1.exe";
                            break;
                        case "B":
                            btnOpenScenario.href = "scenes/Entomophobia_L1M2.exe";
                            break;
                        case "C":
                            btnOpenScenario.href = "scenes/Entomophobia_L1M3.exe";
                            break;
                        default:
                            console.log("Unknown entomophobia scenario");
                    }
                    break;
                case "2":
                    switch (milestone) {
                        case "A":
                            break;
                        case "B":
                            break;
                        case "C":
                            break;
                        default:
                            console.log("");
                    }
                    break;
                case "3":
                    switch (milestone) {
                        case "A":
                            console.log("Currently unavailable");
                            break;
                        case "B":
                            console.log("Currently unavailable");
                            break;
                        case "C":
                            console.log("Currently unavailable");
                            break;
                        default:
                            console.log("");
                    }
                    break;
                default:
            }
            break;
        default:
            console.log("Unknown phobia");
    }

}

function startSession(phobia, level, milestone) {
    let link = document.getElementById('endSession');
    var dataPost = {
        "phobia": phobia,
        "level":level,
        "milestone":milestone
    };
    var dataString = JSON.stringify(dataPost);
    $.ajax({
        url: 'save_vret_session.php',
        data: { myData: dataString },
        type: 'POST',
        success: function (response) {
            console.log(response)
            window.location="vret_session_notes.php";
        }
    });
}
