(function () {
    'use strict';

    angular
        .module('BH')
        .factory('GoogleplaceService', GoogleplaceService);

    GoogleplaceService.$inject = ['$rootScope', '$location', '$filter'];

    function GoogleplaceService($rootScope, $location, $filter) {
        var params = {};

        // Expose to application.
        var service = {
            updateAddress: updateAddress,
            setBounds: setBounds,
            componentFormSetting: componentFormSetting
        };

        return service;

        // **************************************
        // Start of functions.
        // **************************************
        function componentFormSetting() {
            var componentForm = {
                subpremise: 'short_name',
                street_number: 'short_name',
                route: 'long_name',
                locality: 'long_name',
                administrative_area_level_1: 'short_name',
                country: 'short_name',
                postal_code: 'short_name'
            };
            return componentForm;
        }

        function setBounds(options) {
            $rootScope.$broadcast('broadcast.google.setBounds', options);
        }
        function updateAddress(options) {
            $rootScope.$broadcast('broadcast.google.updateAddress', options);
        }


        //**********************************
        // Private functions
        // *********************************

        // Combine all filters into one query string.


    }
})();