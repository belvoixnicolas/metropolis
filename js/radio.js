$('.h').click(function() {
  document.querySelector('.h').classList.add('selectgenre');
  document.querySelector('.f').classList.remove('selectgenre');
});

$('.f').click(function() {
  document.querySelector('.f').classList.add('selectgenre');
  document.querySelector('.h').classList.remove('selectgenre');
});
