var slideIndex = 0;

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("slide");
    // vsar dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}
    // for (i = 0; i < dots.length; i++) {
    //     dots[i].className = dots[i].className.replace(" active", "");
    // }

    slides[slideIndex-1].checked = true;
    // dots[slideIndex-1].className += " active";
}

function myFunction(x) {
    document.getElementById('login-popup-form').classList.toggle("login-popup-form-show");
    // x.classList.toggle("login-popup-form-show");
}

function displayNone(x) {
  for (var i=0; i<x.parentElement.getElementsByTagName("h3").length; i++) {
    x.parentElement.getElementsByTagName("h3")[i].classList.toggle("display-none");
  }

  console.log(x.parentElement.getElementsByTagName("h3")[0].classList.contains("display-none"));

  if (x.parentElement.getElementsByTagName("h3")[0].classList.contains("display-none")) {
    for (var i=0; i<x.parentElement.getElementsByTagName("table").length; i++) {
      x.parentElement.getElementsByTagName("table")[i].classList.add("display-none");
    }

    for (var i=0; i<x.parentElement.getElementsByTagName("p").length-1; i++) {
      x.parentElement.getElementsByTagName("p")[i].classList.add("display-none");
    }
  } else {
    for (var i=0; i<x.parentElement.getElementsByTagName("table").length; i++) {
      x.parentElement.getElementsByTagName("table")[i].classList.remove("display-none");
    }

    for (var i=0; i<x.parentElement.getElementsByTagName("p").length-1; i++) {
      x.parentElement.getElementsByTagName("p")[i].classList.remove("display-none");
    }
  }
}

function displayNoneSub(x) {
  for (var i=0; i<x.parentElement.getElementsByTagName("table").length; i++) {
    x.parentElement.getElementsByTagName("table")[i].classList.toggle("display-none");
  }

  for (var i=0; i<x.parentElement.getElementsByTagName("p").length-1; i++) {
    x.parentElement.getElementsByTagName("p")[i].classList.toggle("display-none");
  }
}

function displayNoneCard(x) {
  for (var i=0; i<x.parentElement.getElementsByClassName("card-row").length; i++) {
    x.parentElement.getElementsByClassName("card-row")[i].classList.toggle("display-none");
  }
  for (var i=0; i<x.parentElement.getElementsByClassName("no-cards").length; i++) {
    x.parentElement.getElementsByClassName("no-cards")[i].classList.toggle("display-none");
  }
}

function displayNoneCardTitle(x) {
  console.log(x.parentElement.getElementsByClassName("card-header"));
  for (var i=0; i<x.parentElement.getElementsByClassName("card-header").length; i++) {
    x.parentElement.getElementsByClassName("card-header")[i].classList.toggle("display-none");
  }
}

function selectArt(x) {
  if (x.getElementsByTagName("input")[1].value == "yes") {
    x.getElementsByTagName("input")[1].value = "no";
    x.classList.toggle("art-selected");
  } else {
    x.getElementsByTagName("input")[1].value = "yes";
    x.classList.toggle("art-selected");
  }
  console.log(x.getElementsByTagName("input")[1]);
}

function myLoadEvent() {
  // start
  var location = window.location.pathname.split('/');
  if (location[(location.length)-1] == '' || location[(location.length)-1] == 'auction'  || location[(location.length)-1] == 'artwork') {
    setInterval(showSlides, 5000);
  }
  // Block inspect element
  // https://stackoverflow.com/questions/28690564/is-it-possible-to-remove-inspect-element
  // document.addEventListener('contextmenu', function(e) {
  //   e.preventDefault();
  // });
  // document.onkeydown = function(e) {
  //   if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
  //    return false;
  //   }
  // }
}

document.addEventListener('DOMContentLoaded', myLoadEvent);
