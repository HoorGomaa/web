<?php $title="Update Item"; ?>
<?php $section="update"; ?>
<?php include('header.php'); ?>
<div class="content">
<div class="page section">
    <h1>Update Item</h1>
    <?php 
    #Establish connection
    include('connection.php');
    ###### Retrieve items' info ######
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM stuff WHERE id = $id";
        $result = mysqli_query($conn, $query);
        $item = mysqli_fetch_assoc($result);
    }


    ###### UPDATE ######
    #Get info from input fields
    if(isset($_POST['update'])) {
    $id = $_POST['pid'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    
    #Collect image info
    $file_name = basename($_FILES['image']['name']);
    $file_type = basename($_FILES['image']['type']);
    $file_error = basename($_FILES['image']['error']);
    $file_source = basename($_FILES['image']['tmp_name']);
    $file_size = basename($_FILES['image']['size']);
    
    #Create array of image extensions
    $accept = array('png','jpg','jpeg');

    #Exract extension
    $file_name_parts = explode('.', $file_name);
    $extension = end($file_name_parts);

    $destination = "img/stuff/stuff-$id.$extension";
    #Check if the image has no error, the size is ok and the extension is ok
    if(!$file_error and $file_size < 500000 and in_array($extension,$accept)) {
        #Move the file from the temporary storage to the server

        $out = move_uploaded_file($file_source, $destination);
        

        #Construct query
        $query = "UPDATE stuff SET name = '$name', img = '$destination', price = $price WHERE id=$id";
        #Execute query
        $result = mysqli_query($conn,$query);
        #process result
        if($result>0){
            echo"<p>Item updated successfully to the Database</p>";
        }else{
            echo "<p>Sorry Item was not updated</p>";
        }
    }
}else{?>

                <form id="contact" name="add" method="POST" action="update-item.php" enctype="multipart/form-data">

                    <table>
                       
                        <tr>
                            <th>
                                <label for="pid">Product-ID</label>
                            </th>
                            <td>
                                <input type="text" name="pid" readonly="readonly" id="pid" value="<?php echo $id ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label for="name">Product Name</label>
                            </th>
                            <td>
                                <input type="text" name="name" id="name" value="<?php echo $item['name'] ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label for="image">Upload Image</label>
                            </th>
                            <td>
                                <img src="" alt=""/>
                                <input type="file" name="image" id="image">
                                <input type="hidden" name="file" value="<?php echo $destination ?>"/>
                                <span style="font-size: 0.6em; font-style: italic;">(Maximum 500 KB)</span>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label for="price">Price</label>
                            </th>
                            <td>
                                <input type="text" name="price" id="price" value="<?php echo $item['price'] ?>"/>
                            </td>
                        </tr>  
                    </table>
                    <input type="submit" value="Update" name="update">

                </form>
 <?php } ?>
</div>


<?php include('footer.php'); ?> 

