﻿//scroll to bottom
var textarea = document.getElementById("scroll");
textarea.scrollTop = textarea.scrollHeight;

//send message
function submitek(){
    var formData = {};
    formData["wiadomosc"] = document.getElementById("wiadomosc").value;
    $.post("addmessage", formData).done(function() {
        document.getElementById("wiadomosc").value="";
        reload();
    });
}

//log out
function logout(){
    $.post("logout").done(function() {
        window.location.href = "login";
    });
}

//tab close
//window.addEventListener('beforeunload', function(e){
//    $.post("beforeunload.php");
//});

//reload chatbox and scroll to bottom if something changed
var last=$(".wpis").length;
function reload(){
    $("#scroll").load("cont", function(){
        if (last!=$(".wpis").length){
            textarea.scrollTop = textarea.scrollHeight;
            last=$(".wpis").length;
        }
    })
    $("#userlist").load("activeusers");
    $("#hellomsg").load("hellomsg");
}
setInterval(reload, 2000);
reload();

//submit on enter/logout on esc
$('body').keydown(function (e) {
    if(e.keyCode == 27) {
        var r = confirm("Czy chcesz się wylogować?");
        if (r == true) {
            logout();
        }
    }
    else if (e.keyCode == 13) {
        e.preventDefault();
        submitek();
    }
});

//focus on keydown
$(document).bind('keydown',function(e){
    $('#wiadomosc').focus();   
});
