
function validateWenk(){

    var wenk = document.forms["wenken"]["wenk"].value;

    if (wenk == "") {
        alert("Vergeten iets in te voeren?");
        return false;
      }

      if(wenk.length >= 100){
        alert("Een beetje te lang, probeer minder dan honderd letters.");
        return false;
      }



}


function validateBlogPost(){

    var title = document.forms["blogposts"]["title"].value;
    var content = document.forms["blogposts"]["content"].value;

    if(content == ""){
        alert("Vergeten een post in te voeren?");
        return false;
    }

    if(title == ""){
        alert("Vergeten een title in te voeren?");
        return false;
    }


    //maximale lengte bedenken
    //vraag naar JJ/Tabe
    if(content.length >= 4000){
        alert("Die post is te lang, probeer minder dan 4000 tekens.");
        return false;
    }

    if(title.length >= 100){
        alert("Die title is te lang, probeer minder dan honderd tekens.");
        return false;
    }

}