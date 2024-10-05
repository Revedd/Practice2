<!DOCTYPE html>
<html>
<head>
    <title>Search in description's</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<form method="post" class="d-flex justify-content-center">
    <div class="form-group" style="width: 20%">
        <label for="text">Text input:</label>

        <input type="text" name="search" class="form-control" required/>
    </div>

    <div class="d-grid gap-2 col-6 mx-auto">
        <button class="btn btn-primary" type="submit" value="Search">
            Search
        </button>

    </div>
</form>

<?php
if (isset($_POST['search']))
{
    require "search.php";
    if ($Count > 0)
    {?>
        <div class="alert alert-success" style="width: 20%">
            <strong><?php echo"All results= $Count <br>";?></strong>
        </div>
        <?php
        foreach ($Results as $All)
        {
            echo "ID=  " . $All['Id'] . "<br> First Name=  " . $All['Fname'] . "<br> Last NAme=  ". $All['Lname'] . "<br> Father Name=  ". $All['FatherName'] . "<br> Phone Number=  ". $All['PhoneNumber'] . "<br> Description=  ". $All['Description'] . "<br>---------------------------------------------------------------------------------------------------------------<br>";
        }
    } else{
   ?>

        <div class="alert alert-danger" style="width: 20%">
        <strong> <?php echo "No resaults"; ?>

        </strong>
        </div>
        <?php }

}
?>




</html>