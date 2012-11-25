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

    function PostType() {
        var $intro = $('#type_section'),
            $select = $intro.find('select[name="content_type"]'),
            $vidType = $intro.find('select[name="video_server"]'),
            $vID = $intro.find('input[name="video_id"]');

        $select.change(function () {
            var val = parseInt($select.find('option:selected').val());

            switch (val) {
                case 2://Video
                    {
                        $vID.parent().slideDown('fast');
                        $vidType.parent().slideDown('fast');
                        break;
                    }
                default:
                    {
                        $vID.parent().slideUp('fast');
                        $vidType.parent().slideUp('fast');
                        break;
                    }
            }

        });

        $select.change();
    }

    $(document).ready(function () {

        IntroBox();

        PostType();

    });

})(jQuery);