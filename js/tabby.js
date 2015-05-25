$(document).ready(function() {
    function addingListener() {
        window.addEventListener("popstate", function(e) {
            if (e.state == null) {
                hideAll();
            } else if (e.state.view == "pastComps") {
                pastComps();
            } else if (e.state.view == "myComps") {
                myComps();
            } else if (e.state.view == "myCreatedComps") {
                myCreatedComps();
            }
        });
    }

    function hideAll() {
        $("#pastComps").hide();
        $("#myComps").hide();
        $("#myCreatedComps").hide();
    }

    function pastComps() {
        $("#pastComps").show();
        $("#myComps").hide();
        $("#myCreatedComps").hide();
    }

    function myComps() {
        $("#pastComps").hide();
        $("#myComps").show();
        $("#myCreatedComps").hide();
    }

    function myCreatedComps() {
        $("#pastComps").hide();
        $("#myComps").hide();
        $("#myCreatedComps").show();
    }

    function uncolorAll() {
        $("#pastCompsButton").css("background-color", "#800000");
        $("#myCompsButton").css("background-color", "#800000");
        $("#myCreatedCompsButton").css("background-color", "#800000");
        $("#pastCompsButton").css("color", "#FFF430");
        $("#myCompsButton").css("color", "#FFF430");
        $("#myCreatedCompsButton").css("color", "#FFF430");
    }

    function colorPastComps() {
        $("#pastCompsButton").css("background-color", "#FFF430");
        $("#myCompsButton").css("background-color", "#800000");
        $("#myCreatedCompsButton").css("background-color", "#800000");
        $("#pastCompsButton").css("color", "#800000");
        $("#myCompsButton").css("color", "#FFF430");
        $("#myCreatedCompsButton").css("color", "#FFF430");
    }

    function colorMyComps() {
        $("#pastCompsButton").css("background-color", "#800000");
        $("#myCompsButton").css("background-color", "#FFF430");
        $("#myCreatedCompsButton").css("background-color", "#800000");
        $("#pastCompsButton").css("color", "#FFF430");
        $("#myCompsButton").css("color", "#800000");
        $("#myCreatedCompsButton").css("color", "#FFF430");
    }

    function colorMyCreatedComps() {
        $("#pastCompsButton").css("background-color", "#800000");
        $("#myCompsButton").css("background-color", "#800000");
        $("#myCreatedCompsButton").css("background-color", "#FFF430");
        $("#pastCompsButton").css("color", "#FFF430");
        $("#myCompsButton").css("color", "#FFF430");
        $("#myCreatedCompsButton").css("color", "#800000");
    }

    var url = window.location.href;
    if (url.search("#") == -1) {
        hideAll();
        uncolorAll();
    } else {
        var a = url.substr(url.indexOf("#") + 1);
        if (a == "pastCompetitions") {
            pastComps();
            colorPastComps();
        } else if (a == "myCompetitions") {
            myComps();
            colorMyComps();
        } else if (a == "myCreatedCompetitions") {
            myCreatedComps();
            colorMyCreatedComps();
        } else {
            hideAll();
            uncolorAll();
        }
    }

    $("#pastCompsButton").click(function(){
        pastComps();
        window.history.pushState({'view': 'pastComps'}, "Past Competitions", "/competitions.php#pastCompetitions");
        addingListener();
        colorPastComps();
        return false;
    }); 
    $("#myCompsButton").click(function(){
        myComps();
        window.history.pushState({'view': 'myComps'}, "My Competitions", "/competitions.php#myCompetitions");
        addingListener();
        colorMyComps();
        return false;
    });
    $("#myCreatedCompsButton").click(function(){
        myCreatedComps();
        window.history.pushState({'view': 'myCreatedComps'}, "My Created Competitions", "/competitions.php#myCreatedCompetitions");
        addingListener();
        colorMyCreatedComps();
        return false;
    });
});