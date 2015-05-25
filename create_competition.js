
$(document).ready(function(){
	
	$('#partnum').hide();
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
        var container = $(document.createElement('div')).css({
            padding: '5px', margin: '20px', width: '170px', border: '1px dashed',
            borderTopColor: '#999', borderBottomColor: '#999',
            borderLeftColor: '#999', borderRightColor: '#999'
        });
        


        $('#addButton').click(function() {
            if (boxes <= 49) {

                boxes = boxes + 1;
                 var category = {
                  cat0 : '--',
                  Jalgpall : 'Jalgpall',
                  Korvpall : 'Korvpall'
               };
               
              var _category = $('<select name=category[] id=category' + boxes + ' onchange=fun(this)>');
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
                  ans1X2 : '1X2',
                  ansScore : 'Score',
                  ansText : 'Text'
               };
               var _answerFootball = $('<select name=answer[] id=answerFootball' + boxes +' hidden onchange=fun1(this)>');
               $.each(answerFootball, function(val, text) {
                  _answerFootball.append(
                  $('<option id=answertype' + boxes +'></option>').val(val).html(text)
                   );
               });
              var answerBasketball = {
                ans1_2 : '1-2',
                ansScore : 'Score',
                ansText : 'Text'
              }
              var _answerBasketball = $('<select name=answer[] id=answerBasketball' + boxes + ' hidden onchange=fun1(this)>');
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
                } else{
                  $('#sats1' + id.substring(14)).show();
                  $('#sats2' + id.substring(14)).show();
                  $('#text' + id.substring(14)).hide();
                  $('#sats1' + id.substring(16)).show();
                  $('#sats2' + id.substring(16)).show();
                  $('#text' + id.substring(16)).hide();
                };
                }

              var sats1=('<input type="text" name=team[] id=sats1' + boxes +  ' placeholder="sats1" hidden/>');
              var sats2=('<input type="text" name=team[] id=sats2' + boxes + '  placeholder="sats2" hidden/>');
              var text=('<input type="text" name=team[] id=text' + boxes + ' placeholder="Enter your question here" hidden/>');

              $(container).append(_answerFootball);
              $(container).append(_answerBasketball);
              $(container).append(sats1);
              $(container).append(sats2);
              $(container).append(text);

              $('#main').after(container); // kontener div mainile külge
              
            }
            else {     
                
                $(container).append('<label>Reached the limit</label>'); 
                $('#addButton').attr('class', 'bt-disable'); 
                $('#addButton').attr('disabled', 'disabled');

            }
        });
        
        
        $('#removeButton').click(function() {   //textboxi eemaldamine ühe kaupa.
            if (boxes != 0) { 
               $('#category' + boxes).remove();
               $('#answer'+ boxes).remove();
               $('#sats1'+boxes).remove();
               $('#sats2'+boxes).remove();

              
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
        function names(request,result){
        $.get("getUserFromDb.php",request,function(data){
          var me=jQuery.parseJSON(data);
            return me;
        });}
       
        $(function(){
         
         $( "#users" ).autocomplete({

       source:names,
      minLength: 2,
    });        
      });
        });



   
