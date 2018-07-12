var homme = document.querySelector('.h');
var femme = document.querySelector('.f');

$('.h').click(function() {
  homme.classList.add('selectgenre');
  femme.classList.remove('selectgenre');
});

$('.f').click(function() {
  femme.classList.add('selectgenre');
  homme.classList.remove('selectgenre');
});
