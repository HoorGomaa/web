<?php $title="Modify Item"; ?>
<?php $section="modify"; ?>
<?php include('header.php'); ?>
<?php include('connection.php');

$query = "SELECT * FROM stuff";
$result = mysqli_query($conn, $query);
while($row = mysqli_fetch_assoc(($result))){
    $stuff[$row['id']] = array(
        "name" => $row["name"],
        "img" => $row["img"],
        "price" => $row["price"],
    );
}

if(isset($_POST["update"])){
    $id = $_POST["item"];
    header("Location: update-item.php?id=$id");
}

if(isset($_POST["delete"])){
    $id = $_POST["item"];
    header("Location: delete-item.php?id=$id");
}
?>

<div class="content">
<div class="page section">
    <h1>Modify Item</h1>
    
               <form id="contact" name="modify" method="POST" action="modify-item.php">

                    <table>
                        
                    <?php foreach($stuff as $id => $value){?>
                        <tr>
                            <th>
                                <input type="radio" name="item" id="item" value="<?php echo $id; ?>"/>
                            </th>
                            <td>
                                <label><?php echo $value['name']?></label>
                            </td>
                        </tr>
                            <?php }?>              
                    </table>
                    <input type="submit" name ="update" value="Update" >
                    <input type="submit" name="delete" value="Delete">

                </form>
    
</div>
</div>


<?php include('footer.php'); ?> 

