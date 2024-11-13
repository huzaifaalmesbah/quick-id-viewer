(function($) {
    'use strict';

    $(document).ready(function() {
        $('.qidvw-copy').on('click', function() {
            const $this = $(this);
            const postId = $this.data('id');
            
            navigator.clipboard.writeText(postId).then(function() {
                const originalText = $this.text();
                $this.text('Copied!');
                
                setTimeout(function() {
                    $this.text(originalText);
                }, 1000);
            });
        });
    });
})(jQuery);