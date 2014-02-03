(function($moa) {

    "use strict";

    /**
     * @service http
     * @author Adam Timberlake
     * @module Moa
     */
    $moa.service('http', ['$q', '$http', function httpService($q, $http) {

        var service = {};

        /**
         * @property url
         * @type {String}
         */
        service.url = '../api/public/';

        /**
         * @method getAttribute
         * @param name {String}
         * @return {$q.promise}
         */
        service.getAttribute = function getAttribute(name) {
            return $http.get(service.url + 'attributes/' + name);
        };

        /**
         * @method getProduct
         * @param id {Number}
         * @return {$q.promise}
         */
        service.getProduct = function getProduct(id) {
            return $http.get(service.url + 'product/' + id);
        };

        /**
         * @method getBasket
         * @return {$q.promise}
         */
        service.getBasket = function getProduct() {
            return $http.get(service.url + 'basket');
        };

        /**
         * @method addBasket
         * @param id {Number}
         * @return {$q.promise}
         */
        service.addBasket = function addBasket(id) {
            return $http.get(service.url + 'basket/add/' + id);
        };

        return service;

    }]);

})(window.moaApp);