var $ = require('jquery');

var verticallyCenter = function() {
    $('.vertically-center').height($(window).height());
}

module.exports = verticallyCenter;
