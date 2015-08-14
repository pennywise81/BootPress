(function() {
  "use strict";

  var resizeFooter = function() {
    var maxHeight = 0;

    var elements = document.querySelectorAll('footer.main .widget');
    Array.prototype.forEach.call(elements, function(el) {
      var tmpHeight = parseInt(getComputedStyle(el)['height'], 10);
      maxHeight = tmpHeight > maxHeight ? tmpHeight : maxHeight;
    });

    maxHeight += parseInt(getComputedStyle(document.querySelector('footer.main'))['padding-bottom'], 10);

    // document.querySelector('body').style.marginBottom = maxHeight + 'px';
    // TODO: schöner machen
    document.querySelector('body').style.marginBottom = (maxHeight + 10) + 'px';
    document.querySelector('footer.main').style.height = maxHeight + 'px';
  }

  var resetFooter = function() {
    // document.querySelector('body').style.marginBottom = 0;
    // TODO: schöner machen
    document.querySelector('body').style.marginBottom = '10px';
    document.querySelector('footer.main').style.height = 'auto';
  }

  enquire
    .register(
      "screen and (max-width: 991px)", {
        match : resetFooter
      }
    )
    .register(
      "screen and (min-width: 992px) and (max-width: 1199px)", {
        match : resizeFooter
      }
    )
    .register(
      "screen and (min-width: 1200px)", {
        match : resizeFooter
      }
    );

})();