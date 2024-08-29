jQuery(document).ready(function($) {
    $('.upload-button').on('click', function(e){
        e.preventDefault();
        let $button = $(this);
        let file_frame = wp.media.frames.file_frame = wp.media({
            library: {
                type: 'application/pdf'
            },
            multiple: false
        });

        file_frame.on('select', function(){
            let attachement = file_frame.state().get('selection').first().toJSON();
            $button.siblings('.upload-input').val(attachement.url);
        });

        file_frame.open();
    });
});