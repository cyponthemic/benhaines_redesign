(function () {
    'use strict';

    // This helper adds a class that shows a loading state.
    angular
        .module('BH')
        .directive('ngBilling', ngBilling);

    ngBilling.$inject = [];

    function ngBilling() {
        var directive = {
            link: link,
            restrict: 'A',
            controller: ngBillingController,
            controllerAs: 'blc',
            bindToController: true
        };
        function link(scope, element, attrs) {
            $('.flex-billing_gg_address').after(
                function () {
                    return '<div class="flex-field flex-field__display-address"><a class="" ng-click="blc.toggleFullAddress()"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;Enter your address manually</a></div>';
                }
            )
        }
        return directive;
    }

    ngBillingController.$inject = ['$scope', '$http', 'GoogleplaceService'];

    function ngBillingController($scope, $http, GoogleplaceService) {
        var blc = this;
        blc.company = false;
        blc.showAddress = false;
        blc.displayCompany = function(cond){
            blc.company = cond;
            console.log('c',cond, cond === true);
        };
        blc.fields ={

        };
        blc.address= {
        };
        blc.toggleFullAddress = function () {
            blc.showAddress = !blc.showAddress;
        };
        blc.setNames = function () {
            console.log('test');
                blc.fields.billing_first_name = blc.fields.billing_fullname.split(' ').slice(0, -1).join(' ');
                blc.fields.billing_last_name = blc.fields.billing_fullname.split(' ').slice(-1).join(' ');
        };
        blc.setAddress = function (args) {
            var place = args.getPlace();
            var componentForm = GoogleplaceService.componentFormSetting();
            console.log(place);
            for (var i = 0; i < place.address_components.length; i++) {
                var addressType = place.address_components[i].types[0];
                if (componentForm[addressType]) {
                    var val = place.address_components[i][componentForm[addressType]];
                    blc.address[addressType] = val;
                }
            }
            console.log(blc.address);
            $scope.$apply(function() {
                blc.showAddress= true;
                blc.fields.billing_address_1 = blc.address.street_number+" "+blc.address.route;
                blc.fields.billing_address_2  = blc.address.subpremise;
                blc.fields.billing_postcode  = blc.address.postal_code;
                blc.fields.billing_country  = 'AU';
                blc.fields.billing_city  = blc.address.locality;
                blc.address.administrative_area_level_1  = String(blc.address.administrative_area_level_1);
                //console.log(blc.address.administrative_area_level_1,"VIC",blc.address.administrative_area_level_1 === "VIC" );
                $("#billing_state").val(blc.address.administrative_area_level_1);

            });
        }
        // Watch for event from another module.
        $scope.$on('broadcast.google.updateAddress', function (event, args) {
            blc.setAddress(args);

        });
    }

})();