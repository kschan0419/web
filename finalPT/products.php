<?php
  session_start();

  if(!isset($_SESSION['username'])){
    header("Location:login.php");
  }

  include_once 'products_crud.php';
?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

  <title>My Bag Ordering System : Products</title>

  <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

  <?php include_once 'nav_bar.php'; ?>

  <div class="container-fluid">
    <div class="row">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
      <div class="page-header">
        <h2>Create New Product</h2>
      </div>

    <form action="products.php" method="post" class="form-horizontal">

      <div class="form-group">
          <label for="productid" class="col-sm-3 control-label">ID</label>
          <div class="col-sm-9">

      <input name="pid" type="text" class="form-control" id="productid" placeholder="Product ID" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_id']; ?>" required>
      
      </div>
        </div>
      <div class="form-group">
          <label for="productname" class="col-sm-3 control-label">Name</label>
          <div class="col-sm-9">

      <input name="name" type="text" class="form-control" id="productname" placeholder="Product Name" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_name']; ?>" required>
      
      </div>
        </div>
        <div class="form-group">
          <label for="productprice" class="col-sm-3 control-label">Price</label>
          <div class="col-sm-9">

      <input name="price" type="text" class="form-control" id="productprice" placeholder="Product Price" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_price']; ?>" min="0.00" step="0.01" required>
      
      </div>
        </div>
      <div class="form-group">
          <label for="productbrand" class="col-sm-3 control-label">Brand</label>
          <div class="col-sm-9">

      <select name="brand" class="form-control" id="productbrand" required>
        <option value="">Please select</option>
        <option value="Playboy" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Playboy") echo "selected"; ?>>Playboy</option>
        <option value="Superdry" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Superdry") echo "selected"; ?>>Superdry</option>
        <option value="Zalora" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Zalora") echo "selected"; ?>>Zalora</option>
        <option value="Rawrow" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Rawrow") echo "selected"; ?>>Rawrow</option>
        <option value="Calvin Klein" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Calvin Klein") echo "selected"; ?>>Calvin Klein</option>
        <option value="Timberland" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Timberland") echo "selected"; ?>>Timberland</option>
        <option value="ALDO" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="ALDO") echo "selected"; ?>>ALDO</option>
        <option value="Lumberjacks" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Lumberjacks") echo "selected"; ?>>Lumberjacks</option>
        <option value="River Island" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="River Island") echo "selected"; ?>>River Island</option>
        <option value="Boss Green" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Boss Green") echo "selected"; ?>>Boss Green</option>
        <option value="Converse" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Converse") echo "selected"; ?>>Converse</option>
      </select>
      
      </div>
        </div>
      <div class="form-group">
          <label for="producttype" class="col-sm-3 control-label">Type</label>
          <div class="col-sm-9">

      <select name="type" class="form-control" id="producttype" required>
        <option value="">Please select</option>
        <option value="Sling Bag" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Sling Bag") echo "selected"; ?>>Sling Bag</option>
        <option value="Tarp Messenger Bag" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Tarp Messenger Bag") echo "selected"; ?>>Tarp Messenger Bag</option>
        <option value="Solid Coloured Messenger Bag" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Solid Coloured Messenger Bag") echo "selected"; ?>>Solid Coloured Messenger Bag</option>
        <option value="Mixed Material Messenger Bag" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Mixed Material Messenger Bag") echo "selected"; ?>>Mixed Material Messenger Bag</option>
        <option value="Dual Tone Bag" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Dual Tone Bag") echo "selected"; ?>>Dual Tone Bag</option>
        <option value="Mini Crossbody Bag" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Mini Crossbody Bag") echo "selected"; ?>>Mini Crossbody Bag</option>
        <option value="Slim Messenger Bag" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Slim Messenger Bag") echo "selected"; ?>>Slim Messenger Bag</option>
        <option value="Perforated Messenger Bag" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Perforated Messenger Bag") echo "selected"; ?>>Perforated Messenger Bag</option>
        <option value="Nylon Messenger Bag" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Nylon Messenger Bag") echo "selected"; ?>>Nylon Messenger Bag</option>
        <option value="Classic Top-handle Messenger Bag" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Classic Top-handle Messenger Bag") echo "selected"; ?>>Classic Top-handle Messenger Bag</option>
        <option value="Canvas Messenger Bag" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Canvas Messenger Bag") echo "selected"; ?>>Canvas Messenger Bag</option>
      </select>
      
      </div>
        </div>
      <div class="form-group">
          <label for="productcolour" class="col-sm-3 control-label">Colour</label>
          <div class="col-sm-9">

      <select name="colour" class="form-control" id="productcolour" required>
        <option value="">Please select</option>
        <option value="Khaki" <?php if(isset($_GET['edit'])) if($editrow['fld_product_colour']=="Khaki") echo "selected"; ?>>Khaki</option>
        <option value="Black" <?php if(isset($_GET['edit'])) if($editrow['fld_product_colour']=="Black") echo "selected"; ?>>Black</option>
        <option value="Navy" <?php if(isset($_GET['edit'])) if($editrow['fld_product_colour']=="Navy") echo "selected"; ?>>Navy</option>
        <option value="Dark Grey" <?php if(isset($_GET['edit'])) if($editrow['fld_product_colour']=="Dark Grey") echo "selected"; ?>>Dark Grey</option>
        <option value="Tan" <?php if(isset($_GET['edit'])) if($editrow['fld_product_colour']=="Tan") echo "selected"; ?>>Tan</option>
        <option value="Blue" <?php if(isset($_GET['edit'])) if($editrow['fld_product_colour']=="Blue") echo "selected"; ?>>Blue</option>
        <option value="Orange" <?php if(isset($_GET['edit'])) if($editrow['fld_product_colour']=="Orange") echo "selected"; ?>>Orange</option>
        <option value="Infinite Black" <?php if(isset($_GET['edit'])) if($editrow['fld_product_colour']=="Infinite Black") echo "selected"; ?>>Infinite Black</option>
        <option value="Indigo" <?php if(isset($_GET['edit'])) if($editrow['fld_product_colour']=="Indigo") echo "selected"; ?>>Indigo</option>
        <option value="Outerspace" <?php if(isset($_GET['edit'])) if($editrow['fld_product_colour']=="Outerspace") echo "selected"; ?>>Outerspace</option>
        <option value="Protea Flower P" <?php if(isset($_GET['edit'])) if($editrow['fld_product_colour']=="Protea Flower P") echo "selected"; ?>>Protea Flower P</option>
        <option value="Grey Leopard Anglyp" <?php if(isset($_GET['edit'])) if($editrow['fld_product_colour']=="Grey Leopard Anglyp") echo "selected"; ?>>Grey Leopard Anglyp</option>
        <option value="Charcoal" <?php if(isset($_GET['edit'])) if($editrow['fld_product_colour']=="Charcoal") echo "selected"; ?>>Charcoal</option>
        <option value="Olive" <?php if(isset($_GET['edit'])) if($editrow['fld_product_colour']=="Olive") echo "selected"; ?>>Olive</option>
        <option value="Light Brown" <?php if(isset($_GET['edit'])) if($editrow['fld_product_colour']=="Light Brown") echo "selected"; ?>>Light Brown</option>
        <option value="Safari Green" <?php if(isset($_GET['edit'])) if($editrow['fld_product_colour']=="Safari Green") echo "selected"; ?>>Safari Green</option>
        <option value="Magenta Pink" <?php if(isset($_GET['edit'])) if($editrow['fld_product_colour']=="Magenta Pink") echo "selected"; ?>>Magenta Pink</option>
        <option value="Steel Blue" <?php if(isset($_GET['edit'])) if($editrow['fld_product_colour']=="Steel Blue") echo "selected"; ?>>Steel Blue</option>
      </select>
      
      </div>
        </div>
      <div class="form-group">
          <label for="productioncountry" class="col-sm-3 control-label">Production Country</label>
          <div class="col-sm-9">

      <select name="country" class="form-control" id="productioncountry" required>
        <option value="">Please select</option>
        <option value="United States" <?php if(isset($_GET['edit'])) if($editrow['fld_production_country']=="United States") echo "selected"; ?>>United States</option>
        <option value="Vietnam" <?php if(isset($_GET['edit'])) if($editrow['fld_production_country']=="Vietnam") echo "selected"; ?>>Vietnam</option>
        <option value="China" <?php if(isset($_GET['edit'])) if($editrow['fld_production_country']=="China") echo "selected"; ?>>China</option>
        <option value="Malaysia" <?php if(isset($_GET['edit'])) if($editrow['fld_production_country']=="Malaysia") echo "selected"; ?>>Malaysia</option>
        <option value="Korea" <?php if(isset($_GET['edit'])) if($editrow['fld_production_country']=="Korea") echo "selected"; ?>>Korea</option>
      </select>
      
      </div>
        </div>
      <div class="form-group">
          <label for="productimage" class="col-sm-3 control-label">Product Image</label>
          <div class="col-sm-9">

      <input name="image" type="file" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_image']; ?>" class="form-control" id="productimage">

      </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">

      <?php if (isset($_GET['edit'])) { ?>
      <input type="hidden" name="oldpid" value="<?php echo $editrow['fld_product_id']; ?>">
      <button class="btn btn-default" type="submit" name="update"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Update</button>
      <?php } else { ?>
      <button class="btn btn-default" type="submit" name="create"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Create</button>
      <?php } ?>
      <button class="btn btn-default" type="reset"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span>Clear</button>

      </div>
      </div>

    </form>

    </div>
  </div>

    <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <div class="page-header">
        <h2>Products List</h2>
      </div>
      <table class="table table-striped table-bordered">

      <tr>
        <th>Product ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Brand</th>
        <th>Type</th>
        <th>Colour</th>
        <th>Production Country</th>
        <th></th>
      </tr>

      <?php
      // Read

      $per_page = 5;
      if (isset($_GET["page"]))
        $page = $_GET["page"];
      else
        $page = 1;
      $start_from = ($page-1) * $per_page;

      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM tbl_products_a160841_pt2 LIMIT $start_from, $per_page");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $readrow) {
      ?>  

      <tr>
        <td><?php echo $readrow['fld_product_id']; ?></td>
        <td><?php echo $readrow['fld_product_name']; ?></td>
        <td><?php $num = $readrow['fld_product_price']; 
        $formattedNum = number_format($num, 2);
        echo $formattedNum; ?></td>
        <td><?php echo $readrow['fld_product_brand']; ?></td>
        <td><?php echo $readrow['fld_product_type']; ?></td>
        <td><?php echo $readrow['fld_product_colour']; ?></td>
        <td><?php echo $readrow['fld_production_country']; ?></td>
        <td>
          <a href="products_details.php?pid=<?php echo $readrow['fld_product_id']; ?>" class="btn btn-warning btn-xs" role="button">Details</a>
          <a href="products.php?edit=<?php echo $readrow['fld_product_id']; ?>" class="btn btn-success btn-xs" role="button">Edit</a>
          <a href="products.php?delete=<?php echo $readrow['fld_product_id']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>
        </td>
      </tr>
      <?php
      }
      $conn = null;
      ?>

    </table>

    </div>
  </div>

  <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <nav>
          <ul class="pagination">
          <?php
          try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM tbl_products_a160841_pt2");
            $stmt->execute();
            $result = $stmt->fetchAll();
            $total_records = count($result);
          }
          catch(PDOException $e){
                echo "Error: " . $e->getMessage();
          }
          $total_pages = ceil($total_records / $per_page);
          ?>
          <?php if ($page==1) { ?>
            <li class="disabled"><span aria-hidden="true">«</span></li>
          <?php } else { ?>
            <li><a href="products.php?page=<?php echo $page-1 ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
          <?php
          }
          for ($i=1; $i<=$total_pages; $i++)
            if ($i == $page)
              echo "<li class=\"active\"><a href=\"products.php?page=$i\">$i</a></li>";
            else
              echo "<li><a href=\"products.php?page=$i\">$i</a></li>";
          ?>
          <?php if ($page==$total_pages) { ?>
            <li class="disabled"><span aria-hidden="true">»</span></li>
          <?php } else { ?>
            <li><a href="products.php?page=<?php echo $page+1 ?>" aria-label="Previous"><span aria-hidden="true">»</span></a></li>
          <?php } ?>
        </ul>
      </nav>
    </div>
  </div>

  </div>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>