
$(window).scroll(function() {

  scrollDistance = $(window).scrollTop() + $(window).height();
  footerDistance = $('.footer').offset().top;

  if (scrollDistance >= footerDistance) {

    alert('load');

    if($('#mode').val()=='jobs'){
      $('#mode').val('wait');
       loadjobs();
    }

    if($('#mode').val()=='myjobs'){
      $('#mode').val('wait');
      loadmyjobs();
    }

    if($('#mode').val()=='search' || $('#mode').val()=='search-myjobs'){
      $('#mode').val('wait');
      loadsearch();
    }

  }
});


function jobs(){
  $('#page').val(1);
  $('#mode').val('wait');
  $('.searchresults').empty();
  loadjobs();
}

function myjobs(){
 $('#page').val(1);
 $('#mode').val('wait');
 $('.searchresults').empty();
 loadmyjobs();
}

  function loadjobs() {
   $('.loading').attr('style','');
   var page = $('#page').val();
  $.ajax({
      url : '/listings?page=' + page,
      dataType: 'json',
  }).done(function (data) {
      $('.searchresults').append(data);
      $('.loading').attr('style','display: none;');
      $('.masonry').masonry( 'reloadItems' );
      $('.masonry').masonry( 'layout' );
      $('.masonry').isotope( 'reloadItems' );
      $('.masonry').isotope( 'layout' );
      $('.masonry').masonry();
      $('#page').val(parseInt($('#page').val())+1);

        if (data == ""){
          $('#mode').val('nomore');
        }else{
          $('#mode').val('jobs');
        }

  }).fail(function () {
      alert('Posts could not be loaded.');
  });
}

function loadmyjobs() {
$('.loading').attr('style','');
var page = $('#page').val();
$.ajax({
  url : '/listings?mode=myjobs&page=' + page,
  dataType: 'json',
}).done(function (data) {
  $('.searchresults').append(data);
  $('.loading').attr('style','display: none;');
  $('.masonry').masonry( 'reloadItems' );
  $('.masonry').masonry( 'layout' );
  $('.masonry').isotope( 'reloadItems' );
  $('.masonry').isotope( 'layout' );
  $('.masonry').masonry();
  $('#page').val(parseInt($('#page').val())+1);

    if (data == ""){
      $('#mode').val('nomore');
    }else{
      $('#mode').val('myjobs');
    }

}).fail(function () {
  alert('Posts could not be loaded.');
});
}
