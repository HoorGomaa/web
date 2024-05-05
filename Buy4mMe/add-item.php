<?php $title="Add Item"; ?>
<?php include('header.php'); ?>
<div id="content">
<div class="page section">
    <h1>Add Item</h1>
    <?php 
    #Get info from input fields
    if(isset($_POST['add'])) {
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
        #Establish connection
        include('connection.php');

        #Construct query
        $query = "INSERT INTO stuff VALUES ($id,'$name','$destination',$price)";
        #Execute query
        $result = mysqli_query($conn,$query);
        #process result
        if($result>0){
            echo"<p>Item added successfully to the Database</p>";
        }else{
            echo "<p>Sorry Item was not added</p>";
        }
    }
}else{?>

    
                <form id="contact" name="add" method="POST" action="add-item.php" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <th>
                                <label for="pid">Product-ID*</label>
                            </th>
                            <td>
                                <input type="text" name="pid" id="pid">
                                
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label for="name">Product Name*</label>
                            </th>
                            <td>
                                <input type="text" name="name" id="name">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label for="image">Upload Image</label>
                            </th>
                            <td>
                                <input type="file" name="image" id="image">
                                <span style="font-size: 0.6em; font-style: italic;">(Maximum 500 KB)</span>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label for="price">Price*</label>
                            </th>
                            <td>
                                <input type="text" name="price" id="price">
                                
                            </td>
                        </tr>                    
                    </table>
                    <input type="submit" value="Add" name="add" id="add"/>

                </form>
                <?php }?>
    </div>
</div>
<?php include 'footer.php'; ?>