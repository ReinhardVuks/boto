
<<<<<<< HEAD
$(document).ready(function(){
	var usernames=[document.getElementById('creator').value];
  var ids=[];


	$('#partnum').hide();

  $("#replace-img").hover(function() {
        $("#main-img").css("opacity", "0");
        $("#replace-img").css("opacity", "1");
    }, function() {
        $("#replace-img").css("opacity", "0");
        $("#main-img").css("opacity", "1");
    });

=======
var usernames=[];
var ids=[];
$(document).ready(function(){
	


	$('#partnum').hide();
>>>>>>> c725b2c9653b1c65aa732ce79d010911577e7469
	$('input[type=radio]').click(function(){
   if($('input[value=limited]').is(":checked")) { 
   		$('#partnum').show();
   	}
 		else{
 			$('#partnum').hide();
 		}
	});
        var boxes = 0;

        //konteiner, kuhu hakkame lisama textboxe
<<<<<<< HEAD
        var start = document.createElement('div');
        start.className = "question";
        var container = $(start);
        $(container).append($('<p id="nr1">1.</p>'));
        $('#main').before(container);

        $('#addButton').click(function() {

            var listfield=document.getElementById('list');
            listfield.value=JSON.stringify(usernames);
            console.log(listfield.value);
=======
        var container = $(document.createElement('div')).css({
            padding: '5px', margin: '20px', width: '170px', border: '1px dashed',
            borderTopColor: '#999', borderBottomColor: '#999',
            borderLeftColor: '#999', borderRightColor: '#999'
        });
        


        $('#addButton').click(function() {


             
              

            var listfield=document.getElementById('list');
            listfield.value=JSON.stringify(usernames);


>>>>>>> c725b2c9653b1c65aa732ce79d010911577e7469
          
            if (boxes <= 49) {

                boxes = boxes + 1;
                 var category = {
                  cat0 : '--',
                  Jalgpall : 'Jalgpall',
                  Korvpall : 'Korvpall'
               };
               
<<<<<<< HEAD
              var _category = $('<select class="category" name=category[] id=category' + boxes + ' onchange=fun(this)>');
=======
              var _category = $('<select name=category[] id=category' + boxes + ' onchange=fun(this)>');
>>>>>>> c725b2c9653b1c65aa732ce79d010911577e7469
               var n = 0;

              window.fun = function(element){
                var id = element.id;
                var value = $( "#" +id).val();  
                if (value=="Jalgpall") {
                  $('#answerBasketball' + id.substring(8)).hide();
                  $('#answerFootball' + id.substring(8)).show();
                } else if(value=="Korvpall"){
                  $('#answerFootball' + id.substring(8)).hide();
                  $('#answerBasketball' + id.substring(8)).show();
<<<<<<< HEAD
                } else if (value == "cat0"){
                  $('#answerFootball' + id.substring(8)).hide();
                  $('#answerBasketball' + id.substring(8)).hide();
                  $('#sats1' + id.substring(8)).hide();
                  $('#sats2' + id.substring(8)).hide();
                  $('#text' + id.substring(8)).hide();
=======
>>>>>>> c725b2c9653b1c65aa732ce79d010911577e7469
                };
                }
                
               $.each(category, function(val, text) {
                    _category.append(
                    $('<option name=categorytype[] + id=categorytype' + boxes + n + ' ></option>').val(val).html(text)
                    );
                    n = n + 1;
               });
              
            $(container).append(_category);
                //dropdown menu tegemine
                var answerFootball = {
<<<<<<< HEAD
                  cat0 : '--',
=======
>>>>>>> c725b2c9653b1c65aa732ce79d010911577e7469
                  ans1X2 : '1X2',
                  ansScore : 'Score',
                  ansText : 'Text'
               };
<<<<<<< HEAD
               var _answerFootball = $('<select class="football" name=answer[] id=answerFootball' + boxes +' hidden onchange=fun1(this)>');
=======
               var _answerFootball = $('<select name=answer[] id=answerFootball' + boxes +' hidden onchange=fun1(this)>');
>>>>>>> c725b2c9653b1c65aa732ce79d010911577e7469
               $.each(answerFootball, function(val, text) {
                  _answerFootball.append(
                  $('<option id=answertype' + boxes +'></option>').val(val).html(text)
                   );
               });
              var answerBasketball = {
<<<<<<< HEAD
                cat0 : '--',
=======
>>>>>>> c725b2c9653b1c65aa732ce79d010911577e7469
                ans1_2 : '1-2',
                ansScore : 'Score',
                ansText : 'Text'
              }
<<<<<<< HEAD
              var _answerBasketball = $('<select class="basketball"name=answer[] id=answerBasketball' + boxes + ' hidden onchange=fun1(this)>');
=======
              var _answerBasketball = $('<select name=answer[] id=answerBasketball' + boxes + ' hidden onchange=fun1(this)>');
>>>>>>> c725b2c9653b1c65aa732ce79d010911577e7469
              $.each(answerBasketball, function(val, text) {
                  _answerBasketball.append(
                  $('<option id=answertype' + boxes +'></option>').val(val).html(text)
                   );
               });
               
              window.fun1 = function(element){
                var id = element.id;
                var value = $( "#" +id).val();
                if (value=="ansText") {
                  $('#sats1' + id.substring(14)).hide();
                  $('#sats2' + id.substring(14)).hide();
                  $('#text' + id.substring(14)).show();
                  $('#sats1' + id.substring(16)).hide();
                  $('#sats2' + id.substring(16)).hide();
                  $('#text' + id.substring(16)).show();
<<<<<<< HEAD
                } else if (value == "cat0"){
                  $('#sats1' + id.substring(14)).hide();
                  $('#sats2' + id.substring(14)).hide();
                  $('#text' + id.substring(14)).hide();
                  $('#sats1' + id.substring(16)).hide();
                  $('#sats2' + id.substring(16)).hide();
                  $('#text' + id.substring(16)).hide();
=======
>>>>>>> c725b2c9653b1c65aa732ce79d010911577e7469
                } else{
                  $('#sats1' + id.substring(14)).show();
                  $('#sats2' + id.substring(14)).show();
                  $('#text' + id.substring(14)).hide();
                  $('#sats1' + id.substring(16)).show();
                  $('#sats2' + id.substring(16)).show();
                  $('#text' + id.substring(16)).hide();
                };
                }

<<<<<<< HEAD
              var sats1=('<input type="text"  class="sats1" name=team[] id=sats1' + boxes +  ' placeholder="Kodumeeskonna nimi" hidden/>');
              var sats2=('<input type="text" class="sats2" name=team[] id=sats2' + boxes + '  placeholder="Külalismeeskonna nimi" hidden/>');
              var text=('<input type="text"  class="text" name=team[] id=text' + boxes + ' placeholder="Sisesta küsimus" hidden/>');
              var removeButton = ('<a id="removeButton' + boxes + '" class="removeButton"><img src="images/remove.png" alt="remove"></a>');
              var divclose=$('</div><div class="clearer"></div>');
=======
              var sats1=('<input type="text" name=team[] id=sats1' + boxes +  ' placeholder="sats1" hidden/>');
              var sats2=('<input type="text" name=team[] id=sats2' + boxes + '  placeholder="sats2" hidden/>');
              var text=('<input type="text" name=team[] id=text' + boxes + ' placeholder="Enter your question here" hidden/>');
>>>>>>> c725b2c9653b1c65aa732ce79d010911577e7469

              $(container).append(_answerFootball);
              $(container).append(_answerBasketball);
              $(container).append(sats1);
              $(container).append(sats2);
              $(container).append(text);
<<<<<<< HEAD
              $(container).append(removeButton);
              $(container).append(divclose);
              $(container).append($('<p id="nr' + boxes + '">' + (boxes + 1) + '.</p>'));

              $('#main').before(container); // kontener div mainile külge
=======

              $('#main').after(container); // kontener div mainile külge
>>>>>>> c725b2c9653b1c65aa732ce79d010911577e7469
              
            }
            else {     
                
                $(container).append('<label>Reached the limit</label>'); 
                $('#addButton').attr('class', 'bt-disable'); 
                $('#addButton').attr('disabled', 'disabled');

            }
        });
        
        
<<<<<<< HEAD
        $('#removeButton' +boxes).click(function() {   //textboxi eemaldamine ühe kaupa.
            if (boxes != 0) {
              $('#nr' + boxes).remove();
              $('#category' + boxes).remove();
              $('#answer'+ boxes).remove();
              $('#sats1'+boxes).remove();
              $('#sats2'+boxes).remove();
              $('#text'+boxes).remove();
              $('#removeButton'+boxes).remove();

              
              boxes = boxes - 1;
=======
        $('#removeButton').click(function() {   //textboxi eemaldamine ühe kaupa.
            if (boxes != 0) { 
               $('#category' + boxes).remove();
               $('#answer'+ boxes).remove();
               $('#sats1'+boxes).remove();
               $('#sats2'+boxes).remove();

              
               boxes = boxes - 1;
>>>>>>> c725b2c9653b1c65aa732ce79d010911577e7469

             }
        
            if (boxes == 0) { $(container).empty(); 
        
                $(container).remove();
                $('#addButton').removeAttr('disabled'); 
                $('#addButton').attr('class', 'bt'); 

            }
        });

        $('#removeAllButton').click(function() {   // kõik textboxid korraga. 
        
            $(container).empty(); 
            $(container).remove();  
            $('#addButton').removeAttr('disabled'); 
            $('#addButton').attr('class', 'bt');
            boxes=0;
        });
       
       
        $(function(){
         
         $( "#users" ).autocomplete({

       source: function( request, response ) {
        $.ajax({
          type: "GET",
          url: "getUserFromDb.php",
          dataType: "json",
          data: {
            term: request.term
          },
          success: function( data ) {
            response( data );
          }
        });
      },
      minLength: 2,
      select: function(event,ui){
              usernames.push(ui.item.value);
<<<<<<< HEAD
=======
          
        
         
>>>>>>> c725b2c9653b1c65aa732ce79d010911577e7469

        }
    });

      });
      });
<<<<<<< HEAD
=======
     




   
>>>>>>> c725b2c9653b1c65aa732ce79d010911577e7469
