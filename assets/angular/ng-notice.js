(function () {
    'use strict';

    // This helper adds a class that shows a loading state.
    angular
        .module('BH')
        .directive('ngNotice', ngNotice);


    function ngNotice() {
        var directive = {
            link: link,
            restrict: 'A',
            controller: ngNoticeController,
            controllerAs: 'nc',
            bindToController: true
        };
        function link(scope, element, attrs, model) {
            console.log('notice loaded');
            var button = element.find('.button, a');
            $(button).addClass('hollow black').detach().appendTo(element);
            var closeButton = '<a class="js-notice-close"><i class="fa fa-close"></i></a>';
            $(element).append(closeButton);

            $('.js-notice-close').on('click',function () {
                killNotice(element);
            });
            $(element).detach().prependTo('body').css('display','flex');
            //.delay( 10000000 ).fadeOut( 400 ).remove();
        }
        function killNotice(notice) {
          console.log('click');
          $(notice).fadeOut( 400 ).remove();
          console.log('end');
        }
        return directive;
    }

    ngNoticeController.$inject = ['$scope'];

    function ngNoticeController($scope) {
        var nc = this;

    }
})();
