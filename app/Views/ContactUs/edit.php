<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah contactUs baru</title>
</head>
<body>
    <h2>Edit Baru</h2>
    <fieldset>
        <?= \Config\Services::validation()->listErrors();?>

        <form action="/contactUs/update/<?= $contactUs['id']; ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah contactUs baru</title>
</head>
<body>
    <h2>Edit  Baru</h2>
    <fieldset>
        <?= \Config\Services::validation()->listErrors();?>

        <form action="/contactUs/update/<?= $contactUs['id']; ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?>
            
            <label for="">name</label>
            <br/>
            <input type="text" name="name" size="50" value="<?= $contactUs['name'];?>"/>
            <br/>
            <label for="">phone</label>
            <br/>
            <input type="number" name="phone" size="50" value="<?= $contactUs['phone'];?>"/>
            <br/>
            <label for="">location</label>
            <br/>
            <input type="text" name="location" size="50" value="<?= $contactUs['location'];?>"/>
            <br/>
            <label for="">website</label>
            <br/>
            <input type="text" name="website" size="50" value="<?= $contactUs['website'];?>"/>
            <br/>
            <label for="">whatsapp</label>
            <br/>
            <input type="text" name="whatsapp" size="50" value="<?= $contactUs['whatsapp'];?>"/>
            <br/>
            <label for="">instagram</label>
            <br/>
            <input type="text" name="instagram" size="50" value="<?= $contactUs['instagram'];?>"/>
            <br/>
            <label for="">facebook</label>
            <br/>
            <input type="text" name="facebook" size="50" value="<?= $contactUs['facebook'];?>"/>
            <br/>
            <label for="">email</label>
            <br/>
            <input type="email" name="email" size="50" value="<?= $contactUs['email'];?>"/>
            <br/>
            <label for="">message</label>
            <br/>
            <input type="text" name="message" size="50" value="<?= $contactUs['message'];?>"/>
            <br/><br/>

            <input type="submit" value="Edit">
            <input type="reset" value="Cancel">

        </form>
    </fieldset>
    
</body>
</html>
            <label for="">name</label>
            <br/>
            <input type="text" name="name" size="50" value="<?= $contactUs['name'];?>"/>
            <br/>
            <label for="">phone</label>
            <br/>
            <input type="number" name="phone" size="50" value="<?= $contactUs['phone'];?>"/>
            <br/>
            <label for="">location</label>
            <br/>
            <input type="text" name="location" size="50" value="<?= $contactUs['location'];?>"/>
            <br/>
            <label for="">website</label>
            <br/>
            <input type="text" name="website" size="50" value="<?= $contactUs['website'];?>"/>
            <br/>
            <label for="">whatsapp</label>
            <br/>
            <input type="text" name="whatsapp" size="50" value="<?= $contactUs['whatsapp'];?>"/>
            <br/>
            <label for="">instagram</label>
            <br/>
            <input type="text" name="instagram" size="50" value="<?= $contactUs['instagram'];?>"/>
            <br/>
            <label for="">facebook</label>
            <br/>
            <input type="text" name="facebook" size="50" value="<?= $contactUs['facebook'];?>"/>
            <br/>
            <label for="">email</label>
            <br/>
            <input type="email" name="email" size="50" value="<?= $contactUs['email'];?>"/>
            <br/>
            <label for="">message</label>
            <br/>
            <input type="text" name="message" size="50" value="<?= $contactUs['message'];?>"/>
            <br/><br/>

            <input type="submit" value="Edit">
            <input type="reset" value="Cancel">

        </form>
    </fieldset>
    
</body>
</html>