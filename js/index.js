$(document).ready(function() { 

    //Day counter
    // Read from the id date on index.html and get the difference.
    const date = document.getElementById("date");
    const day = date.innerHTML.split(" ")[0];

    var examinationDate = new Date("06/" + day.toString() + "/2022");
    var today = new Date();

    var msBetween = examinationDate.getTime() - today.getTime();
    
    var delta_days = Math.ceil(msBetween / (1000 * 3600 * 24));

    const counter = document.getElementById("countdown");
    counter.innerHTML = delta_days;


});


