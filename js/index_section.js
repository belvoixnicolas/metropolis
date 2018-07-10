$('button[name=description]').click(function() {
  if (visible == 'contact') {
    visible = 'description';
    document.getElementsByClassName('contact')[0].style.display = 'none';
    document.getElementsByClassName('description')[0].style.display = 'block';
  }
});

$('button[name=contact]').click(function() {
  if (visible == 'description') {
    visible = 'contact';
    document.getElementsByClassName('description')[0].style.display = 'none';
    document.getElementsByClassName('contact')[0].style.display = 'block';
  }
});

var visible = 'description';
