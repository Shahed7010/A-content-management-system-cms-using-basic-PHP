function loadUserOnline(){
$.get("admin_functions.php?users=result", function(data){
   $(".usersonline").text(data); 
});
}
setInterval(function(){
    loadUserOnline();
},1000);


tinymce.init({selector:'textarea'});
$(document).ready(function(){
   $('#selectAllCheckbox').click(function(event){
       if(this.checked){
           $('.checkBoxes').each(function(){
               this.checked=true;
           });
       }else{
           $('.checkBoxes').each(function(){
               this.checked=false;
           });
       }
   }); 
});

