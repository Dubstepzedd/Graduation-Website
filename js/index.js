$(document).ready(function() { 
    
    //Day counter
    // Read from the id date on index.html and get the difference.
    const date = document.getElementById("date");
    // We get the day from the innerHTML.
    const day = date.innerHTML.split(" ")[2];

    var examinationDate = new Date("06/" + day.toString() + "/2022");
    var today = new Date();
    today.setHours(0,0,0,0);
    var msBetween = examinationDate - today;
    
    var delta_days = Math.ceil(msBetween / (1000 * 60 *60 * 24));
    var counter = document.getElementById("countdown");
    counter.innerHTML = delta_days;


});

setTimeout(() => {
    $("#successful-header").slideUp(function() {
      $("#successful-header").remove();
    });
    
  },3000);