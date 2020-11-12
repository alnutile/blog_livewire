
require('./bootstrap');
import 'bootstrap';

  if ($('div.testimonies')) {
    var how_many = $('div.testimonies blockquote').length;
    var random_quote = Math.floor(Math.random() * how_many);
    $('.testimonies blockquote').hide();
    $('.testimonies blockquote').eq(random_quote).fadeIn();
  }