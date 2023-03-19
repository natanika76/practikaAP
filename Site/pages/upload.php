<?php

require('../lib/Picture.php');

$f = $_FILES;

if (!empty($f['file']['tmp_name'])) {
    $file = $f['file'];

    $name = $file['name'];
    $filepath = 'images/' . $name;
    
    move_uploaded_file($file['tmp_name'], "../$filepath");

    $Per = new Picture($name,$file['size'],$filepath);
    $Per->toDb();
}

?>
<a href='/Site/pages/show.php'>Show image</a> |&nbsp;<a href='/Site'>Home page</a>
<br>
<hr>
<form method='post' enctype="multipart/form-data">
    <input type='file' name='file' />
    <button>Submit</button>
</form>
