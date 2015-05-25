
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
        var start = document.createElement('div');
        start.className = "question";
        var container = $(start);
        $(container).append($('<p id="nr1">1.</p>'));
        $('#main').before(container);

        $('#addButton').click(function() {

            var listfield=document.getElementById('list');
            listfield.value=JSON.stringify(usernames);
            console.log(listfield.value);
          
            if (boxes <= 49) {

                boxes = boxes + 1;
                 var category = {
                  cat0 : '--',
                  Jalgpall : 'Jalgpall',
                  Korvpall : 'Korvpall'
               };
               
              var _category = $('<select class="category" name=category[] id=category' + boxes + ' onchange=fun(this)>');
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
                } else if (value == "cat0"){
                  $('#answerFootball' + id.substring(8)).hide();
                  $('#answerBasketball' + id.substring(8)).hide();
                  $('#sats1' + id.substring(8)).hide();
                  $('#sats2' + id.substring(8)).hide();
                  $('#text' + id.substring(8)).hide();
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
                  cat0 : '--',
                  ans1X2 : '1X2',
                  ansScore : 'Score',
                  ansText : 'Text'
               };
               var _answerFootball = $('<select class="football" name=answer[] id=answerFootball' + boxes +' hidden onchange=fun1(this)>');
               $.each(answerFootball, function(val, text) {
                  _answerFootball.append(
                  $('<option id=answertype' + boxes +'></option>').val(val).html(text)
                   );
               });
              var answerBasketball = {
                cat0 : '--',
                ans1_2 : '1-2',
                ansScore : 'Score',
                ansText : 'Text'
              }
              var _answerBasketball = $('<select class="basketball"name=answer[] id=answerBasketball' + boxes + ' hidden onchange=fun1(this)>');
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
                } else if (value == "cat0"){
                  $('#sats1' + id.substring(14)).hide();
                  $('#sats2' + id.substring(14)).hide();
                  $('#text' + id.substring(14)).hide();
                  $('#sats1' + id.substring(16)).hide();
                  $('#sats2' + id.substring(16)).hide();
                  $('#text' + id.substring(16)).hide();
                } else{
                  $('#sats1' + id.substring(14)).show();
                  $('#sats2' + id.substring(14)).show();
                  $('#text' + id.substring(14)).hide();
                  $('#sats1' + id.substring(16)).show();
                  $('#sats2' + id.substring(16)).show();
                  $('#text' + id.substring(16)).hide();
                };
                }

              var sats1=('<input type="text"  class="sats1" name=team[] id=sats1' + boxes +  ' placeholder="Kodumeeskonna nimi" hidden/>');
              var sats2=('<input type="text" class="sats2" name=team[] id=sats2' + boxes + '  placeholder="Külalismeeskonna nimi" hidden/>');
              var text=('<input type="text"  class="text" name=team[] id=text' + boxes + ' placeholder="Sisesta küsimus" hidden/>');
              var removeButton = ('<a id="removeButton' + boxes + '" class="removeButton"><img src="images/remove.png" alt="remove"></a>');
              var divclose=$('</div><div class="clearer"></div>');

              $(container).append(_answerFootball);
              $(container).append(_answerBasketball);
              $(container).append(sats1);
              $(container).append(sats2);
              $(container).append(text);
              $(container).append(removeButton);
              $(container).append(divclose);
              $(container).append($('<p id="nr' + boxes + '">' + (boxes + 1) + '.</p>'));

              $('#main').before(container); // kontener div mainile külge
              
            }
            else {     
                
                $(container).append('<label>Reached the limit</label>'); 
                $('#addButton').attr('class', 'bt-disable'); 
                $('#addButton').attr('disabled', 'disabled');

            }
        });
        
        
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

        }
    });

      });
      });
