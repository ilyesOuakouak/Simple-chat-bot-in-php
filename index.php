<?php
    include_once "body/nav.php";
    include_once  "functions/connectDb.php";
    include_once "functions/index.func.php";

    insertMessages();
    insertMessages2();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>


    <body>
        <!-- create the chat design (main chatbot) -->
        <!-- End of test -->
        <div id="menu" class="outer">
            <div class="middle">
                <div class="chat-block">

                    <i class="fas fa-bars"></i>

                    <div class="slideMessageScrollBar">
                        <!--Here we display the first message (welcome message) given by the watson -->

                        <div class="chat-send-message">

                            <div class="sender-image">
                                <img src="images/chatbot.png" width="50px" height="50px">
                            </div>

                            <div class="sender-message-core">
                                <p>Hello i'm ilyBot, How can i help you?</p>
                            </div>

                        </div>
                        <?php
                        foreach (displayMessages() as $message)
                        {
                            ?>
                            <div class="chat-receive-message">

                                <div class="receiver-message-core">
                                    <p><?=$message['user_message']?></p>
                                </div>

                                <div class="receiver-image">
                                    <img src="images/user-chatbot.png" width="50px" height="50px">
                                </div>
                            </div>

                            <div class="chat-send-message">

                                <div class="sender-image">
                                    <img src="images/chatbot.png" width="50px" height="50px">
                                </div>

                                <div class="sender-message-core">
                                    <p><?=$message['watson_response']?> </p>
                                </div>

                            </div>




                            <?php
                        }
                        ?>



                    </div>

                    <form action="index.php" method="post" class="submitMessage">
                        <div class="form-group">
                            <textarea  id="exampleFormControlTextarea1" placeholder="Hello, do you need some help ?" name="my_message"></textarea>
                            <button id="sendBttn" class="btn waves-effect waves-light" type="submit" name="submitM">Send

                            </button>
                        </div>
                    </form>
                </div>


            </div>
        </div>





        <!-- Create the right chatbot-->
        <img  class="chatBot2Button" src="images/speech-bubble.png" height="60px" width="60px">

        <div class="mainChat2Border">


            <div class="slideSectionChat2Bot">
                <div class="chat2botReceiveMessage">
                    <p>Hello, I'm ilyBot, how can i help you?</p>
                </div>

                <?php
                foreach (displayMessages2() as $message)
                {
                    ?>
                    <div class="chat2botSendMessage">
                        <p><?=$message['user_message'];?></p>
                    </div>

                    <div class="chat2botReceiveMessage">
                        <p><?=$message['watson_response']?></p>
                    </div>

                    <?php
                }
                ?>

            </div>


            <form class="form-inline" id="chat2botForm" method="POST">
                <textarea class="form-control" rows="1" id="leaveMessageChat2Bot" name="my_message2" placeholder="Ask your question?"></textarea>
                <button type="submit" class="btn btn-primary" name="submit2M">Send</button>
            </form>

        </div>


        <!--Display the avatar-->
        <div class="displayAvatar">

        </div>
        <!--just for design-->
        <div class="designRectangle">

        </div>
        <img src="images/avatar2.png" class="rightAvatar">
        <img src="images/newAvatar.png" class="leftAvatar" width="400px" height="520px">



        <!--create the reset button-->
        <form method="POST">
            <button name="clearChat1" type="submit" id="reset1" class="btn btn-outline-danger">Reset</button>
            <?php
                if(isset($_POST['clearChat1']))
                {
                    clearDatabase1();
                }
            ?>
        </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="js/script.js" type="text/javascript"></script>
    <style>


        .nav-login:hover {
            background-color: tomato !important;
        }

        .nav-register:hover{
            background-color: tomato !important;
        }

        /*chat page core*/

        .outer {
            display: table;
            position: relative;
            left: 0;
            height: 100%;
            width: 100%;
        }


        .middle {
            display: table-cell;
            vertical-align: middle;
        }



        .chat-send-message {

            display: flex;
            margin-bottom: 20px;
        }

        .chat-receive-message {
            display: flex;
            margin-bottom: 20px;
        }

        .chat-send-message .sender-image img {

        }

        .chat-receive-message .receiver-image {
            align-self: flex-end;
            margin-left: 10px;
        }

        .chat-send-message .sender-image {
            align-self: flex-end;
            margin-right: 10px;
            margin-left: 45px;
        }

        .chat-receive-message .receiver-message-core {
            max-width: 300px;
            padding: 10px 15px;
            /*Original Color: background-color: #463940;*/
            background-color: #7F152E;
            color: aliceblue;
            align-self: flex-end;
            position: relative;
            overflow: hidden;
            -webkit-border-radius: 0px 10px 0px 10px;
            -moz-border-radius: 0px 10px 0px 10px;
            border-radius: 0px 10px 0px 10px;
            font-family:  'Titillium Web', sans-serif;
            font-size: 17px;
        }
        .chat-send-message .sender-message-core {
            max-width: 300px;
            padding: 10px 15px;
            /* Original Color: background-color: #BC4123;*/
            background-color: #B38540;
            color: aliceblue;
            align-self: flex-end;
            position: relative;
            overflow: hidden;
            -webkit-border-radius: 10px 0px 10px 0px;
            -moz-border-radius: 10px 0px 10px 0px;
            border-radius: 10px 0px 10px 0px;
            font-family:  'Titillium Web', sans-serif;
            font-size: 17px;
        }
        .chat-receive-message .receiver-message-core p {
            overflow-wrap: break-word;
        }
        .chat-send-message .sender-message-core p {
            overflow-wrap: break-word;
        }

        .slideMessageScrollBar {
            height: 462px;
            padding-top: 5px;
            width: 428px;
            overflow-y: auto;
            overflow-x:hidden;
        }

        i {
            font-size: 25px;
            color: #f1f1f1;

        }

        i:hover {
            color: #BC4123;
        }
        /*
        .chat-send-message .circle {
            z-index: 2;
            width: 40px;
            height: 40px;
            -webkit-border-radius: 50% ;
            -moz-border-radius: 50%;
            border-radius: 50%;
            align-self: flex-end;
            position: relative;
            left: -55px;
            background-color: #ffffff;
        }
        .chat-send-message .square {
            width: 30px;
            height: 15px;
            background-color: tomato;
            align-self: flex-end;
            position: relative;
            left: -75px;


        }
        */

        /*Customise the scrollBar in CSS*/
        /* width */
        ::-webkit-scrollbar {
            width: 5px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #888;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }


        .menuSlide {
            width: 200px;
            background-color: #f1f1f1;
            color: #0B172A;
            position: absolute;
            top: 87px;
            left: 500px;
            padding-top: 5px;
            height: 57px;
            display: none;
        }

        .menuSlide li a
        {
            color: #0B172A;
            text-decoration: none;
            font-family:  'Titillium Web', sans-serif;
            position: relative;
            left: 35px;

        }

        .menuSlide ul li
        {
            list-style-type: none;
            height:25px;

        }

        .menuSlide ul
        {
            width:auto;
            height: auto;
            padding-left: 0;
        }
        .slideMessageScrollBar {
            margin-bottom: 20px;
        }

        .submitMessage {
            background-color: #27253D;
            height: 64px;
            width: 449px;
            border-right:1px solid #ffffff;

            top:18px;
            position: relative;
            left: -20px;
            padding-top: 17px;
            padding-left: 40px;
            padding-right:10px;
        }
        .form-group {
            display: flex;
        }

        #sendBttn
        {
            background-color: #27253D;
            border: 1px solid #ffffff;
            color: #ffffff;
            position: relative;
            right: 17px;

        }

        #sendBttn:hover
        {
            background-color: #6A8A82;
        }

        .form-group .fa-arrow-alt-circle-right{
            color: #BC4123;
            position: relative;
            top: 4px;
            font-size: 30px;
        }

        .form-group .fa-arrow-alt-circle-right:hover{
            color: #BC4123;
            font-size: 40px;
            position: relative;
            top:-4px;
        }


        .form-group #exampleFormControlTextarea1 {
            height: 40px;
            background-color: #27253D;
            font-family:  'Titillium Web', sans-serif;
            width: 400px;
            margin-right: 10px;
            font-size: 17px;
            resize: none;
            color: #ffffff;
            padding-top: 6px;
            padding-left: 10px;
            border: 1px solid #ffffff;
            border-radius: 2px 2px 2px 2px ;
            position: relative;
            right: 12px;
        }

        .form-group #exampleFormControlTextarea1::placeholder {

            color: #ffffff;
            opacity: 0.3;

        }

        body {
            /*background-image: url("images/1.jpg");*/
            background-color: #27253D;
        }

        .chat-block {
            margin-left: auto;
            margin-right: auto;
            width: 450px;
            height: 600px;
            padding: 10px 20px; /* to be changed when we add the header*/
            /*background-image: url("images/1.jpg");*/
            background-color: #27253D;
            border-left: 1px solid #ffffff;
            border-right: 1px solid #ffffff;
        }


        /*-------------------------------------Style of the second chatbot-----------------------------------------------*/
        .chatBot2Button
        {
            position: absolute;
            top: 580px;
            right: 10px;
            z-index: 9999;
        }

        .mainChat2Border
        {
            height: 520px;
            width: 360px;
            border: 1px solid white;
            position: absolute;
            right: 60px;
            top: 80px;
            background-color: white;
            z-index: 9999;
            /*display: none;*/
        }

        #chat2botForm #leaveMessageChat2Bot
        {
            position: relative;
            resize: none;
            width: 290px;
            left: 4px;
            margin-right: 1px;
            top: 35px;
        }

        #chat2botForm button
        {
            position: relative;
            top: 35px;
        }

        .slideSectionChat2Bot
        {
            position: relative;
            z-index: 9999;
            height: 430px;
            top: 30px;
            overflow-y: auto;
            overflow-x: hidden;
            padding-top: 5px;
        }

        .mainChat2Border .chat2botReceiveMessage
        {
            padding: 5px 5px;
            background-color: #A7414A;
            max-width: 300px;
            width:300px;
            color: aliceblue;
            /*align-self: flex-end;*/
            position: relative;
            /*overflow: hidden;*/
            -webkit-border-radius: 2px 2px 2px 2px;
            -moz-border-radius: 2px 2px 2px 2px;
            border-radius: 2px 2px 2px 2px;
            font-family:  'Titillium Web', sans-serif;
            font-size: 15px;
            /*display: flex;*/
            margin-bottom: 10px;
            margin-left: 5px;
        }
        a
        {
            color: dodgerblue;
        }
        .mainChat2Border .chat2botSendMessage
        {
            padding: 5px 5px;
            background-color:#6A8A82;
            max-width: 300px;
            width: 300px;
            color: aliceblue;
            /*align-self: flex-end;*/
            position: relative;
            /*overflow: hidden;*/
            -webkit-border-radius: 2px 2px 2px 2px;
            -moz-border-radius: 2px 2px 2px 2px;
            border-radius: 2px 2px 2px 2px;
            font-family:  'Titillium Web', sans-serif;
            font-size: 15px;
            /*display: flex;*/
            left: 45px;
            margin-bottom: 10px;
        }

        .mainChat2Border .chat2botReceiveMessage p
        {
            overflow-wrap: break-word;
        }

        .mainChat2Border .chat2botSendMessage p
        {
            overflow-wrap: break-word;
        }

        /*display the avatar*/
        .displayAvatar
        {
            width: 445px;
            height: 595px;
            background-color:#27253D ;
            position: absolute;
            top:55px;
            left: 5px;
        }

        .rightAvatar
        {
            position: absolute;
            top: 55px;
            right:0;

        }

        .leftAvatar
        {
            position:absolute;
            top: 50px;
            left: 5px;
        }

        .designRectangle
        {
            border:1px solid #27253D;
            width: 449px;
            height: 105px;
            position: absolute;
            right: 0;
            top:550px;
            background-color: #27253D;
        }

        #reset1
        {
            position: absolute;
            top: 55px;
            left: 470px;
            background-color: #27253D;
            color: white;
            border: 1px solid #ffffff;
        }
    </style>

    <script type="text/javascript">

        $(function () {
            $(".slideMessageScrollBar").stop().animate({ scrollTop: $(".slideMessageScrollBar")[0].scrollHeight}, 0);

        });
    //Scripts of the second chatbot
        $(function () {
           $('.chatBot2Button').click(function () {
               $('.mainChat2Border').toggle(1000);
           }) ;
        });

        $(function () {
            $(".slideSectionChat2Bot").stop().animate({ scrollTop: $(".slideSectionChat2Bot")[0].scrollHeight}, 0);

        });


    </script>
    </body>
</html>