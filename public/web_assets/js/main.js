(function($){
    $(document).ready(function() {
            const navbar = $('.cb__main-header, .cb__main-header-home');
            const stickyOffset = 1;
            let isSticky = false;
            
            $(window).scroll(function() {
                if ($(window).scrollTop() > stickyOffset) {
                    if (!isSticky) {
                        navbar.addClass('sticky').removeClass('sticky-remove')
                        isSticky = true;
                    }
                } else {
                    if (isSticky) {
                        navbar.addClass('sticky-remove');
                        setTimeout(() => {
                            navbar.removeClass('sticky sticky-remove')
                        }, 0);
                        isSticky = false;
                        }
                }});
            });
        
            var heroSwiper = new Swiper('.hero-container.swiper', {
                slidesPerView: 1,
                loop: true,
            })

    const swiper = new Swiper('.hero-container.swiper', {
        loop: true,
        autoplay: {
            delay: 5000, 
            disableOnInteraction: true, 
        },
        speed: 800,
        effect: 'slide',
    });

    $(".whatsapp-order-btn").on("click", function (e) {
        var serviceId = $(this).data("service-id");

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $.ajax({
            url: "/service/click",
            method: "POST",
            data: {
                service_id: serviceId,
            },
            success: function (response) {
                console.log("Click tracked successfully");
            },
            error: function (xhr) {
                console.error("Error tracking click");
            },
        });
    });

})(jQuery);