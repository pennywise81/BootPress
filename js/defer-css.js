(function() {
  "use strict";

  // @TODO: improve like on https://plus.google.com/+PaulIrish/posts/Ahn8VkC36nM
  var link = document.createElement("link");
  link.href = config.templateUrl + "/style.css";
  link.type = "text/css";
  link.rel = "stylesheet";
  link.media = "screen,print";

  document.getElementsByTagName("head")[0].appendChild(link);
})();