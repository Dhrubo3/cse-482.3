<?php
// Include your database connection and other necessary configurations
include('config/constants.php'); // Include your database connection script

if (isset($_GET['q'])) {
    $search = mysqli_real_escape_string($conn, $_GET['q']);
   // echo "Search Query: " . $search; // Debug output

    $sql = "SELECT * FROM tbl_category WHERE title LIKE '%$search%'";

    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);

    if ($count > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            $id = $row['id'];
            $title = $row['title'];
            $image_name = $row['image_name'];

            // Output the search results in HTML format
            echo '<div class="category-box">';
            echo '<div class="category-img">';

            if ($image_name == "") {
                echo "<div class='error'>Image not Available.</div>";
            } else {
                echo '<img src="' . SITEURL . 'images/category/' . $image_name . '" alt="' . $title . '" class="img-responsive img-curve">';
            }

            echo '</div>';
            echo '<div class="category-desc">';
            echo '<h4>' . $title . '</h4>';
            echo '<br>';
            echo '<a href="' . SITEURL . 'category-foods.php?category_id=' . $id . '" class="btn btn-primary">View Category</a>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo "<div class='error'>Category not found.</div>";
    }
}
?>
