
document.addEventListener("DOMContentLoaded", function(){
    //dom is fully loaded, but maybe waiting on images & css files
    var d = new Date();
    var year = d.getFullYear();
    var monthn = d.getMonth();
    var month;
    var monthday = d.getDate();
    var dayn = d.getDay();
    var day;

    //alert(dayn);

switch (monthn){
    case 0:
    month = "januari";
    break;
    case 1:
    month = "februari";
    break;
    case 2:
    month = "maart";
    break;
    case 3:
    month = "april";
    break;
    case 4:
    month = "mei";
    break;
    case 5:
    month = "juni";
    break;
    case 6:
    month = "juli";
    break;
    case 7:
    month = "augustus";
    break;
    case 8:
    month = "september";
    break;
    case 9:
    month = "oktober";
    break;
    case 10:
    month = "november";
    break;
    case 11:
    month = "december";
    break;
}

switch (dayn) {
    case 0:
    day = "zondag";
    break; 
    case 1:
    day = "maandag";
    break;
    case 2:
    day = "dinsdag";
    break;
    case 3:
    day = "woensdag";
    break;
    case 4:
    day = "donderdag";
    break;
    case 5:
    day = "vrijdag";
    break;
    case 6:
    day = "zaterdag";
    break;          
}
    
    document.getElementById("day").innerHTML = day;
    document.getElementById("month").innerHTML = month;
    document.getElementById("monthday").innerHTML = monthday;
    document.getElementById("year").innerHTML = year;
});