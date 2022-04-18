

function initiatedeposit() {
    var data =  document.getElementById('names').value+"?::?"+
                document.getElementById('emailinput').value+"?::?"+
                document.getElementById('mobilenumber').value+"?::?"+
                document.getElementById('amountdeposit').value
    if (window.XMLHttpRequest) { xmlhttp = new XMLHttpRequest(); } else { xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            var responseArray = xmlhttp.responseText.split("|<><>|");
            if(responseArray[0] === "OK"){alert("Transaction Failed.")}else{alert("Successfully Initiated deposit transaction")}
            
        }
    };
    xmlhttp.open("GET", "ajax_res.php?initiatedeposit=" + data, true);
    xmlhttp.send();

}



