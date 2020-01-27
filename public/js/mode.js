var tema = document.getElementById('tema');
var cuerpo = document.getElementById('body');
var destacadoscarrouselback = document.getElementById('destacadoscarrouselback');
var destacadoscarrousel = document.getElementById('destacadoscarrousel');
var linkproductos = document.getElementById('linkproductos');
var rowIndex = document.getElementById('rowIndex');
var cardDestacados = document.getElementById('cardDestacados');
var cardtext = document.getElementById('card-text');
var theme = document.getElementById('result');
var cards = document.querySelectorAll('.card');
var btns = document.querySelectorAll('.btn');
var cardnumbers = document.querySelectorAll('h4');
var cartitles = document.querySelectorAll('h5');
var cartitles = document.querySelectorAll('h5');
var rowno = document.querySelectorAll('div#rownog');
var navbar = document.querySelector('#navbar');
var footer = document.querySelector('#rowfooter');
var dropdown = document.querySelector('.navbar-nav>li>.dropdown-menu');



storagetheme = localStorage.getItem("storagetheme");


rowno.forEach(function(rownog) {
  if(storagetheme == 'oscuro'){
  result.innerHTML += 'oscuro';
  $(rownog).addClass( "black" );
  }else{result.innerHTML += 'claro'}
});

rowno.forEach(function(rownog) {
  $(tema).click(function() {
    $( rownog ).toggleClass( "black" );
    revisartema();
  });
});

cartitles.forEach(function(h5) {
  if(storagetheme == 'oscuro'){
  result.innerHTML += 'oscuro';
  $(h5).addClass( "black" );
  }else{result.innerHTML += 'claro'}
});

cartitles.forEach(function(h5) {
  $(tema).click(function() {
    $( h5 ).toggleClass( "black" );
    revisartema();
  });
});

cardnumbers.forEach(function(h4) {
  if(storagetheme == 'oscuro'){
  result.innerHTML += 'oscuro';
  $(h4).addClass( "black" );
  }else{result.innerHTML += 'claro'}
});

cardnumbers.forEach(function(h4) {
  $(tema).click(function() {
    $( h4 ).toggleClass( "black" );
    revisartema();
  });
});


cards.forEach(function(card) {
  if(storagetheme == 'oscuro'){
  result.innerHTML += 'oscuro';
  $(card).addClass( "black" );
  }else{result.innerHTML += 'claro'}
});

cards.forEach(function(card) {
  $(tema).click(function() {
    $( card ).toggleClass( "black" );
    revisartema();
  });
});

btns.forEach(function(btn) {
  if(storagetheme == 'oscuro'){
  result.innerHTML += 'oscuro';
  $( btn ).addClass( "black" );
  }else{result.innerHTML += 'claro'}
});

btns.forEach(function(btn) {
  $(tema).click(function() {
    $( btn ).toggleClass( "black" );
    revisartema();
  });
});



if(storagetheme == 'oscuro'){
result.innerHTML += 'oscuro';
$(cuerpo).addClass( "black" );
}else{result.innerHTML += 'claro'}


$(tema).click(function() {
  $( cuerpo ).toggleClass( "black" );
  revisartema();
});


if(storagetheme == 'oscuro'){
result.innerHTML += 'oscuro';
$(navbar).addClass( "black" );
}else{result.innerHTML += 'claro'}


$(tema).click(function() {
  $( navbar ).toggleClass( "black" );
  revisartema();
});

if(storagetheme == 'oscuro'){
result.innerHTML += 'oscuro';
$(footer).addClass( "black" );
}else{result.innerHTML += 'claro'}


$(tema).click(function() {
  $( footer ).toggleClass( "black" );
  revisartema();
});

if(storagetheme == 'oscuro'){
result.innerHTML += 'oscuro';
$(dropdown).addClass( "black" );
}else{result.innerHTML += 'claro'}


$(tema).click(function() {
  $( dropdown ).toggleClass( "black" );
  revisartema();
});

function revisartema(){
storagetheme = localStorage.getItem("storagetheme");
if(storagetheme == 'oscuro'){
    localStorage.setItem("storagetheme", "claro");
    result.innerHTML = 'cala';
    return false;
}
if(storagetheme == 'claro'){
    localStorage.setItem("storagetheme", "oscuro");
}
if(storagetheme == null){
    localStorage.setItem("storagetheme", "oscuro");
}
    result.innerHTML = 'oscuro';

}
