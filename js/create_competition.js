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
                  cat1 : 'Jalgpall'
               };
               var _category = $('<select id=category' + boxes +'>');
               $.each(category, function(val, text) {
                  _category.append(
                  $('<option id=categorytype' + boxes +'></option>').val(val).html(text)
                   );
               });

               $(container).append(_category);

              
                //dropdown menu tegemine
                var answer = {
                  ans1 : '1-2'
               };
               var _answer = $('<select id=answer' + boxes +'>');
               $.each(answer, function(val, text) {
                  _answer.append(
                  $('<option id=answertype' + boxes +'></option>').val(val).html(text)
                   );
               });
               var sats1=('<input type="text" id=sats1' + boxes +  ' placeholder="sats1" />');
               var sats2=('<input type="text" id=sats2' + boxes + ' placeholder="sats2"/>');
               var hidden=('<input  value='+boxes+'placeholder='+boxes+' id="hidden"/>');

               

                $(container).append(_answer);
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
       
    });

   
