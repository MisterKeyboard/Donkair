



<body>
    <a class="text-primary" href="dashboard.php" target="_blank">Revenir à la page principale</a>

    <form action="formupload.php" method="POST" enctype="multipart/form-data">
    
    <lable class="text-primary">Nom de la ville</lable>
    <input type="text" name="name">

    <lable class="text-primary">Choisissez l'image à sauvegarder</label>
    <input type="file" name="image" />

    <input class="btn btn-primary" type="submit" name="submit" value="upload" />
</body>

</html>





<?php
include "db.php";

if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $image=$_FILES['image']['name'];

    $insert="insert into images values('NULL','$name','$image')";
    if(mysql_query($insert))
    {
        move_upload_files($_FILES['image']['temp_name'],"img/uploadtownsimages/$");
        echo"<script>alert('L'image a bien été uploadé')</script>";
    }
    else{
        echo"<script>alert('L'image n'a pas été uploadé,veuillez réessayer')</script>";
    }
}


?>
