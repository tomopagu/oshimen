var $ = require('jquery');

var verticallyCenter = function() {
    if ($(window).height() > $('body').height()) {
        $('.vertically-center').height($(window).height());
    }
}

module.exports = verticallyCenter;
