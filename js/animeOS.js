/**
 * Created by Annabelle on 03/04/2019.
 */

'use strict';

(function ($){

    window.animate_theme = function() {

        var animatedElements = document.querySelectorAll(".motion" +
            "");

        var autoActiveElements = document.querySelectorAll(".autoActive" +
            "");
        
        var parallaxedElements = document.querySelectorAll(".parallaxed" +
        "");

        function scrollingMotion(init) {
            var ticking = false;
            var windowHeight = window.innerHeight;
            var windowWidth = window.innerWidth;

            if (!ticking) {

                var scrollTop = window.pageYOffset;
                for (var i = 0; i < animatedElements.length; i++) {

                    var el = animatedElements[i];
                    var elemRect = el.getBoundingClientRect();
                    var offset = 0.92;

                    if(el.classList.contains("offset-medium"))
                        offset = 0.5;

                    if (elemRect.top - (windowHeight * offset) < 0) {
                        el.classList.add('motion-animated');
                    } else {
                        if(!el.classList.contains("stay-active"))
                            el.classList.remove('motion-animated');
                    }
                }
                ;


                for (var i = 0; i < parallaxedElements.length; i++) {

                    var el = parallaxedElements[i];
                    var elemRect = el.getBoundingClientRect();

                    var state = elemRect.top - windowHeight - 80;

                    if (state < 0 && state > -windowHeight) {

                        var intermediate_state = windowHeight;
                        var percent_b_p = (-state / intermediate_state) * 100;

                        if (i == 0)
                            console.log("percent_b_p = " + percent_b_p);

                        el.style.transform = "translateY(" + (state / 6) + "px)";
                    } else {
                        el.classList.remove('motion-animate');
                    }
                }
                ;
                if (windowWidth < 780) {
                    for (var i = 0; i < autoActiveElements.length; i++) {

                        var el = autoActiveElements[i];
                        var elemRect = el.getBoundingClientRect();

                        if (elemRect.top - (windowHeight * 0.5) < 0 && elemRect.bottom - (windowHeight * 0.5) > 0) {
                            el.classList.add('active');
                        } else {
                            el.classList.remove('active');
                        }
                    }
                    ;
                }
                ticking = false;
            }
            ticking = true;
        }

        window.addEventListener('scroll', function () {
            scrollingMotion(false);
        });

        function onReadyDom()
        {
            scrollingMotion(false);
        }

        $(document).ready(function(){
            onReadyDom();
        });
    }

    animate_theme();


})(jQuery);
