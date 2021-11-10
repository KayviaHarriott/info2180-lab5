document.addEventListener('DOMContentLoaded', function() {
    //alert("Document loads");
    var form = document.querySelector('form');
    var textField = document.getElementById("country").value;
    //alert(textField2);

    document.getElementById("lookup").addEventListener("click", function(event){
    event.preventDefault()
    
    search();

    

    });

    function search(){
        var xmlhttp = new XMLHttpRequest();
        var textField = document.getElementById("country").value;
        xmlhttp.onreadystatechange = function() {

                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    if (xmlhttp.responseText != "Superhero not found"){
                        document.getElementById("result").innerHTML = xmlhttp.responseText; 
                        
                    }
                    
                }
                else{
                    document.getElementById("result").innerHTML = xmlhttp.responseText;
                }
        };
        xmlhttp.open("GET", "world.php?a=" + textField, true);
        xmlhttp.send();
    }

     
   

});
