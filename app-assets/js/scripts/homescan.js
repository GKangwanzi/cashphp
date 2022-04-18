function showdetailsusingtree(){
    alert("morning")
}

function addDevice(){
    var data = document.getElementById('deviceid').value+"?::?"+document.getElementById('devicename').value+"?::?"+document.getElementById('simnumber').value
    if (window.XMLHttpRequest) { xmlhttp = new XMLHttpRequest(); } else { xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            var responseArray = xmlhttp.responseText.split("|<><>|");
            window.location.href = "manage.php";
        }
    };
    xmlhttp.open("GET", "controller/ajax_res.php?adddevice="+data, true);
    xmlhttp.send();
}
function addnewusers(){
    var data =  document.getElementById('username').value+"?::?"+
                document.getElementById('names').value+"?::?"+
                document.getElementById('password').value+"?::?"+
                document.getElementById('telephone').value+"?::?"+
                document.getElementById('email').value+"?::?"+
                document.getElementById('company').value+"?::?"+
                document.getElementById('address').value
    if (window.XMLHttpRequest) { xmlhttp = new XMLHttpRequest(); } else { xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            var responseArray = xmlhttp.responseText.split("|<><>|");
            window.location.href = "manage.php";
        }
    };
    xmlhttp.open("GET", "controller/ajax_res.php?adduser="+data, true);
    xmlhttp.send();
}
function getuselist(){
    
    if (window.XMLHttpRequest) { xmlhttp = new XMLHttpRequest(); } else { xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) { 
            var responseArray = xmlhttp.responseText.split("|<><>|");
            // responseArray[0].each(function () {
            //     return { "id": this.id };
            //  });
            document.getElementById('uselist').innerHTML = responseArray[0];
            var folder_jsondata = JSON.parse($('#uselist').val());

            $('#folder_jstree').jstree({ 'core' : {
               'data' : folder_jsondata,
               'multiple': false
            } });
        }
    };
    xmlhttp.open("GET", "controller/ajax_res.php?getuserslist=1", true);
    xmlhttp.send();
}