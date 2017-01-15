(function () {
    'use strict';

    // This helper adds a class that shows a loading state.
    angular
        .module('BH')
        .directive('ngCheckoutLogin', ngCheckoutLogin);

    ngCheckoutLogin.$inject = [];

    function ngCheckoutLogin() {
        var directive = {
            link: link,
            restrict: 'EA',
            controller: ngCheckoutLoginController,
            controllerAs: 'clc',
            bindToController: true
        };

        function link(scope, element, attrs) {
            console.log('ngCheckoutLoaded')
        }

        return directive;


    }
    ngCheckoutLoginController.$inject = ['$scope','$http'];

    function ngCheckoutLoginController($scope, $http) {
        var clc = this;
        clc.test = 'zob';
        clc.emailChecked = false;
        clc.isReturning = false;
        clc.checkAddress = function () {
            console.log('click');
            $http({
                method: 'POST',
                url: ajaxurl,
                params: {
                    'action': 'bh_check_email_address',
                    'email': clc.emailAddress
                }
            }).then(function successCallback(response) {
                // this callback will be called asynchronously
                // when the response is available
                console.log('Success: ',response);
                clc.emailChecked = true;
                clc.isReturning = true;
            }, function errorCallback(response) {
                // called asynchronously if an error occurs
                // or server returns response with an error status.
                console.log('Error',response);
                clc.emailChecked = true;
                clc.isReturning = false;
            });
        }
    }

})();

//prevent form submit on enter
(function () {
    'use strict';

    // This helper adds a class that shows a loading state.
    angular
        .module('BH')
        .directive('ngPreventFormOnEnter', ngPreventFormOnEnter);

    ngPreventFormOnEnter.$inject = [];

    function ngPreventFormOnEnter() {
        var directive = {
            link: link,
            restrict: 'EA'
        };

        function link(scope, element, attrs) {
            $(element).keydown(function(event){
                if(event.keyCode == 13) {
                    event.preventDefault();
                    return false;
                }
            });
        }

        return directive;


    }

})();