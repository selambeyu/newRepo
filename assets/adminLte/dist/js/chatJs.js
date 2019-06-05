$(document).ready(function (){
   $(document).on('click', '.adminControlSidebar', function (e) {
        $.ajax({
            url: "getChatUser.php",
            method: 'GET',
            success: function (data) {
                $('#doctorAssignmentId').html('');
                $('#doctorAssignmentId').append(data);
            },
            error: function (errorThrown) {
                console.log(errorThrown);
            }
        });
    });

});


