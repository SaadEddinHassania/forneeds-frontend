// map 
var MapsGoogle = function () {

    var mapMarker = function () {
        var map = new GMaps({
            div: '#gmap_marker',
           lat: 31.428077,
                lng: 34.380341,
        });
        map.addMarker({
           lat: 31.345427,
                lng: 34.30275,
            title: 'Project A',
            infoWindow: {
                content: 'Project A Details'
            }
        });
        map.addMarker({
            lat: 31.500702,
            lng: 34.466171,
            title: 'Project B',
            infoWindow: {
                content: 'Project B Details'
            }
        });
        map.setZoom(10);
    }


    return {
        //main function to initiate map samples
        init: function () {
            mapMarker();
        }

    };

}();

jQuery(document).ready(function() {
    MapsGoogle.init();
});

