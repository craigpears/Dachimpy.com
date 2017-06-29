function initialise_carousels() {
    jQuery(function() {
        jQuery(".piracyCarousel").jMyCarousel({
            visible: '900px',
            speed: 80
        });
    });
    jQuery(function() {
        jQuery(".carousingCarousel").jMyCarousel({
            visible: '900px',
            speed: 80
        });
    });
    jQuery(function() {
        jQuery(".craftingCarousel").jMyCarousel({
            visible: '900px',
            speed: 80
        });
    });
}