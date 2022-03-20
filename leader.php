<!DOCTYPE html>
<html>
<head>
<title>Webbed | Dhanak 2017</title>
    <link rel="icon" type="image/png" href="image/dlogo.png">
    <link rel="stylesheet" type="text/css" href="css/webbed.css">
    <meta name="viewport" content="width=device-width" />
    <meta name="robots" content="noindex">
    <style>
        body{
            background:none;
            text-align: center;
            color: white;
            font-family: 'Children';    
        }
        table,td,th{
            padding: 5px;
            margin: 0 auto;
            border: 1px solid white;
            border-collapse: collapse;
        }
        td,th{
            width: 25%;
        }
        #leader h1{
            margin: 10vh 0;
        }
    </style>
</head>
<body>
    <div id="leader">
        <h1>Leaderboard</h1>
    <?php
        //error_reporting(0);
        require "connect.php";
        $tables =$db->query("SELECT * FROM webbed_reg ORDER BY Level desc,Time");
//        $table = mysqli_fetch_assoc($tables);
        $name = $_COOKIE['wname'];
        echo("<table>");
        echo("<th>Rank</th>");
        echo("<th>Name</th>");
        echo("<th>College</th>");
        echo("<th>Level</th>");
        $i=1;
        foreach($tables as $t){
           //  print_r($t);
            echo("<tr ");
            if($t['Name'] == $name){
                echo("style='background-color:#4CAF50'");
            }
            echo(">");
            echo("<td>".$i."</td>");
            echo("<td>".$t['Name']."</td>");
            echo("<td>".$t['Clg']."</td>");
            echo("<td>".$t['Level']."</td>");
            echo("</tr>");
            $i++;
        }
        echo("</table>");
    ?>
    </div>
    </body>
</html>