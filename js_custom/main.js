

$(document).ready(function(){
    // Variables
    var chatCount = 10;
    var postCount = 20;



    // Remove alreadyInRelation message
$('#okBtn').click(() => {

    window.location.replace("http://localhost/itchyheart/profile.php");
});

// Redirect to the relationchat.php
$('#chatRBtn').click(() => {
    
    window.location.replace("http://localhost/itchyheart/relationchat.php");
});


// Show more messages
$('#showBtn').click(() => {
 
   loadChat(10);
});

// Refresh messages
$('#refreshBtnC').click(() => {

    loadChat(0);
    $(".bi-arrow-clockwise").hide(0).fadeIn(1000);


});

// Refresh posts
$('#refreshBtnP').click(() => {
    loadPosts(0);
    $(".bi-arrow-clockwise").hide(0).fadeIn(1000);
});

// Show more posts
$('#showPBtn').click(() => {
    loadPosts(20);
 });

// Function AJAX for loading the new messages
function loadChat(val) {
    chatCount = chatCount + val;

    $('#chatBox').load("scripts/loadchat-scr.php",{newC: chatCount} 
    );
}
// Function AJAX for loading the new posts
function loadPosts(val) {
    postCount = postCount + val;

    // Check class for width so we can make it consistent
    if($(".iPost").hasClass('w-50')) {
        var width = "w-50";
    } else {
        var width = "w-100";
    }

    $('#postBox').load("scripts/loadpost-scr.php",{newP: postCount, 
        width: width});
}

   





// Additional warning for user when it's about to break up with another person
function brkAlert(soulmate) {
    let text = "Are you sure you want to break up with your soulmate "+soulmate;
    window.confirm(text)
}





});



// Media query realized with JS 
function widthPostChat(x) {

    if(x.matches) {
        $("#chatPost").removeClass("w-25");
        $(".iPost").removeClass("w-50");
        $(".iPost").addClass("w-100");
    } else {
        $("#chatPost").addClass("w-25");
        $(".iPost").removeClass("w-100");
        $(".iPost").addClass("w-50");
    }
 

}

var x = window.matchMedia("(max-width: 1200px)")
widthPostChat(x);
x.addListener(widthPostChat);








