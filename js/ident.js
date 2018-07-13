$('input[name=ident]').click(function() {
  $('#choix').animate({height: 'toggle'}, 'slow');
  $('#ident').animate({height: 'toggle'}, 'slow');
  if (document.querySelector('header').className == 'anim') {
    $('html, body').animate({scrollTop:0});
  }
});
