<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
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
    <style>
        #exampleFormControlSelect1 {
            margin-left: -1050px;
        }
    </style>
</head>
<body>
    <h1>List Post</h1>
    <center>
        <form action="?controller=manager&action=index" method="post">
            <select class="" id="exampleFormControlSelect1" name = "per_page" onchange='if(this.value != "") { this.form.submit(); }'>
                <option value=""></option>
                <option value='5'>5</option>
                <option value='10'>10</option>
                <option value='15'>15</option>
                <option value='20'>20</option>
                <option value='25'>25</option>
            </select>
        </form>
        <table class="table col-md-8">
        <thead>
            <td>Title</td>
            <td>Description</td>
            <td>Image</td>
            <td>Status</td>
            <td>Action</td>
        </thead>
        <?php foreach ($posts as $post) { ?>
            <tr>
                <td><?php echo $post['title'] ?></td>
                <td><?php echo $post['description'] ?></td>
                <td><img src = "<?php echo $post['image'] ?>" alt="img"></td>
                <td><?php echo $post['status'] ?></td>
                <td>
                    <a href="?controller=manager&action=edit&id=<?php echo $post['id'] ?>" class = "btn btn-info">Edit</a> |
                    <a href="?controller=manager&action=destroy&id=<?php echo $post['id'] ?>" class = "btn btn-danger">Delete</a>
                </td>
            </tr>
        <?php } ?>
            <tfoot>
                <td><a href="?controller=manager&action=create" class="btn btn-primary">Add new post</a>
                </td>
                <td><a href="?controller=user&action=index" class="btn btn-primary">Go to User Page</a>
                </td>
            </tfoot>
    </table>
    </center>
</body>
</html>