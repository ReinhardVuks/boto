$(document).ready(function() {
    function addingListener() {
        window.addEventListener("popstate", function(e) {
            if (e.state == null) {
                hideAll();
<<<<<<< HEAD
            } else if (e.state.view == "pastComps") {
                pastComps();
=======
            } else if (e.state.view == "allComps") {
                allComps();
>>>>>>> c725b2c9653b1c65aa732ce79d010911577e7469
            } else if (e.state.view == "myComps") {
                myComps();
            } else if (e.state.view == "myCreatedComps") {
                myCreatedComps();
            }
        });
    }

    function hideAll() {
<<<<<<< HEAD
        $("#pastComps").hide();
=======
        $("#allComps").hide();
>>>>>>> c725b2c9653b1c65aa732ce79d010911577e7469
        $("#myComps").hide();
        $("#myCreatedComps").hide();
    }

<<<<<<< HEAD
    function pastComps() {
        $("#pastComps").show();
=======
    function allComps() {
        $("#allComps").show();
>>>>>>> c725b2c9653b1c65aa732ce79d010911577e7469
        $("#myComps").hide();
        $("#myCreatedComps").hide();
    }

    function myComps() {
<<<<<<< HEAD
        $("#pastComps").hide();
=======
        $("#allComps").hide();
>>>>>>> c725b2c9653b1c65aa732ce79d010911577e7469
        $("#myComps").show();
        $("#myCreatedComps").hide();
    }

    function myCreatedComps() {
<<<<<<< HEAD
        $("#pastComps").hide();
=======
        $("#allComps").hide();
>>>>>>> c725b2c9653b1c65aa732ce79d010911577e7469
        $("#myComps").hide();
        $("#myCreatedComps").show();
    }

    function uncolorAll() {
<<<<<<< HEAD
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
=======
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
>>>>>>> c725b2c9653b1c65aa732ce79d010911577e7469
    }

    var url = window.location.href;
    if (url.search("#") == -1) {
        hideAll();
        uncolorAll();
    } else {
        var a = url.substr(url.indexOf("#") + 1);
<<<<<<< HEAD
        if (a == "pastCompetitions") {
            pastComps();
            colorPastComps();
=======
        if (a == "allCompetitions") {
            allComps();
            colorAllComps();
>>>>>>> c725b2c9653b1c65aa732ce79d010911577e7469
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

<<<<<<< HEAD
    $("#pastCompsButton").click(function(){
        pastComps();
        window.history.pushState({'view': 'pastComps'}, "Past Competitions", "/competitions.php#pastCompetitions");
        addingListener();
        colorPastComps();
=======
    $("#allCompsButton").click(function(){
        allComps();
        window.history.pushState({'view': 'allComps'}, "All Competitions", "/competitions.php#allCompetitions");
        addingListener();
        colorAllComps();
>>>>>>> c725b2c9653b1c65aa732ce79d010911577e7469
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