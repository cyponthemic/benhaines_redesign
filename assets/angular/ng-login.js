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

    ngCheckoutLoginController.$inject = ['$scope', '$http'];

    function ngCheckoutLoginController($scope, $http) {
        var clc = this;
        clc.test = 'zob';
        clc.emailChecked = false;
        clc.emailFormat =  /^[a-z]+[a-z0-9._]+@[a-z]+\.[a-z.]{2,5}$/;
        clc.isReturning = false;
        clc.isLoggedIn = false;
        clc.title = "Login/Register"
        clc.message = "Please enter your email address to continue to delivery and payment.";
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

                console.log('If', response);
                if (response.data === 'true'){
                    clc.emailChecked = true;
                    clc.isReturning = true;
                    console.log('Success: ', response, response.data === 'true');
                    clc.title = "Welcome Back";
                    clc.message = "Please enter your password to continue to delivery and payment.";
                }else{
                    console.log('Else', response, response.data === 'true');
                    clc.emailChecked = true;
                    clc.isReturning = false;
                    clc.title = "It looks like you are new here"
                    clc.message = "Please enter a password to create your account and continue to delivery and payment.";
                }
            }, function errorCallback(response) {
                // called asynchronously if an error occurs
                // or server returns response with an error status.
                console.log('Error', response);
                clc.emailChecked = true;
                clc.isReturning = false;
            });
        }
        clc.loginForm = function () {
            if(clc.isReturning) {
                $http({
                    method: 'POST',
                    url: 'http://localhost:8888/wp-git/wp-admin/admin-ajax.php',
                    params: {
                        'action': 'ajaxlogin', //calls wp_ajax_nopriv_ajaxlogin
                        'username': $('form#login #username').val(),
                        'password': $('form#login #password').val(),
                        'security': $('form#login #security').val()
                    },
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }).then(function successCallback(data) {
                    if (data.data.loggedin === true) {
                        console.log('success success', data, data.data.loggedin);
                        clc.isLoggedIn = true;
                        location.reload();
                    } else {
                        clc.message = "Wrong password";
                        console.log('success error', data, data.data.loggedin);
                    }
                }, function errorCallback(data) {
                    console.log('error: ', data);
                });
            }else{
                $http({
                    method: 'POST',
                    url: 'http://localhost:8888/wp-git/wp-admin/admin-ajax.php',
                    params: {
                        'action': 'ajaxregister', //calls wp_ajax_nopriv_ajaxlogin
                        'username': $('form#login #username').val(),
                        'password': $('form#login #password').val(),
                        'security': $('form#login #security').val()
                    },
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }).then(function successCallback(data) {
                    if (data.data.loggedin === true) {
                        console.log('success success', data, data.data.loggedin);
                        clc.isLoggedIn = true;
                        location.reload();
                    } else {
                        clc.title = "An error occured.";
                        clc.message = data.data.message;
                        console.log('success error', data, data.data.loggedin);
                    }
                }, function errorCallback(data) {
                    console.log('error: ', data);
                });
            }
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
            $(element).keydown(function (event) {
                if (event.keyCode == 13) {
                    event.preventDefault();
                    return false;
                }
            });
        }

        return directive;


    }

})();
//prevent form submit on enter
(function () {
    'use strict';

    // This helper adds a class that shows a loading state.
    angular
        .module('BH')
        .directive('loadingSpinner', loadingSpinner);

    loadingSpinner.$inject = ['$http'];

    function loadingSpinner($http) {
        var directive = {
            link: link,
            restrict: 'EA'
        };

        function link(scope, element, attrs) {
            console.log('spinner');

            scope.isLoading = function () {
                return $http.pendingRequests.length > 0;
            };

            scope.$watch(scope.isLoading, function (v)
            {
                if(v){
                    element.show();
                }else{
                    element.hide();
                }
            });
        }

        return directive;


    }

})();
