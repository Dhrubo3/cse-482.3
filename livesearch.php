<?php
include('config/constants.php');
if (isset($_GET['q'])) {
    $search = mysqli_real_escape_string($conn, $_GET['q']);
    echo "Search Query: " . $search; // Debug output

    $sql = "SELECT * FROM tbl_food WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
    

    // Rest of your code...
    if (isset($_GET['q'])) {
        $search = mysqli_real_escape_string($conn, $_GET['q']);
    
        $sql = "SELECT * FROM tbl_food WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);
    
        if ($count > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $id = $row['id'];
                $title = $row['title'];
                $price = $row['price'];
                $description = $row['description'];
                $image_name = $row['image_name'];
    
                // Output the search results in HTML format
                echo '<div class="food-menu-box">';
                echo '<div class="food-menu-img">';
    
                if ($image_name == "") {
                    echo "<div class='error'>Image not Available.</div>";
                } else {
                    echo '<img src="' . SITEURL . 'images/food/' . $image_name . ' class="img-responsive img-curve">';
                }
    
                echo '</div>';
                echo '<div class="food-menu-desc">';
                echo '<h4>' . $title . '</h4>';
                echo '<p class="food-price">' . $price . '</p>';
                echo '<p class="food-detail">' . $description . '</p>';
                echo '<br>';
                echo '<a href="#" class="btn btn-primary">Order Now</a>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo "<div class='error'>Food not found.</div>";
        }
    }
}
    ?>


