window.onload=function(){
  var vTable=document.querySelector(".viewvisitors");
  var btn= document.querySelector('#searchv');
  var httpRequest= new XMLHttpRequest();
  btn.addEventListener("click", function(element){
      element.preventDefault();
      var visitor=document.querySelector("#vsearch").value;
      var url = "vsearch.php?visitor="+visitor;
      httpRequest.onreadystatechange=loadTable;
      httpRequest.open('GET',url);
      httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      httpRequest.send('name=' + encodeURIComponent(visitor) );
    });

    function loadTable(){
      if (httpRequest.readyState === XMLHttpRequest.DONE){
        if (httpRequest.status===200){
          var response=httpRequest.responseText;
          vTable.innerHTML="";
          vTable.innerHTML=response;
        }else{
          console.log('Error. There was a problem with the request.')
        }
      }
    }
}