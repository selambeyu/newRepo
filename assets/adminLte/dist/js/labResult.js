$(document).ready(function () {
    console.log("Called");
    getMsg();
    function getMsg() {
        if (typeof (EventSource) !== 'undefined') {
            var serverUpdate = new EventSource("getLabUpdate.php");
            serverUpdate.onmessage = function (event) {
                //var d=JSON.stringify(event.data);
                var data = JSON.parse(event.data);
                var totalLabResCount = data[0].length;
                $('#totalLabResCount').html(totalLabResCount);
                $('#totalLabResHeader').html("You have " + totalLabResCount + " Submitted Lab Result!");
                $('#lab-res-menu-id').html('');
                for (var i in data[0]) {
                    if(data[0][i].ptype=='Antenatal'){
                          $('#lab-res-menu-id').append('<li><a href="antenatalPatientHistory.php?id=' + data[0][i].card + ' &assId=' + data[0][i].aid + '">' + data[0][i].fname + ' ' + data[0][i].mname + ' '+ data[0][i].lname +'</div>');

                    }
                    else{
                          $('#lab-res-menu-id').append('<li><a href="patientHistory.php?id=' + data[0][i].card + ' &assId=' + data[0][i].aid + '">' + data[0][i].fname + ' ' + data[0][i].mname + ' '+ data[0][i].lname +'</div>');

                    }
                 }
            };
        }
        else {
            alert("Your browser is very old please use updated browser");
        }
    }
});