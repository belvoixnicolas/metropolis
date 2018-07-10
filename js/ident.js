$('input[name=ident]').click(function() {
  $('#choix').animate({height: 'toggle'}, 'slow');
  $('#choix').animate({display: 'none'});
  document.getElementById('ident').style.display = 'block';

});
