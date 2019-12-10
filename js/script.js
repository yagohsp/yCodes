var aText = new Array(
  "< yCodes />",
  "Bem Vindo",
  "DESGRAAAAÇA"
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
      setTimeout("typeDelete()", 100);
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


$(".feedback-button").click(() => {
  if (!$("#content").is(":visible")) {
    $(".user-form").slideToggle();
    $("#content").delay(500).slideToggle();
    $("#feedback-button").html("Voltar");
    
  }else{
    $("#content").slideToggle();
    $(".user-form").delay(500).slideToggle();
    $("#feedback-button").html("Feedback Anônimo");
  }
});


$(document).on('click', '#newComment', function(e){
  e.preventDefault(e);
  $.ajax({
    url: 'controller/commentController.php',
    type: 'POST',
    data: {
      'newComment': 'newComment',
      'comment': $("#comment").val()
    },
    success: function(data){
      $('.feedback-box').append("<div><span>" + data + "</span></div>");
      $("#commentForm")[0].reset();

      let elem = document.getElementById("feedback-box");
      elem.scrollBy({
        top: elem.scrollHeight, // Scroll the the end of the tabele's height
        behavior: 'smooth'
      });
    }
  });
});

$(document).on('click', '#userLogin', function(e){
  e.preventDefault();
  $.ajax({
    url: 'controller/userController.php',
    type: 'POST',
    data: {
      'userLogin': 'userLogin',
      'user': $("#user").val(),
      'pass': $("#pass").val()
    },
    success: function(data){
      if(data === "1"){
        $('#message').html("Logado com sucesso");
        $('#message').slideDown();
        $('#message').delay(2000).slideUp();
      }else{
        $('#message').html("Usuário incorreto");
        $('#message').slideDown();
        $('#message').delay(2000).slideUp();
      }
      $(".user-form")[0].reset();
    },
    error: function(data){
      $('#message').html("Erro");
      $('#message').slideDown();
      $('#message').delay(2000).slideUp();
      console.log(data);
    }
  });
});

$(document).on('click', '#userNew', function(e){
  e.preventDefault();
  $.ajax({
    url: 'controller/userController.php',
    type: 'POST',
    data: {
      'userNew': 'userNew',
      'user': $("#user").val(),
      'pass': $("#pass").val()
    },
    success: function(data){
      if(data === "1"){
        $('#message').html("Cadastrado com sucesso");
        $('#message').slideDown();
        $('#message').delay(2000).slideUp();
      }else{
        $('#message').html("Usuário já existe");
        $('#message').slideDown();
        $('#message').delay(2000).slideUp();
      }
      $(".user-form")[0].reset();
    }
  });
});



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