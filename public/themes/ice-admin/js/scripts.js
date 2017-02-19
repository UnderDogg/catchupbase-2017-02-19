$(document).ready(function() {

    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
        beforeSend: function() {
            Pace.restart();
        },
        complete: function() {
            Pace.stop();
        },
        success: function() {
            Pace.stop();
        }
    });

    $.ajaxSetup({

    });

    $('[data-toggle="tooltip"]').tooltip();

    //Check all
    $('[data-check-all]').click(function(e) {

        var target = $(this).data('target');

        if($(this).hasClass('checked')) {

            $(':checkbox', target).each(function() {
                this.checked = false;
            });

            $('[data-variable-text]',this).text('Check all');
            $('.fa', this).removeClass('fa-square-o');
            $(this).removeClass('checked');

        } else {

            $(':checkbox', target).each(function() {
                this.checked = true;
            });

            $('[data-variable-text]',this).text('Uncheck all');
            $('.fa', this).addClass('fa-square-o');
            $(this).addClass('checked');

        }

        return false;
    });

    // Bulk operations
    $('[data-bulk-operation]').click(function(e) {

        var operation = $(this).data('bulk-operation');
        var target = $(this).data('target');
        var id = [];

        $(':checkbox', target).each(function(){

            if(this.checked) {
                id.push($(this).val());
            }

        });

        switch(operation) {
            case 'delete':
                url = '/administration/content/pages/delete';
                method = 'POST';
                data = { _method: 'DELETE', id}
                break;

            case 'publish':
                url = '/administration/content/pages/publish';
                method = 'POST';
                break;

            case 'unpublish':
                url = '/administration/content/pages/unpublish';
                method = 'POST';
                break;

            default:

                return false;

        }

        $.ajax({

            method: method,
            url: url,
            data: data,
            cache: false

        }).done(function(data) {

            location.reload();

        }).fail(function() {

            console.log('error');

        });

        return false;

    });


});

function notImpl() {
    alert('Not implemented..');
}


