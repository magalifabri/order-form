<?php // This file is mostly containing things for your view / html 
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css" rel="stylesheet" />

    <script defer src="./index.js"></script>

    <title>Your fancy store</title>
</head>

<body>
    <div class="container">
        <nav>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link active" href="?food=1">Order food</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?food=0">Order drinks</a>
                </li>
            </ul>
        </nav>

        <h1>Place your order</h1>

        <!-- FORM CONFIRMATION MESSAGE -->
        <?php if ($orderConfirmationMsg) : ?>
            <div class="alert alert-success" role="alert">
                <?= $orderConfirmationMsg ?>
            </div>
        <?php endif ?>


        <!-- FORM -->
        <form method="post">

            <fieldset>

                <legend>Products</legend>

                <!-- PRODUCT SELECTION -->
                <?php foreach ($products as $i => $product) : ?>
                    <label>
                        <input class="short-input" type="number" min="0" max="99" placeholder="#" name="products[<?= $i ?>]" value="<?= $_POST["products"][$i] ?? "" ?>" />
                        x <?= $product['name'] ?> - &euro; <?= number_format($product['price'], 2) ?>
                    </label>
                    <br />
                <?php endforeach; ?>
                <p class="error-msg products"><?= $validationErrors["products"] ?></p>

            </fieldset>

            <!-- SUBMIT BUTTON -->
            <button type="submit" class="btn btn-primary">Order!</button>

            <!-- EMAIL INPUT -->
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">E-mail:</label>
                    <input type="email" id="email" name="email" class="form-control" value="<?= $_POST["email"] ?? "" ?>" required>
                    <p class="error-msg email"><?= $validationErrors["email"] ?></p>
                </div>
                <div></div>
            </div>

            <fieldset>
                <legend>Address</legend>

                <div class="form-row">

                    <!-- STREET INPUT -->
                    <div class="form-group col-md-6">
                        <label for="street">Street:</label>
                        <input type="text" name="street" id="street" class="form-control" value="<?= $_POST["street"] ?? $_SESSION["street"] ?? "" ?>" required>
                        <p class="error-msg street"><?= $validationErrors["street"] ?></p>
                    </div>

                    <!-- STREET NUMBER INPUT -->
                    <div class="form-group col-md-6">
                        <label for="streetnumber">Street number:</label>
                        <input type="text" id="streetnumber" name="streetnumber" class="form-control" value="<?= $_POST["streetnumber"] ?? $_SESSION["streetnumber"] ?? "" ?>" required>
                        <p class="error-msg street-number"><?= $validationErrors["streetnumber"] ?></p>
                    </div>

                </div>

                <div class="form-row">

                    <!-- CITY INPUT -->
                    <div class="form-group col-md-6">
                        <label for="city">City:</label>
                        <input type="text" id="city" name="city" class="form-control" value="<?= $_POST["city"] ?? $_SESSION["city"] ?? "" ?>" required>
                        <p class="error-msg city"><?= $validationErrors["city"] ?></p>
                    </div>

                    <!-- ZIPCODE INPUT -->
                    <div class="form-group col-md-6">
                        <label for="zipcode">Zipcode</label>
                        <input type="number" min="0" max="999999" id="zipcode" name="zipcode" class="form-control" value="<?= $_POST["zipcode"] ?? $_SESSION["zipcode"] ?? "" ?>" required>
                        <p class="error-msg zipcode"><?= $validationErrors["zipcode"] ?></p>
                    </div>

                </div>

            </fieldset>

            <!-- SUBMIT BUTTON -->
            <button type="submit" class="btn btn-primary">Order!</button>

        </form>

        <footer>You already ordered <strong>&euro; <?php echo $totalValue ?></strong> in food and drinks.</footer>

    </div>

    <style>
        footer {
            text-align: center;
        }

        .error-msg {
            color: red;
            font-weight: bold;
        }

        .short-input {
            width: 50px;
        }
    </style>

</body>

</html>