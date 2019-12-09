var aText = new Array(
  "< yCodes />",
  "Bem Vindo"
);
var iSpeed = 100;
var iIndex = 0;
var iArrLength = aText[0].length;
var iTextPos = 0;
var sContents = '';
var destination = document.getElementById("typing");
var y = 0;


function typeDelete() {
  if (y <= 3) {
      y++;
      if (destination.innerHTML.substr(destination.innerHTML.length - 1) === "|") {
          destination.innerHTML = destination.innerHTML.substr(0, destination.innerHTML.length - 1);
          setTimeout("typeDelete()", 500);
      } else {
          destination.innerHTML += "|";
          setTimeout("typeDelete()", 500);
      }
  } else {
      if (destination.innerText.length > 0) {
          destination.innerHTML = destination.innerText.substr(0, destination.innerText.length - 1);
          setTimeout("typeDelete()", 200);
      } else {
          if (iIndex < aText.length - 1) {
              iIndex++;
          } else {
              iIndex = 0;
          }
          y = 0;
          typeWrite();
      }
  }
}

function typeWrite() {
  sContents = ' ';
  destination.innerHTML = sContents + aText[iIndex].substring(0, iTextPos) + " |";
  if (iTextPos++ == iArrLength) {
      iTextPos = 0;
      typeDelete();
  } else {
      setTimeout("typeWrite()", iSpeed);
  }
}
setTimeout(typeWrite(), iSpeed);





$('.feedback-button').click(() => {
  if (!$("#content").is(":visible")) {
    $('.login-form').slideUp(() => {
      $("#content").hide().load("feedback.php").delay(100).slideDown();
    });
  }

});

$("#commentForm").submit(function (e) {
  e.preventDefault();
  $.ajax({
    type: 'POST',
    url: 'controller/commentController.php',
    data: $('#commentForm').serialize(),
    success: function (data) {
      $('.feedback-box').append("<div><span>" + data + "</span></div>");
      $("#commentForm")[0].reset();

      let elem = document.getElementById("feedback-box");
      elem.scrollBy({
        top: elem.scrollHeight, // Scroll the the end of the tabele's height
        behavior: 'smooth'
      });

    },
    error: function () {
      console.log("Signup was unsuccessful");
    }
  });
})









// SQUARES

var ulSquares = document.querySelector("ul.squares");

var random = (min, max) => Math.random() * (max - min) + min;

function newSquare() {
  let li = "";
  const size = Math.floor(random(10, 120));
  const position = random(1, 99);
  const duration = random(3, 10);

  if (random(1, 100) >= 98) {
    li = document.createElement("h1");
    li.innerHTML = "yCodes";
    li.style.transform = 'rotate(90deg)';

  } else {
    li = document.createElement("li");
    li.style.width = `${size}px`;
    li.style.height = `${size}px`;
  }

  li.style.bottom = `-${size}px`;
  li.style.left = `${position}%`;
  li.style.animationDuration = `${duration}s`;
  li.style.zIndex = "-1";


  ulSquares.appendChild(li);
  li.addEventListener("animationend", event => {
    ulSquares.removeChild(event.currentTarget);
    newSquare();
  })
}

for (let i = 0; i < 15; i++) {
  const li = document.createElement("li");

  const size = Math.floor(random(10, 120));
  const position = random(1, 99);
  const delay = random(0.1, 5);
  const duration = random(3, 10);

  li.style.width = `${size}px`;
  li.style.height = `${size}px`;
  li.style.bottom = `-${size}px`;
  li.style.left = `${position}%`;
  li.style.animationDelay = `${delay}s`;
  li.style.animationDuration = `${duration}s`;
  li.style.zIndex = "-1";

  ulSquares.appendChild(li);

  li.addEventListener("animationend", event => {
    ulSquares.removeChild(event.currentTarget);
    newSquare();
  })
}