<?php
/**
 * Makes an mysqli query to get id, article title, long description, date and GET query string for a specified number of
 * most recent blog posts
 *
 * @param $con OBJECT the value returned by the database connection script
 * @param $num INTEGER the number of articles wanted
 * @return ARRAY an indexed array containing associative arrays representing table rows.
 */
function query_most_recent($con, $num) {
    // Request data from database
    $result = mysqli_query($con, "
    SELECT `id`, `name`, `synopsis`, `date_created`, `slug`
    FROM `articles`
    ORDER BY `date_created` DESC    
    LIMIT $num
    "
    );

    // Put data into an indexed array, each element of which is an assoc. array representing a row of the table
    $result_most_recent = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $result_most_recent;
}

/**
 * Takes an array of blog posts and puts out an html string containing a link for each one, containing the title, date
 * and synopsis of each one.
 *
 * @param $blog_posts ARRAY an indexed array, each element of which is an assoc. array representing a row of the table
 * (one post).
 * @return STRING a collection of anchor tags for all the posts on 'most recent'
 */
function links_most_recent($blog_posts) {
    $links = '';
    foreach ($blog_posts as $post) {
        $links .= "
<a class='large-list-item' href=\"blog.php?page=article&title=" . $post['slug'] . "\">
    <div class=\"column1\">" . $post['name'] . "
    </div>
    <div class=\"column2\">" . $post['date_created'] . "
    </div>
    <div class=\"column3\">" . $post['synopsis'] . "
    </div>
</a>
";
    }
    return $links;
}

?>