<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<h1>edit</h1>
<form action="?controller=manager&action=update&id=<?php echo $id ?>" method="post">
    <div class="form-group col-md-4">
        <label for="">Title</label>
    </div>
    <div class="form-group col-md-4">
        <input type="text" name="title" class="form-control" value="<?php echo $post['title']?>">
    </div>
    <div class="form-group col-md-4">
        <label for="" >Description</label>
    </div>
    <div class="form-group col-md-4">
        <input type="text" name="description" class="form-control" value="<?php echo $post['description']?>">
    </div>
    <div class="form-group col-md-4">
        <label for="">Image</label>
    </div>
    <div class="form-group col-md-4">
        <input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
    </div>
    <div class="form-group col-md-4">
        <label for="">Status</label>
    </div>
    <div class="form-group col-md-4">
        <input type="text" name="status" class="form-control" value="<?php echo $post['status']?>">
    </div>
    <button type="submit">submit</button>
</form>
</body>
</html>