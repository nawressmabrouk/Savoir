<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #222831;
            color: white;
        }

        .container {
            display: flex;
            flex-direction: row;
            padding: 20px;
        }

        #main-content {
            flex-grow: 1;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .buttons {
            display: flex;
            justify-content: flex-start;
            margin-bottom: 20px;
        }

        .create-room-button,
        .join-room-button {
            background-color: transparent;
            color: white;
            border: 1px solid #17c3b2;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-right: 10px;
        }

        .create-room-button:hover,
        .join-room-button:hover {
            background-color: #17c3b2;
            color: black;
        }

        .button-common {
            background-color: transparent;
            color: white;
            border: 1px solid #17c3b2;
            padding: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            align-items: center; 
        }

        .button-common:hover {
            background-color: #17c3b2;
            color: black;
            align-items: center; 
        }

        .disconnect-button {
            background-color: transparent;
            color: white;
            border: 1px solid #f04747;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-right: 10px;
            align-items: center; 
        }

        .disconnect-button:hover {
            background-color: #f04747;
            color: black;
            align-items: center; 
        }

        .connect-button {
            background-color: transparent;
            color: white;
            border: 1px solid #17c3b2;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-left: auto;
            align-items: center; 
            flex-grow: 1; 
        }

        .connect-button:hover {
            background-color: #17c3b2;
            color: black;
            align-items: center; 
        }

        #joined-room-container {
            background-color: #393e46;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }

        h2 {
            color: white;
            font-size: 2em;
            font-weight: bold;
        }

        ul.room-list {align-items: center;
            list-style-type: none;
            flex-grow: 1; 
        }

        ul.room-list li { 
            display: flex;
            align-items: center; /* Align items vertically */
            margin-bottom: 10px; /* Add space between rooms */
            flex-grow: 1; 
        }

        .room-name {
            flex-grow: 1; /* Allow room name to take up remaining space */
        }

        .button-small {
            padding: 5px 10px;
        }
        .logo img {
            max-width: 35%;
            height: 90px;
            width: 200px;
            margin-right: 700px;
            margin-top: 20px;
            

            
        }
        
    </style>
</head>
<body>
<?php   session_start();    ?>

    <div class="container">
        <div id="main-content">
        <a href="main.html"  class="logo">
    <img src="savoir.png" alt="Logo"></a>
    <br>
            <div class="buttons">
                <button id="create-room-button" class="create-room-button">Create Room</button>
                <button id="join-room-button" class="join-room-button">Join Room</button>

                <button id="connect-button" class="connect-button">connect Room</button>
            </div>

            <div id="create-popupContainer" class="popupContainer" style="display: none;">
                <div class="popupContent">
                    <form action="create_file.php" method="post" id="create-room">
                        <span class="close" onclick="closeCreatePopup()">&times;</span>
                        room name:<input type="text" name="rname"id="rname">
                        <button type="button" onclick="saveCreateInput()">Create</button>
                    </form>
                </div>
            </div>

            <div id="join-popupContainer" class="popupContainer" style="display: none;">
                <div class="popupContent">
                    <form action="joinroom.php" method="post" id="join-form">
                        <span class="close" onclick="closeJoinPopup()">&times;</span>
                        room code:<input type="text" id="code"name="code">
                        <button type="button" onclick="saveJoinInput()">Join</button>
                    </form>
                </div>
            </div>
            <div id="connect-popupContainer" class="popupContainer" style="display: none;">
                <div class="popupContent">
                    <form action="connectroom.php" method="post" id="connect-room">
                        <span class="close" onclick="closeConnectPopup()">&times;</span>
                        room code:<input type="text" name="code2"id="code2">
                        <button type="button" onclick="saveConnectInput()">connect</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    

            <div id="joined-room-container">
                <h2>Joined Rooms</h2>
                <ul class="room-list">
                <div style="text-align: center; margin: auto; width: 50%; margin-left: 40%;"> <!-- Adjust the width as per your requirement -->
                
        <?php
        
        include 'joined_list.php';
         ?>
         
    </div>
    <a href="unjoin.html">unjoin room</a><br>

                <h2>connected room :</h2>




                <div id="preview-container">
               
                    <iframe id="my-iframe"src="msgbox.php" width="500"height="800"></iframe>
                </div>
            </div>

            <script src="script.js"></script>
        </div>
    </div>
    
</body>
</html>