<style>
    .img-fluid {
        max-width: 50%;
        height: 150PX;
    }
    /* styles.css */

    .property-item {
        border: 1px solid #ccc;
        padding: 15px;
        background-color: #f7f7f7;
        margin-bottom: 20px;
        position: relative;
    }

    .property-item img {
        max-width: 100%;
        height: auto;
        display: block;
        margin: 0 auto;
        border: 1px solid #ddd;
        padding: 5px;
    }

    .property-title {
        font-size: 18px;
        margin: 10px 0;
    }

    .property-price {
        font-weight: bold;
        color: #007bff;
    }

    .property-features {
        display: flex;
        justify-content: space-between;
        font-size: 14px;
        color: #555;
        margin-top: 10px;
    }

    .property-type {
        background-color: #007bff;
        color: white;
        padding: 5px 10px;
        position: absolute;
        top: 10px;
        left: 10px;
        border-radius: 5px;
    }

    .property-info-link {
        display: inline-block;
        margin-top: 10px;
        background-color: #007bff;
        color: white;
        padding: 5px 10px;
        border: none;
        border-radius: 5px;
        text-decoration: none;
    }
    .property-item {
        /* Existing styles */
        border: 1px solid #ccc;
        padding: 15px;
        background-color: #f7f7f7;
        margin-bottom: 20px;
        position: relative;
    }

    .property-item img {
        max-width: 100%;
        max-height: 200px; /* Set a fixed maximum height */
        width: auto;
        display: block;
        margin: 0 auto;
        border: 1px solid #ddd;
        padding: 5px;
    }

    .button {
        padding: 2px 20px;
        font-size: 22px;
        text-align: center;
        cursor: pointer;
        outline: none;
        color: #fff;
        background-color: #04AA6D;
        border: none;
        border-radius: 15px;
        box-shadow: 0 9px #999;
    }

    .button:hover {
        background-color: #3e8e41
    }

    .button:active {
        background-color: #3e8e41;
        box-shadow: 0 5px #666;
        transform: translateY(4px);
    }

</style>
<?php
require('./connection.php');

$query = "SELECT id , imagepath, cost, type, built, bhk, bathroom, listingtype FROM property";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo '<div class="tab-content"><div id="tab-1" class="tab-pane fade show p-0 active"><div class="row g-4">';
    while ($row = mysqli_fetch_assoc($result)) {
        $imag = $row['imagepath'];
        $price = $row['cost'];
        $title = $row['type'];
        $size = $row["built"];
        $beds = $row["bhk"];
        $baths = $row["bathroom"];
        $typee = $row["listingtype"];
        ?>
        <div class="col-lg-4 col-md-6">
            <!-- HTML code to display the property -->
            <div class="property-item rounded overflow-hidden">
                <div class="position-relative overflow-hidden">
                    <div class="p-4 pb-0">
                        <!--<h6 class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3"><?php echo $typee; ?></h6>-->
                        <h7 class="text-primary mb-3"><img class="img-fluid" src="<?php echo $imag; ?>" alt="property image"></h7><br><br>
                        <h2 class="d-block h5 mb-2"><?php echo $title; ?></h2>
                        <p class="text-primary mb-3">Price: <?php echo $price; ?></p>
                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i><?php echo $size; ?> Sqft</small>
                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i><?php echo $beds; ?> Bed</small>
                        <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i><?php echo $baths; ?> Bath</small>
                        <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3"><?php echo $typee; ?></div><br><br>
                        <center>
                            <a href="login.php"><button class="btninfo">Info</button></a>
                        </center>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    echo '</div></div></div>';
} else {
    echo "No properties found.";
}
?>