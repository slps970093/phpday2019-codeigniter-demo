<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>

<div class="container">


    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <h3>飲料下單</h3>
            <hr>
            <form action="<?= site_url('buy/order') ?>" method="post">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td></td>
                            <td>分類-產品名</td>
                            <td>價格</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $row) { ?>
                        <tr>
                            <td><input type="checkbox" name="items[]" class="form-control" value="<?= $row['id'] ?>"></td>
                            <td><?= $row['category_name'] . "-" . $row['name'] ?></td>
                            <td><?= $row['price'] ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" required>

                <label for="address">Address</label>
                <input type="text" class="form-control" name="address" required>

                <label for="phone">Phone</label>
                <input type="text" class="form-control" name="phone" required>

                <button type="submit" class="btn btn-primary">Buy</button>

            </form>
        </div>
        <div class="col-md-4"></div>
    </div>


</div>
</body>
</html>