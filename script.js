// Get the popup container and button
const createPopup = document.getElementById('create-popupContainer');
const joinPopup = document.getElementById('join-popupContainer');


const joinButton = document.getElementById('join-room-button');
const createButton = document.getElementById('create-room-button');

//new

    const connectButton = document.getElementById('connect-button');
    const connectPopup = document.getElementById('connect-popupContainer');

    connectButton.onclick = function() {
        alert("connecting");
        connectPopup.style.display = 'block';
    }

    function closeConnectPopup() {
        connectPopup.style.display = 'none';
    }

   function saveConnectInput() {
        const code2 = document.getElementById('code2').value;
        alert(code2);
        // Submit the form
        document.getElementById("connect-room").submit();
        closeConnectPopup();
    }

//end new

createButton.onclick = function() {
    createPopup.style.display = 'block';
}

joinButton.onclick = function() {
    joinPopup.style.display = 'block';
}

function closeCreatePopup() {
    createPopup.style.display = 'none';
}

function closeJoinPopup() {
    joinPopup.style.display = 'none';
}

function saveCreateInput() {
    const name = document.getElementById('rname').value;
    alert(name);
    // Submit the form
    document.getElementById("create-room").submit();
    closeCreatePopup();
}

function saveJoinInput() {
    const code = document.getElementById('code').value;
    alert(code);
    // Submit the form
    document.getElementById("join-form").submit();
    closeJoinPopup();
}/*
function connect() {
     code3 = document.getElementById('code3').value;
    alert(code3);
    alert("code3");
    // Submit the form
   //document.getElementById("connectt-room").submit();




    }*/