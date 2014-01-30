(function($mao) {

    "use strict";

    /**
     * @controller ApplicationController
     * @author Adam Timberlake
     * @module Mao
     */
    $mao.controller('ApplicationController', ['$scope',

    function applicationController($scope) {

        /**
         * @property filtersOpen
         * @type {Boolean}
         * @default false
         */
        $scope.filtersOpen = false;

        /**
         * @property modalOpen
         * @type {Boolean}
         * @default false
         */
        $scope.modalOpen = false;

        /**
         * @method keyUp
         * @param event {Object}
         * @return {void}
         */
        $scope.keyUp = function keyUp(event) {
//            console.log('Close?');
        };
        
    }]);

})(window.maoApp);