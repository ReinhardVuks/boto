$(document).ready(function() {
  console.log("siin");
    $( "#users" ).autocomplete({
      source: "getUserFromDb.php",
      minLength: 2,
    });
  });

