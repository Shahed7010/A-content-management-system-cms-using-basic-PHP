function loadUsersOnline(){
$.get("functions.php?users=result", function(data){
   $(".usersonline").text(data); 
});
}
setInterval(function(){
    loadUsersOnline();
},1000);


