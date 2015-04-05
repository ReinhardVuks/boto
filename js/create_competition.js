function fun(){
          alert("jah");
        }

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
                  ans1 : '1X2',
                  ans2 : 'Score',
                  ans3 : 'Text'
               };
               var _answerFootball = $('<select name=answer[] id=answerFootball' + boxes +' hidden>');
               $.each(answerFootball, function(val, text) {
                  _answerFootball.append(
                  $('<option id=answertype' + boxes +'></option>').val(val).html(text)
                   );
               });
              var answerBasketball = {
                ans1 : '1-2',
                ans2 : 'Score',
                ans3 : 'Text'
              }
              var _answerBasketball = $('<select name=answer[] id=answerBasketball' + boxes + ' hidden>');
              $.each(answerBasketball, function(val, text) {
                  _answerBasketball.append(
                  $('<option id=answertype' + boxes +'></option>').val(val).html(text)
                   );
               });
               
               var sats1=('<input type="text" name=team[] id=sats1' + boxes +  ' placeholder="sats1" />');
               var sats2=('<input type="text" name=team[] id=sats2' + boxes + ' placeholder="sats2"/>');

              $(container).append(_answerFootball);
              $(container).append(_answerBasketball);
              $(container).append(sats1);
              $(container).append(sats2);
              
              
              $('#main').after(container); // kontener div mainile külge
              
            }
            else {     
                
                $(container).append('<label>Reached the limit</label>'); 
                $('#addButton').attr('class', 'bt-disable'); 
                $('#addButton').attr('disabled', 'disabled');

            }
        });
        /*$('#answertype' + boxes).change(function(){
               if(('#answertype'+ boxes + ' ' + ' :selected').val()==valik2){
                  $(container).append('<input id=radioanswer' + boxes +  ' ' + 'value=Valikvastus'+'/>');
                  $('#main').after(container)*/
               
        
        $('#removeButton').click(function() {   //textboxi eemaldamine ühe kaupa.
            if (boxes != 0) { 
               $('#category' + boxes).remove();
               $('#answer'+ boxes).remove();
               $('#sats1'+boxes).remove();
               $('#sats2'+boxes).remove();

               
               /*if(($'#radioanswer' + boxes).length!=null){
                  $('#radioanswer' + boxes).remove();
               }*/
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
      $("#datepicker").datepicker("option", "dateFormat", "dd/mm");
                
      });

   
