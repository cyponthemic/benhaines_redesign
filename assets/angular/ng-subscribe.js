(function () {
    'use strict';

    // This helper adds a class that shows a loading state.
    angular
        .module('BH')
        .directive('ngSubscribe', ngSubscribe);

    ngSubscribe.$inject = [];

    function ngSubscribe() {
        var directive = {
            link: link,
            restrict: 'EA',
            controller: ngSubscribeController,
            controllerAs: 'csb',
            bindToController: true
        };
        function link(scope, element, attrs) {
					console.log('ng-subscribe');
        }
        return directive;
    }

    ngSubscribeController.$inject = ['$scope', '$http'];

    function ngSubscribeController($scope, $http) {
        var csb = this;
				csb.loading = false;
        csb.emailChecked = false;
				csb.isSubscriber = null;
				csb.confrimForm = false;
				csb.confirmError = false;
        csb.title = "Login/Register";
        csb.message = "This section is for subscribers only, please enter your email address";
        csb.state = true;
        csb.checkAddress = function () {
					csb.loading = true;
            $http({
                method: 'GET',
                url: ajaxurl,
                params: {
                    'action': 'bh_check_subscriber',
                    'email': csb.emailAddress
                }
            }).then(function successCallback(response) {
									console.log(response);
									csb.emailChecked = true;
									csb.isSubscriber = response.data;
									csb.loading = false;
            }, function errorCallback(response) {
                // called asynchronously if an error occurs
                // or server returns response with an error status.
                console.log('Error', response);
            });
        }
        csb.checkConfirmation = function () {
					csb.confirmError = false;
					csb.loading = true;
            $http({
                method: 'GET',
                url: ajaxurl,
                params: {
                    'action': 'bh_check_subscriber',
                    'email': csb.emailAddress
                }
            }).then(function successCallback(response) {
									console.log(response);
									csb.loading = false;csb.loading = false;
									if(response.data) {
										csb.emailChecked = true;
										csb.isSubscriber = response.data;
									} else {
										csb.confirmError = true;
									}

            }, function errorCallback(response) {
                // called asynchronously if an error occurs
                // or server returns response with an error status.
                console.log('Error', response);
            });
        }
        csb.subscribe = function () {
					csb.loading = true;
            $http({
                method: 'GET',
                url: ajaxurl,
                params: {
                    'action': 'bh_add_subscriber',
                    'email': csb.emailAddress
                }
            }).then(function successCallback(response) {
									console.log(response);
									csb.confrimForm = true;
									csb.loading = false;

            }, function errorCallback(response) {
                // called asynchronously if an error occurs
                // or server returns response with an error status.
                console.log('Error', response);
            });
        }
    }

})();
