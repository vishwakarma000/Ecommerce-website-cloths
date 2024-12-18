<?php
// Include database connection file
include_once 'config.php';

// Fetch products for men
$sql = "SELECT * FROM product WHERE subcat = 'men'";
$result = mysqli_query($con, $sql);
$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Close database connection
mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Men</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  
</head>
<body>
     <!-- navigation -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand " href="#">Sports clothing</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="home.php">Home</a>
        <a class="nav-link" href="cart.php">MyCart</a>
        <a class="nav-link" href="myorder.php">MyOrder</a>
        <a class="nav-link" href="aboutus.php">About us </a>
        <a class="nav-link" href="help.php">Help</a>
      </div>
    </div>
    <div class="d-grid d-md-flex justify-content-md-end ">
  <a class="btn btn-dark me-md-2 mb-1" href="logout.php" type="button">Logout</a>
  
</div>
  </div>
</nav> 

<div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <h3>Men's Products</h3>
                <label>
                    <a href="men.php">Men</a> |
                    <a href="women.php">Women</a>
                </label>
            </div>
        </div>

<!-- Display products using cards -->
<div class="row">
            <?php foreach ($products as $product): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <!-- Card content based on your product structure -->
                        <img src="<?php echo $product['pimg']; ?>" class="card-img-top" height="300" alt="<?php echo $product['pname']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $product['pname']; ?></h5>
                            <p class="card-text"><?php echo $product['pdes']; ?></p>
                            <p class="card-text"><b>Price: Rs <?php echo $product['pprice']; ?></b></p>
                            <a href="cart.php?id=<?php echo $product['id']; ?>" class="btn btn-primary">Add to Cart</a>
                            <!-- Add more details as needed -->
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- footer -->
<footer class=" container-fluid bd-footer  bg-dark">
 <div class="container py-4 py-md-5 px-4 px-md-3 text-body-secondary">
    <div class="row">
      <div class="col-lg-3 mb-3">
        <a class="d-inline-flex align-items-center mb-2 text-body-emphasis text-decoration-none text-white" href="/" aria-label="Bootstrap">
          <span class="fs-3 text-white">Sports Clothing</span>
        </a>
        <ul class="list-unstyled small text-white">
          <li class="mb-2">This Sports clothing website will help you to shop clothes for sports. You can order a clothes by clicking this <a href="#" >link.</a> <hr>
          <span class="fs-4 text-white">Contact us</span>
            </li>Email: companyemail@gmail.com<li>
            </li>Telephone no: 022-90xxxxxxx2<li>
        </ul>
      </div>
      <div class="col-6 col-lg-2 offset-lg-1 mb-3 text-white">
        <h5>Links</h5>
        <ul class="list-unstyled">
          <li class="mb-2"><a href="#" >Home</a></li>
          <li class="mb-2"><a href="#" >Mens clothing</a></li>
          <li class="mb-2"><a href="#" >Womens clothing</a></li>
        </ul>
      </div>
      <div class="col-6 col-lg-2 mb-3 text-white">
        <h5>About us</h5>
        <ul class="list-unstyled">
          <li class="mb-2"><a href="#" >website</a></li>
          <li class="mb-2"><a href="#" >Starter template</a></li>
          <li class="mb-2"><a href="#" >Webpack</a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>
</body>
</html>