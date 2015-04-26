$(document).ready(function() {
    function addingListener() {
        window.addEventListener("popstate", function(e) {
            if (e.state == null) {
                hideAll();
            } else if (e.state.view == "allComps") {
                allComps();
            } else if (e.state.view == "myComps") {
                myComps();
            } else if (e.state.view == "myCreatedComps") {
                myCreatedComps();
            }
        });
    }

    function hideAll() {
        $("#allComps").hide();
        $("#myComps").hide();
        $("#myCreatedComps").hide();
    }

    function allComps() {
        $("#allComps").show();
        $("#myComps").hide();
        $("#myCreatedComps").hide();
    }

    function myComps() {
        $("#allComps").hide();
        $("#myComps").show();
        $("#myCreatedComps").hide();
    }

    function myCreatedComps() {
        $("#allComps").hide();
        $("#myComps").hide();
        $("#myCreatedComps").show();
    }

    function uncolorAll() {
        $("#allCompsButton").css("background-color", "#fff");
        $("#myCompsButton").css("background-color", "#fff");
        $("#myCreatedCompsButton").css("background-color", "#fff");
        $("#allCompsButton").css("color", "#555");
        $("#myCompsButton").css("color", "#555");
        $("#myCreatedCompsButton").css("color", "#555");
    }

    function colorAllComps() {
        $("#allCompsButton").css("background-color", "#800000");
        $("#myCompsButton").css("background-color", "#fff");
        $("#myCreatedCompsButton").css("background-color", "#fff");
        $("#allCompsButton").css("color", "#fff");
        $("#myCompsButton").css("color", "#555");
        $("#myCreatedCompsButton").css("color", "#555");
        $("#allCompsButton").css("border-radius", "4px 4px 0 0");
    }

    function colorMyComps() {
        $("#allCompsButton").css("background-color", "#fff");
        $("#myCompsButton").css("background-color", "#800000");
        $("#myCreatedCompsButton").css("background-color", "#fff");
        $("#allCompsButton").css("color", "#555");
        $("#myCompsButton").css("color", "#fff");
        $("#myCreatedCompsButton").css("color", "#555");
        $("#myCompsButton").css("border-radius", "4px 4px 0 0");
    }

    function colorMyCreatedComps() {
        $("#allCompsButton").css("background-color", "#fff");
        $("#myCompsButton").css("background-color", "#fff");
        $("#myCreatedCompsButton").css("background-color", "#800000");
        $("#allCompsButton").css("color", "#555");
        $("#myCompsButton").css("color", "#555");
        $("#myCreatedCompsButton").css("color", "#fff");
        $("#myCreatedCompsButton").css("border-radius", "4px 4px 0 0");
    }

    var url = window.location.href;
    if (url.search("#") == -1) {
        hideAll();
        uncolorAll();
    } else {
        var a = url.substr(url.indexOf("#") + 1);
        if (a == "allCompetitions") {
            allComps();
            colorAllComps();
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

    $("#allCompsButton").click(function(){
        allComps();
        window.history.pushState({'view': 'allComps'}, "All Competitions", "/competitions.php#allCompetitions");
        addingListener();
        colorAllComps();
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