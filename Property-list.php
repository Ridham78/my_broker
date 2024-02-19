<?php
include 'connection.php';
$query = "SELECT imagepath, cost, type, built, bhk, bathroom, listingtype, p_id FROM property WHERE status = 1";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo '<div class="tab-content"><div id="tab-1" class="tab-pane fade show p-0 active"><div class="row g-4">';

    $propertyCount = 0;
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
                        <h7 class="text-primary mb-3"><img class="img-fluid" src="<?php echo $imag; ?>" alt="property image"></h7><br><br>
                        <h2 class="d-block h5 mb-2"><?php echo $title; ?></h2>
                        <p class="text-primary mb-3">Price: <?php echo $price; ?></p>
                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i><?php echo $size; ?> Sqft</small>
                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i><?php echo $beds; ?> Bed</small>
                        <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i><?php echo $baths; ?> Bath</small>
                        <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3"><?php echo $typee; ?></div><br>
                        <a href="info.php?id=<?php echo $_GET['id']; ?>&p_id=<?php echo $row['p_id']; ?>"><br>
                            <center>
                                <button class="btninfo">Info</button></a>
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