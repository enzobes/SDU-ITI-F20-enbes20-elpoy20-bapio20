function showUser(str) {
  //if (str=="") {
    //document.getElementById("txtHint").innerHTML="";
    //return;
  //}
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
        document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("POST", "contact/search", true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send("search="+str);
}
