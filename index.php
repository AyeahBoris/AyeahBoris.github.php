<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>friendsbook</title>
    <link rel="stylesheet" href="friendbook.css">
</head>
<body>
        <div id="h1">
              <p><h1 ><center> Friend book </center></h1></p>
        </div>
     <br/>
       <form action="index.php" method="post">
        Name : <input type="text" name="myname">
       <input type="submit" value="add new friend">
       </form>
       <br/>
    <?php
        echo "<h2>My best friends : </h2>";
        $filename = 'friends.txt';
        if (isset($_POST['myname'])) {
            if($_POST['myname'] != "") {
                $file = fopen($filename, "a");
                fwrite($file, PHP_EOL.$_POST['myname']);
                fclose($file);
            }
        }
    ?>
    <?php
        $filename = 'friends.txt';
        // Reading file
        $file = fopen($filename, "r");
        while (!feof($file)){
            $name = fgets($file); //reading each line
            if(isset($_POST['namefilter'])) {
                if(isset($_POST['startingWith']))
                {
                    $position = strpos(strtolower($name), strtolower($_POST['namefilter']));
                    if($position !== false)
                    {
                        if($position === 0)
                        {
                            echo "<li>$name</li>";
                        }
                    }
                }
                else {
                    if (strstr(strtolower($name), strtolower($_POST['namefilter'])))
                     {
                        echo "<li>$name</li>";
                     }
                }
            } 
            else {
                echo "<li>$name</li>";
            } 
            
        }
        fclose($file);
  
    ?>
    <form action="index.php" method="post">
        <input type="text" name="namefilter"> 
        <input type="submit" value="Filter list"><br>
        <input type="checkbox" name="startingWith"> Only names starting with  
    </form>

            <div id="h2">
            <p><h1 ><center> Footer </center></h1></p>
            </div>

</body>
</html>