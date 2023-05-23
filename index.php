<?php 
    require_once("libs/db.php");
    require_once("libs/functions.php");
    $cat_list = $db->query("select category,ID,parent_id from categories", PDO::FETCH_OBJ)->fetchAll();
?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h2>Kategori / alt kategori işlemleri</h2>
            </div>
        </div>
        <div class="row p-3">
            <div class="col-6">
                <h3 class="text-center">Kategori ekle</h3>
                <hr>
                <form action="libs/db_cats.php" method="post">
                    <label for="cat-name">
                        Kategori adı
                    </label>
                    <input type="text" name="category" class="form-control" id="cat-name">
                    <label for="parent-id">
                        Üst kategori
                    </label>
                    <select name="parent_id" class="form-control" id="parent-id">
                        <option value="0" selected>---</option>
                        <?php
                            foreach ($cat_list as $key => $value) :
                        ?>
                            <option value="<?php echo $value->ID; ?>"><?php echo $value->category; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br>
                    <button class="btn btn-primary" type="submit">Ekle</button>
                    <button type="reset" class="btn btn-danger">Temizle</button>
                </form>
            </div>
            <div class="col-6">
                <div class="container">
                    <h3>Kategori listesi</h3>
                    <hr>
                    <?php draw(buildTree($cat_list,0)); ?>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>