<?php
/*
Client ID:
64384209813-sf300uack5df9vo42i5342c36j3g9pkd.apps.googleusercontent.com

Client secret:
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
*/
?>
<!DOCTYPE html>
<html lang="en-GB">
<head>
<title>Google Login JS</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://accounts.google.com/gsi/client" async></script>
<script>
function handleCredentialsResponse(response){
    fetch("auth_init.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ request_type: 'user_auth', credential: response.credential })
    })
    .then(response => response.json())
    .then(data => {
        if (data.status == 1) {
            let responsePayload = data.pdata;
            let profileHTML = '<h3>Welcome '+responsePayload.given_name+'! <a href="javascript:void(0);" onclick="signOut('+responsePayload.sub+');">Sign out</a></h3>';
            profileHTML += '<img src="'+responsePayload.picture+'"><p><b>Auth ID:</b> '+responsePayload.sub.+'</p><p><b>Name:</b> '+responsePayload.name+'</p><p><b>Email:</b> '+responsePayload.email.+'</p>';
            document.getElementsByClassName("pro-data")[0].innerHTML = profileHTML;

            document.querySelector("#btnWrap").classList.add("hidden");
            document.querySelector(".pro-data").classList.remove("hidden");
        }
    })
    .catch(console.error);
}
function signOut(authID){
    document.getElementsByClassName("pro-data")[0].innerHTML = '';
    document.querySelector("#btnWrap").classList.remove("hidden");
    document.querySelector(".pro-data").classList.add("hidden");
}
</script>
</head>
<body>
<div class="container">
    <div id="btnWrap">
        <div id="g_id_onload"
             data-client_id="64384209813-sf300uack5df9vo42i5342c36j3g9pkd.apps.googleusercontent.com"
             data-context="signin"
             data-ux_mode="popup"
             data-callback="handleCredentialResponse"
             data-auto_prompt="false">
        </div>

        <div class="g_id_signin"
            data-type="standard"
            data-shape="restangular"
            data-theme="outline"
            data-text="signin_with"
            data-size="large"
            data-logo_alignment="left">
        </div>

        <div class="pro-data hidden"></div>
    </div>
</div>
</body>
</html>