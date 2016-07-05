
$(window).bind(' load resize orientationChange ', function () {
   var footer = $("#footer-container");
   var pos = footer.position();
   var height = $(window).height();
   height = height - pos.top;
   height = height - footer.height() -1;

   function stickyFooter() {
     footer.css({
         'margin-top': height + 'px'
     });
   }

   if (height > 0) {
     stickyFooter();
   }
});

var stickySidebar = $('.sticky-sidebar');

if (stickySidebar.length > 0) {
    var stickyHeight = stickySidebar.height(),
        sidebarTop = stickySidebar.offset().top;
}

// on scroll move the sidebar
$(window).scroll(function () {
    if (stickySidebar.length > 0 && $(window).width() > 767) {
        var scrollTop = $(window).scrollTop();

        if (sidebarTop < scrollTop) {
            stickySidebar.css('top', scrollTop - sidebarTop);

            // stop the sticky sidebar at the footer to avoid overlapping
            var sidebarBottom = stickySidebar.offset().top + stickyHeight,
                stickyStop = $('#page').offset().top + $('#page').height();
            if (stickyStop < sidebarBottom) {
                var stopPosition = $('.main-content').height() - stickyHeight;
                stickySidebar.css('top', stopPosition);
            }
        }
        else {
            stickySidebar.css('top', '0');
        }
    }
});

$(window).resize(function () {
    if (stickySidebar.length > 0) {
        stickyHeight = stickySidebar.height();
    }
});