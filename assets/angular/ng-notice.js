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
            var overlay = '<div class="js-notice-exit"></div>';
            $(element).after(overlay);
            var button = element.find('.button.wc-forward');
            $(button).detach().appendTo(element);
            var closeButton = '<a class="js-notice-close"><i class="fa fa-close"></i></a>';
            $(element).append(closeButton);

            $('.js-notice-close,.js-notice-exit').on('click',function () {
                console.log('click');
                $(element).remove();
                $('.js-notice-close,.js-notice-exit').remove();
            });
        }
        return directive;
    }

    ngNoticeController.$inject = ['$scope'];

    function ngNoticeController($scope) {
        var nc = this;

    }
})();
