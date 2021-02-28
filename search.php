<?php

$con = new PDO("mysql:host=localhost:8888;dbname=SearchChrisCarReviews",'root','');

if (isset($_POST["submit"])) {
    $str = $_POST["text"];
    $sth = $con->prepare("SELECT * FROM 'search' WHERE Nmae = '$str'");

    $sth->setFetchMode(PDO:: FETCH_OBJ);
    $sth -> execute();

    if($row = $sth->fetch())
    {
        ?>
        <br><br><br>
        <table>
            <tr>
                <th>Name</th>
                <th>Description</th>
            </tr>
            <tr>
                <td><?php echo $row->Name; ?></td>
                <td><?php echo $row->Description;?></td>
            </tr>
        </table>
<?php
    }


        else{
            echo "Name does not exist";
        }
}

?>