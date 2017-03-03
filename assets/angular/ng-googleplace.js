(function () {
    'use strict';

    // This helper adds a class that shows a loading state.
    angular
        .module('BH')
        .directive('ngGoogleplace', ngGoogleplace);

    ngGoogleplace.$inject = ['GoogleplaceService'];

    function ngGoogleplace(GoogleplaceService) {
        var directive = {
            link: link,
            restrict: 'A',
            controller: ngGoogleplaceController,
            controllerAs: 'gc',
            bindToController: true
        };
        function link(scope, element, attrs, model) {


            var options = {
                types: [],
                componentRestrictions: {
                    'country': 'au'
                }
            };
            var autocomplete = new google.maps.places.Autocomplete(element[0], options);
            $(document).on('keydown', element[0], function(e) {
                if (e.which == 13) {
                    $(element[0]).show();
                    return false;
                }
            });
            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                //var place = autocomplete.getPlace();
                GoogleplaceService.updateAddress(autocomplete);
            });

            scope.$on('broadcast.google.setBounds', function (event, args) {
                autocomplete.setBounds(args);
            });


        }
        return directive;
    }

    ngGoogleplaceController.$inject = ['$scope', '$http','GoogleplaceService'];

    function ngGoogleplaceController($scope, $http,GoogleplaceService) {
        var gc = this;

        gc.geolocate = function () {
            // Bias the autocomplete object to the user's geographical location,
            // as supplied by the browser's 'navigator.geolocation' object.
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var geolocation = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    var circle = new google.maps.Circle({
                        center: geolocation,
                        radius: position.coords.accuracy
                    });
                    GoogleplaceService.setBounds(circle.getBounds());
                });
            }
        };
        
        // Watch for event from another module.
        $scope.$on('broadcast.google.updateAddress', function (event, args) {

        });
    }
})();
