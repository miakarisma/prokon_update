<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah aboutUs baru</title>
</head>
<body>
    <h2>Tambah aboutUs Baru</h2>
    <fieldset>
        <?= \Config\Services::validation()->listErrors();?>

        <form action="/aboutUs/save" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?>
            
            <label for="">text_header</label>
            <br/>
            <input type="text" name="text_header" size="50"/>
            <br/>
            <label for="">text_span</label>
            <br/>
            <input type="text" name="text_span" size="50"/>
            <br/>
            <label for="">text_paragraph</label>
            <br/>
            <input type="text" name="text_paragraph" size="50"/>
            <br/><br/>
            <input type="submit" value="Add">
            <input type="reset" value="Cancel">

        </form>
    </fieldset>
   
</body>
</html>