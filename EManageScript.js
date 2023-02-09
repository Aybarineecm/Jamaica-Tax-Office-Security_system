window.onload= function(){
  var addbtn = document.getElementById("addbtn")
  var delbtn = document.getElementById("delbtn")
  var editbtn = document.getElementById("editbtn")

  var addform= document.getElementById("addform")
  var delform= document.getElementById("delform")
  var editform= document.getElementById("editform")

  document.getElementById("datebefore").valueAsDate = new Date();

  addbtn.addEventListener("click", function(){
    addform.style.display="block"
    delform.style.display="none"
    editform.style.display="none"
  })

  delbtn.addEventListener("click", function(){
    addform.style.display="none"
    delform.style.display="block"
    editform.style.display="none"
  })

  editbtn.addEventListener("click", function(){
    addform.style.display="none"
    delform.style.display="none"
    editform.style.display="block"
  })
}