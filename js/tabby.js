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

    var url = window.location.href;
    console.log(url.search("#"));
    if (url.search("#") == -1) {
        hideAll();
    } else {
        var a = url.substr(url.indexOf("#") + 1);
        if (a == "allCompetitions") {
            allComps();
        } else if (a == "myCompetitions") {
            myComps();
        } else if (a == "myCreatedCompetitions") {
            myCreatedComps();
        } else {
            hideAll();
        }
    }

    $("#allCompsButton").click(function(){
        allComps();
        window.history.pushState({'view': 'allComps'}, "All Competitions", "/competitions.php#allCompetitions");
        addingListener();
        return false;
    }); 
    $("#myCompsButton").click(function(){
        myComps();
        window.history.pushState({'view': 'myComps'}, "My Competitions", "/competitions.php#myCompetitions");
        addingListener();
        return false;
    });
    $("#myCreatedCompsButton").click(function(){
        myCreatedComps();
        window.history.pushState({'view': 'myCreatedComps'}, "My Created Competitions", "/competitions.php#myCreatedCompetitions");
        addingListener();
        return false;
    });
});