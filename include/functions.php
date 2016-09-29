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


/**
 * Makes an mysqli query to get id, article title, short description, date and GET query string for all blog posts
 *
 * @param $con OBJECT the value returned by the database connection script
 * @return ARRAY an indexed array containing associative arrays representing table rows.
 */
function query_archive($con) {
    // Request data from database
    $result = mysqli_query($con, "
    SELECT `id`, `name`, `desc`, `date_created`, `slug`
    FROM `articles`
    ORDER BY `date_created` DESC    
    "
    );

    // Put data into an indexed array, each element of which is an assoc. array representing a row of the table
    $result_archive = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $result_archive;
}

/**
 * Takes an array of blog posts and puts out an html string containing a link for each one, containing the title, date
 * and short description for each one.
 *
 * @param $blog_posts ARRAY an indexed array, each element of which is an assoc. array representing a row of the table
 * (one post).
 * @return STRING a collection of anchor tags for all the previous posts, to go on the archive page
 */
function links_archive($blog_posts) {
    $links = '';
    foreach ($blog_posts as $post) {
        $links .= "
<a class='large-list-item' href=\"blog.php?page=article&title=" . $post['slug'] . "\">
    <div class=\"column1\">" . $post['name'] . "
    </div>
    <div class=\"column2\">" . $post['date_created'] . "
    </div>
    <div class=\"column3\">" . $post['desc'] . "
    </div>
</a>
";
    }
    return $links;
}

/**
 * Makes an mysqli query to get id, article title, body, short description, date and GET query string for one blog post
 *
 * @param $con OBJECT the value returned by the database connection script
 * @return ARRAY an associative array representing the table row for the blog post.
 */
function query_article($con) {
    $article = $_GET['title'];
    // Request data from database
    $result = mysqli_query($con, "
    SELECT `id`, `name`, `body`, `synopsis`, `date_created`, `slug`
    FROM `articles`
    WHERE `slug` = '$article'
    "
    );

    // Put row data into an associative array
    $result_article = mysqli_fetch_assoc($result);

    return $result_article;
}

/**
 * Takes a blog post and puts out an html string which displays the title, synopsis and body of the post.
 *
 * @param $blog_posts ARRAY an associative array representing the table row for the blog post.
 * @return STRING html to display the synopsis and body of the post.
 */
function generate_article($blog_post) {
    $article = '<p>' . $blog_post['synopsis'] . '</p>';
    $article .= '<p>' . $blog_post['body'] . '</p>';
    return $article;
}
?>