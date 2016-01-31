var $ = require('jquery');

var verticallyCenter = function() {
    $('.vertically-center').height($(window).height() - 60);
}

module.exports = verticallyCenter;