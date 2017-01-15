(function () {
    'use strict';

    // This helper adds a class that shows a loading state.
    angular
        .module('BH')
        .directive('ngCheckoutLogin', ngCheckoutLogin);

    ngCheckoutLogin.$inject = ['$timeout'];

    function ngCheckoutLogin($timeout) {
        var directive = {
            link: link,
            restrict: 'A',
            scope: {
                buttonScope: '=',
                remaining: '=results'
            }
        };

        function link(scope, element, attrs) {
            jQuery(document).ready(function($) {

                var data = {
                    'action': 'bh_check_email_address',
                    'whatever': 'import'
                };

                // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
                jQuery.post(ajaxurl, data, function(response) {
                    console.log('Got this from the server: ' + response);
                });
            });
        }

        return directive;
    }


})();
