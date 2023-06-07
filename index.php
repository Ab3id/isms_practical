<?php 
   

    if(isset($_POST['username'])){
      
        $username = $_POST['username'];
        $password = $_POST['password'];

        $requestData = array();

        $requestData['username'] = $username;
        $requestData['password'] = $password;

        $encoded = json_encode($requestData);

        //Token request
        $tokenUser = 'bcsClass';
        $tokenPass = 'jaribuKuingia@bcs$$+++!XZty';

        $tokenRequestData = array();

        $tokenRequestData['username'] = $tokenUser;
        $tokenRequestData['password'] = $tokenPass;

        $tokenEncoded = json_encode($tokenRequestData);
      
        
            $tokenData = postFunction(false,$tokenEncoded,'https://isms.iaa.ac.tz/ismsapi/hakiki.php',''); 
            if(isset($tokenData['error'])){
                //contains error
                echo $tokenData['error'];
                return;
            }else{
             
                $token = $tokenData['token'];
                $loginReponse = postFunction(true, $encoded, 'https://isms.iaa.ac.tz/ismsapi/students.php', $token, true);
                

                //{"majina":"Poa Jaribu Kufanya ","jinsia":"M","usajili":"BCS_1000_2020"}

                if(isset($loginReponse['error'])){
                    echo $loginReponse['error'];
                }else{
                
                $jina = base64_encode($loginReponse['majina']);
                $sex = base64_encode($loginReponse['jinsia']);
                $reg = base64_encode($loginReponse['usajili']);

                $caResponse = postFunction(true, $encoded, 'https://isms.iaa.ac.tz/ismsapi/ca.php', $token, false);

                $db = mysqli_connect('localhost','root','Pass','isms_practical');

                $q1 = "select * from student where reg_no = '$reg'";

                $res = mysqli_query($db, $q1);

                

                if(mysqli_num_rows($res) == 0){
                    
                    $query = "INSERT INTO `isms_practical`.`student` (`jina`, `sex`, `reg_no`) VALUES ('$jina', '$sex', '$reg')";

                    mysqli_query($db, $query);
                }else{
                    $row = mysqli_fetch_assoc($res);

                    $student_id = $row['id'];

                    $decodedCa = json_decode(base64_decode(base64_decode($caResponse)));
                    $q1 = "select * from ca_results where student_id = '$student_id'";
                        $res = mysqli_query($db, $q1);

                if(mysqli_num_rows($res) == 0){

                    foreach ($decodedCa as $value) {
                        
                        
                            $somo = base64_encode($value->somo);
                            $alama = base64_encode($value->alama);
                            $q2 = "INSERT INTO `isms_practical`.`ca_results` (`student_id`, `somo`, `alama`) VALUES ('$student_id', '$somo', '$alama')";
                            mysqli_query($db, $q2);
                        
                        
                        
                    }
                }

                    $result = mysqli_query($db, $q1);


                    ?>

<h2>Registration Number : <?php echo base64_decode($reg) ?></h2> </br>
<h3>CA Results</h3>

<table border ='1' style='border-collapse: collapse'>
<tr>
    <th>Somo</th>
    <th>Alama</th>
</tr>
                
                <?php
                  while($row = mysqli_fetch_assoc($result)) {
                     
                      echo "<tr>"."<td>".base64_decode($row['somo'])."</td>"."<td>".base64_decode($row['alama'])."</td>"."</tr> ";
  
                     
                      
  
                    }
  
                    ?>
                    
</table>             
                    <?php

              

                   
                }


               
                   

               

                



                

              
                
               }

                
            }
            
        
        return;
    }

    //{"username":"bcsClass","password":"jaribuKuingia@bcs$$+++!XZty"}
    //{"username":"bcsClass","password":"jaribuKuingia@bcs$$+++!XZty"}

    function postFunction(bool $addHeader = false, $data, $url, $token = '', $decodeResp = true){
        $ch = curl_init($url);

        // Returns the data/output as a string instead of raw data
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $data );
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        //Set your auth headers
        if($addHeader){
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Authorization: Bearer ' . $token
                ));
        }else{
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json'
                ));
        }

        // get stringified data/output.
        $data = curl_exec($ch);
        
        if($data == false){
            echo 'Fetch Error '.curl_error($ch);
        }

        
        // close curl resource to free up system resources
        curl_close($ch);
        
        return $decodeResp ? json_decode($data, true) : $data;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ISMS Login</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        *:focus {
            outline: none;
        }
        body{
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            
        }

        input[type=text],[type=password]{
            height: 30px;
            width: 100%;
            border: none;
            padding: 0px 5px;
            border-bottom: 1px solid #10497E;
        }

        #input_submit{
            height: 30px;
            width: 100%;
            border: none;
            cursor: pointer;
        }

        

        form{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            gap: 0;
        }
       
    </style>
</head>
<body>
    <center>
        <h4>ISMS LOGIN</h4>
         </br> </br>
        <form method="POST" action="#">
            <input type="text" name="username" required placeholder="Username" autocomplete="false"> </br> 
            <input type="password" name="password" required placeholder="Password" autocomplete="false">  </br> 
            <input type="submit" value="submit" id="input_submit">
          
    </form>
    </center>
</body>
</html>