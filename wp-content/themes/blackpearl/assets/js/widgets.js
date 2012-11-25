(function ($) {


    /***** Twitter Widget ******/

    function Twitter_Widget() {
       
        $('.widget_bp_twitter_widget').each(function () {
            var $widget = $(this),
                $list   = $widget.find('.twitter_update_list'),
                $items  = $list.find('li'),
                $next   = $widget.find('.arrow_next'),
                $prev   = $widget.find('.arrow_previous');

            if (!$widget.length || !$items.length)
                return;

            $list.css({ position: 'relative', overflow: 'hidden' });

            $items.each(function (i) {
                var $item = $(this);

                $item.css({ position: 'absolute', width: $item.parent().width(), top: 0, left: i * $item.parent().width() });
            });

            $items.eq(0).addClass('current');
            $list.height($items.eq(0).height());

            //Arrow keys
            $next.click(function (e) {
                e.preventDefault();

                var curIndx = $items.filter('.current').index(),
                    nextIndx = curIndx + 1;

                if (nextIndx >= $items.length)
                    nextIndx = 0;


                GoTo(nextIndx);
            });

            $prev.click(function (e) {
                e.preventDefault();

                var curIndx = $items.filter('.current').index(),
                    nextIndx = curIndx - 1;

                if (nextIndx < 0)
                    nextIndx = $items.length - 1;


                GoTo(nextIndx);
            });

            function GoTo(indx) {
                var width = $list.width(),
                    $nextItem = $items.eq(indx);

                $items.removeClass('current');
                $nextItem.addClass('current');

                $list.stop().animate({ height: $nextItem.height() }, { speed: 300 });

                $items.each(function (i) {
                    var $item = $(this);

                    $item.stop().animate({ left: (i - indx) * width }, { speed: 300 });
                });

            }

            //Handle resize event
            var resizeTimerId = 0;

            $(window).resize(function () {
                clearTimeout(resizeTimerId);

                resizeTimerId = setTimeout(function () {

                    var $curItem = $items.filter('.current'),
                        curIndx = $curItem.index();

                    $items.each(function (i) {
                        var $item = $(this);

                        $item.css({ width: $item.parent().width(), left: (i - curIndx) * $item.parent().width() });
                    });

                    //Change parent height
                    $list.stop().animate({ height: $curItem.height() }, { speed: 300 });
                }, 100);
            });
        });//End loop


    }

    /***** Flickr Widget ******/

    function Flickr_Widget() {
       
        $('.widget_bp_flickr_widget .flickr_container').each(function () {
            var $this = $(this);

            //Detect loading of images
            var intID = setInterval(function () {
                var $links = $this.find('.flickr_badge_image a');

                if (!$links.length)
                    return;

                var $flickrHover = $('<img class="hover_image" height="75" width="75" src="' + theme_uri.img + '/flickr_hover.png" />');
                $flickrHover.css('opacity', 0);

                //Add hover image to each anchor tag
                $links.append($flickrHover)
                .hover(
                    function () {
                        $(this).find('img').eq(1).stop().animate({ opacity: 1 }, { speed: 300 });
                    },
                    function () {
                        $(this).find('img').eq(1).stop().animate({ opacity: 0 }, { speed: 300 });
                    }
                );


                //Clear the timer event
                clearInterval(intID);
            }, 1000);
        });

 
    }

    /***** Search widget validation ******/

    function Search_Widget() {
        
        $('.widget .search form').each(function () {
            var $form = $(this),
                $btn = $form.find('input[type="submit"]'),
                $input = $form.find('input[type="text"]');

            $input.blur(function () {
                if ($.trim($input.val()).length > 0) {
                    $form.removeClass('error');
                }
            });

            $btn.click(function (e) {
                $input.focus();

                if ($.trim($input.val()).length < 1) {
                    $form.addClass('error');
                    e.preventDefault();
                }
            });

        });
    }

    $(document).ready(function () {

        Flickr_Widget();
        Search_Widget();
        Twitter_Widget();

    });

})(jQuery);