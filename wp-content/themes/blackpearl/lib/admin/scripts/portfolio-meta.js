(function ($) {

    function IntroBox() {
        var $intro  = $('#intro_section'),
            $select = $intro.find('select'),
            $title  = $intro.find('input[name="intro_title"]'),
            $desc   = $intro.find('input[name="intro_desc"]');

        $select.change(function() {
            var val = parseInt($select.find('option:selected').val());
            
            switch (val) {
                case 2://Title only
                {
                    $title.parent().slideDown('fast');
                    $desc.parent().slideUp('fast');
                    break;
                }
                case 3://Title and description
                {
                    $title.parent().slideDown('fast');
                    $desc.parent().slideDown('fast');
                    break;
                }
                default:
                {
                    $title.parent().slideUp('fast');
                    $desc.parent().slideUp('fast');
                    break;
                }
            }

        });

        $select.change();
    }

    $(document).ready(function () {

        IntroBox();
    });

})(jQuery);