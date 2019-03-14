<?php

  // function to setUp the sessions ()
   function getSenderSession() {
      $sender = 'ilyes';
      $_SESSION['sender'] = $sender;

      return $_SESSION['sender'];
   }

   function getWatsonSession() {
      $received = getResponseFromWatson();
      $_SESSION['received'] = $received;

      return $_SESSION['received'];
   }

  // function to get response from the watson IBM assistant

    function getResponseFromWatson($p_input_text) {
      $workspace_id = "9ecfefaa-5874-44cc-bca1-ebdb5664fe53";
      $_watson_API_username = "apikey";
      $_watson_API_password = "yqfzvnhDEwwmJ99__n4GNIWkl72f5dV5BtWxUadQ2Nn1";
      $_version_date = "2018-11-19";

      // set url
      $api_url = "https://gateway-syd.watsonplatform.net/assistant/api/v1/workspaces/" . $workspace_id . "/message?version=2018-11-19";
      $response = "";
      if(isset($_POST['submitM'])) {
            $p_input_text = $_POST['my_message'];

              if(!empty($_POST['my_message'])){

                    $api_request_array['input']['text'] = $p_input_text;
              }else
                    $api_request_array['input'] = null;

              if(!empty($p_watson_context))
                    $api_request_array['context'] = $p_watson_context;

                    $json_api_request = json_encode($api_request_array);


                    $ch = curl_init();

                    curl_setopt($ch, CURLOPT_URL, $api_url);
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
                    curl_setopt($ch, CURLOPT_USERPWD, "$_watson_API_username:$_watson_API_password");
                    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_api_request);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

                    $response = curl_exec($ch);

                   if(curl_errno($ch))
                  {
                       //echo 'Error connecting with Watson API. Error:(' . $errno . ') - ' . curl_strerror($errno);
                       echo 'Curl error: ' . curl_error($ch);
                  }

                     // $output contains the output string

                   $watson_reply_message = json_decode($response, true); // return an array instead of object
                   //$watson_reply_message = json_decode($response); // return object instead of array


                   if(isset($watson_reply_message->output->text[0]))
                      $watson_output_text = $watson_reply_message->output->text;
                   else
                      $watson_output_text[] = "Sorry! Watson service could not reply";

                    //store the context in session which will be used before calling the api
                   if(isset($watson_reply_message->context))
                   {
                      $return_message['watson_api_context'] = $watson_reply_message->context;
                   }
                      $return_message['watson_reply_text'] = $watson_output_text;

           // here is the return of a function getWatsonResponse as return $return_message------------------------






                    $response = $watson_reply_message['output']['text'][0];

                     // close curl resource to free up system resources
                     curl_close($ch);
          }
          return $response;
    }
  // function to change messages with the friend selected
    function insertMessages() {
        global $db;
        if(isset($_POST['submitM']))
        {
          $message = htmlspecialchars($_POST['my_message']);
          $responseFromWatson = getResponseFromWatson($message);

          if(!empty($message) && !empty($responseFromWatson)) {

              $quer = "INSERT INTO messages(s, r, user_message, watson_response) VALUES (:s, :r, :user_message, :watson_response)";
              $query = $db->prepare($quer);

              $query->execute(array(
                "s" => "ilyes ouakouak",
                "r" => "IlyBot",
                "user_message" => $message,
                "watson_response" =>$responseFromWatson

              ));
          }else {
            echo "can't send an empty message";
          }

       }

     } // end of function

     // create a new function to display the messages exchanged
     function displayMessages()
     {
           global $db;
           $query = $db->query("  SELECT * FROM messages
                                  WHERE messages.s = 'ilyes ouakouak' AND messages.r = 'IlyBot'
                              ");

              $results = [];
              while($result = $query->fetch())
              {
                $results[] = $result;
              }

              return $results;



     }


    function getResponseFromWatson2($p_input_text) {
        $workspace_id = "9ecfefaa-5874-44cc-bca1-ebdb5664fe53";
        $_watson_API_username = "apikey";
        $_watson_API_password = "yqfzvnhDEwwmJ99__n4GNIWkl72f5dV5BtWxUadQ2Nn1";
        $_version_date = "2018-11-19";

        // set url
        $api_url = "https://gateway-syd.watsonplatform.net/assistant/api/v1/workspaces/" . $workspace_id . "/message?version=2018-11-19";
        $response = "";
        if(isset($_POST['submit2M'])) {
            $p_input_text = $_POST['my_message2'];

            if(!empty($_POST['my_message2'])){

                $api_request_array['input']['text'] = $p_input_text;
            }else
                $api_request_array['input'] = null;

            if(!empty($p_watson_context))
                $api_request_array['context'] = $p_watson_context;

            $json_api_request = json_encode($api_request_array);


            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, $api_url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch, CURLOPT_USERPWD, "$_watson_API_username:$_watson_API_password");
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json_api_request);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

            $response = curl_exec($ch);

            if(curl_errno($ch))
            {
                //echo 'Error connecting with Watson API. Error:(' . $errno . ') - ' . curl_strerror($errno);
                echo 'Curl error: ' . curl_error($ch);
            }

            // $output contains the output string

            $watson_reply_message = json_decode($response, true); // return an array instead of object
            //$watson_reply_message = json_decode($response); // return object instead of array


            if(isset($watson_reply_message->output->text[0]))
                $watson_output_text = $watson_reply_message->output->text;
            else
                $watson_output_text[] = "Sorry! Watson service could not reply";

            //store the context in session which will be used before calling the api
            if(isset($watson_reply_message->context))
            {
                $return_message['watson_api_context'] = $watson_reply_message->context;
            }
            $return_message['watson_reply_text'] = $watson_output_text;

            // here is the return of a function getWatsonResponse as return $return_message------------------------






            $response = $watson_reply_message['output']['text'][0];

            // close curl resource to free up system resources
            curl_close($ch);
        }
        return $response;
    }

    // function to insert messages (input message and response of watson) to the database
     function insertMessages2() {
        global $db;
        if(isset($_POST['submit2M']))
        {
            $message = htmlspecialchars($_POST['my_message2']);
            $responseFromWatson = getResponseFromWatson2($message);

            if(!empty($message) && !empty($responseFromWatson)) {

                $quer = "INSERT INTO messages2(s, r, user_message, watson_response) VALUES (:s, :r, :user_message, :watson_response)";
                $query = $db->prepare($quer);

                $query->execute(array(
                    "s" => "ilyes ouakouak",
                    "r" => "IlyBot",
                    "user_message" => $message,
                    "watson_response" =>$responseFromWatson

                ));
            }else {
                echo "can't send an empty message";
            }

        }

     } // end of function

    function displayMessages2()
    {
        global $db;
        $query = $db->query("  SELECT * FROM messages2
                                      WHERE messages2.s = 'ilyes ouakouak' AND messages2.r = 'IlyBot'
                                  ");

        $results = [];
        while($result = $query->fetch())
        {
            $results[] = $result;
        }

        return $results;



    }


    // clear the database
    function clearDatabase1()
    {
        global $db;
        $sql = "TRUNCATE TABLE messages";
        $query = $db->prepare($sql);
        $query->execute();

    }

    function clearDatabase2()
    {
        global $db;
        $sql = "TRUNCATE TABLE messages2";
        $query = $db->prepare($sql);
        $query->execute();


    }