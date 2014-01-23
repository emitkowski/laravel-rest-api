$(document).ready(function()
{

    /* Table initialization */
    var $userTable = $('#users').dataTable({
        "iDisplayLength":10,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "/users/data-feed",
        "sPaginationType": "full_numbers"
    });


    // Suspend User Click
    $(document).on('click', '.change-status', function()
    {

        var user_id = $(this).attr('user_id');
        var status = $(this).attr('status');

        if(status == 'USER_SUSPENDED')
        {
            status = 'USER_ACTIVE';
        }
        else
        {
            status = 'USER_SUSPENDED';
        }

        $.ajax({
            type: 'POST',
            url: '/users/change-status',
            data: {id: user_id, status: status},
            success: function(data, textStatus)
            {
                // Do Data Table Refresh
                $userTable.fnStandingRedraw();
            }
         });
    });

    // Resend Activation
    $(document).on('click', '.resend-activation', function()
    {
        var user_id = $(this).attr('user_id');
        $.ajax({
            type: 'POST',
            url: '/users/resend-activation',
            data: {id: user_id},
            success: function(data, textStatus)
            {
                // Do Data Table Refresh
                $('.container').prepend('<div class="alert alert-success">Activation has been resent.</div>');
                $('.flash').delay(5000).fadeOut(2000);
                $userTable.fnStandingRedraw();
            }
         });
    });

    // Password Reset
    $(document).on('click', '.password-reset', function()
    {
        var user_id = $(this).attr('user_id');
        $.ajax({
            type: 'POST',
            url: '/users/password-reset',
            data: {id: user_id},
            success: function(data, textStatus)
            {
                // Do Data Table Refresh
                $('.container').prepend('<div class="alert alert-success">Password Reset has been sent.</div>');
                $('.flash').delay(5000).fadeOut(2000);
                $userTable.fnStandingRedraw();
            }
         });
    });

    // Delete User Click
    $(document).on('click', '.delete', function()
    {

        var user_id = $(this).attr('user_id');

        $.ajax({
            type: 'POST',
            url: '/users/delete',
            data: {id: user_id},
            success: function(data, textStatus)
            {
                // Do Data Table Refresh
                $userTable.fnStandingRedraw();
            }
        });
    });


});