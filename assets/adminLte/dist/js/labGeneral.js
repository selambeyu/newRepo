$(document).ready(function () {
    $(document).on('click', '.msgIconLabel', function (e) {
        // var username=$(this).attr('data-userId');
        e.preventDefault();
        $.ajax({
            url: "markAsReadMsg.php",
            method: 'GET',
            success: function (data) {
                if(data==true){
                    $('#totalLabel').html('');
                    $('#msgHeaderId').html("No Recent Messages");
                    $('#messages-menu-id').html('');
                }
            },
            error: function (errorThrown) {
                console.log(errorThrown);
            }
        });
    });
    getMsg();
    function getMsg() {
        if (typeof (EventSource) !== 'undefined') {
            var serverUpdate = new EventSource("getServerUpdate.php");
            serverUpdate.onmessage = function (event) {
                //var d=JSON.stringify(event.data);
                var data = JSON.parse(event.data);
                var totalAssCount = data[0].length;
                $('#totalAssCount').html(totalAssCount);
                $('#totalAssHeader').html("You have " + totalAssCount + " Lab Orders");
                $('#ass-menu-id').html('');
                for (var i in data[0]) {

                    // $('#ass-menu-id').append('<div class="form-group"><a href="treatment.php?id=' + data[0][i].cardNo + ' &assId=' + data[0][i].aid + '"><div class="control-sidebar-subheading">' + data[0][i].fname + ' ' + data[0][i].mname + '</div></a> <p>' + data[0][i].a_date + '</p></div>');
                    $('#ass-menu-id').append('<li><a href="labratorywindow.php">' + data[0][i].fname + ' ' + data[0][i].mname +' '+data[0][i].lname+'</div>');
                }
                var msgLength = data[1].length;
                $('#totalLabel').html(msgLength);
                $('#msgHeaderId').html("You have " + msgLength + " new Messages");
                $('#messages-menu-id').html('');
                for (var i in data[1]) {
                    $('#messages-menu-id').append('<li> <a href="#" title="'+data[1][i].msgBody+'">' + data[1][i].fname + ' '+ data[1][i].mname +':  ' + data[1][i].msgBody + '</a></li>');
                }

                //Remind
                var totalRemindCount = data[2].length;
                $('#totalRemindCount').html(totalRemindCount);
                $("#totalRemindLabel").html("Today You have " + totalRemindCount + " Reminders");
                $('#notifications-menu-id').html('');
                for (var i in data[2]) {
                    $('#notifications-menu-id').append('<li><a href="#" title="'+data[2][i].title+'">' + data[2][i].fname + ' ' + data[2][i].mname + ':  ' + data[2][i].title + '</a></li>');
                }

            };
        }
        else {
            alert("Your browser is very old please use updated browser");
        }
    }
});