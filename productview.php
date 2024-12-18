<?php
// Include database connection file
include_once 'config.php';

// Check if ID is provided in the URL
if(isset($_GET['id'])) {
    // Sanitize the ID to prevent SQL injection
    $id = mysqli_real_escape_string($con, $_GET['id']);
    
    // Fetch product data from the database based on the ID
    $sql = "SELECT * FROM product WHERE id = $id";
    $result = mysqli_query($con, $sql);
    $product = mysqli_fetch_assoc($result);

    // Fetch similar products with the same category
    $category = $product['pcat'];
    $similarProductsSql = "SELECT * FROM product WHERE pcat = '$category' AND id != $id LIMIT 4";
    $similarProductsResult = mysqli_query($con, $similarProductsSql);
    $similarProducts = mysqli_fetch_all($similarProductsResult, MYSQLI_ASSOC);
} else {
    // Redirect to homepage if ID is not provided
    header("Location: index.php");
    exit();
}

// Close database connection
mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product['pname']; ?> - Product Detail</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 70px;
            padding-bottom: 20px;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Product Detail</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Cart</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1 class="mt-4 mb-4"><?php echo $product['pname']; ?></h1>
        
        <div class="row">
            <div class="col-md-4">
                <img src="<?php echo $product['pimg']; ?>" alt="<?php echo $product['pname']; ?>" class="img-fluid">
            </div>
            <div class="col-md-8">
                <h4>Description:</h4>
                <p><?php echo $product['pdes']; ?></p>
                <h4>Price: Rs <?php echo $product['pprice']; ?></h4>
                <h4>Category: <?php echo $product['pcat']; ?></h4>
                <a href="#" class="btn btn-primary">Add to Cart</a>
            </div>
        </div>

        <!-- Similar Products Section -->
        <div class="mt-4">
            <h2>Similar Products</h2>
            <div class="row">
                <?php foreach ($similarProducts as $similarProduct): ?>
                    <div class="col-md-3 mb-4">
                        <div class="card">
                            <img src="<?php echo $similarProduct['pimg']; ?>" class="card-img-top" alt="<?php echo $similarProduct['pname']; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $similarProduct['pname']; ?></h5>
                                <p class="card-text"><?php echo $similarProduct['pdes']; ?></p>
                                <p class="card-text">Price: Rs <?php echo $similarProduct['pprice']; ?></p>
                                <a href="productview.php?id=<?php echo $similarProduct['id']; ?>" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
