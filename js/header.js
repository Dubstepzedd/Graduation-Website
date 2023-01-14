// Switch Action class.

// Menu icon rotation function
function changeIcon(el) {

    const icon = el.children[0];
    var rotation = getCurrentRotation(icon);

    rotation += 90;

    //Make the button not clickable for a moment in order to avoid a bug.
    el.style.pointerEvents = "none";
    setTimeout( function(){
        el.style.pointerEvents = "auto";
    },350);

    icon.style.transform  = "rotate(" + rotation.toString() +"deg)";
 
}

function getCurrentRotation(el){
    var st = window.getComputedStyle(el, null);
    var tm = st.getPropertyValue("-webkit-transform") ||
             st.getPropertyValue("-moz-transform") ||
             st.getPropertyValue("-ms-transform") ||
             st.getPropertyValue("-o-transform") ||
             st.getPropertyValue("transform") ||
             "none";
    if (tm != "none") {
      var values = tm.split('(')[1].split(')')[0].split(',');
      var angle = Math.round(Math.atan2(values[1],values[0]) * (180/Math.PI));
      return (angle < 0 ? angle + 360 : angle); //adding 360 degrees here when angle < 0 is equivalent to adding (2 * Math.PI) radians before
    }
    return 0;
  }

// Scroll functions

$(window).scroll(function() {
    
    tryTransparentBackground();

});

function tryTransparentBackground() {
    const header = document.getElementById("menu");
    const hamburgerMenu = document.getElementById("collapse-icon");
    if(window.scrollY > 10) {
        hamburgerMenu.style.color = "#022";
        header.classList.remove("background-top");
        header.classList.add("background-normal");
    }
    else {
        hamburgerMenu.style.color = "white";
        header.classList.remove("background-normal");
        header.classList.add("background-top");
    }
}


