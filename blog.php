<!DOCTYPE html>
<html>
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

include 'connect.php';
$result_most_recent = query_most_recent($con, 5);
mysqli_close($con);
?>
<head>
    <title>Ralph Rutter</title>
    <link rel="stylesheet" type="text/css" href="css/global.css">
    <link rel="stylesheet" type="text/css" href="css/grid.css">
    <link rel="stylesheet" type="text/css" href="css/nav.css">
    <link rel="stylesheet" type="text/css" href="css/top-bar.css">
    <link rel="stylesheet" type="text/css" href="css/content.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/typography.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
</head>
<body>
<div id="top-bar">
    <div class="content-container">
        <div class="header-container">
            <div class="header">
                <div class="title">
                    <h2>Blog:</h2>
                </div>
                <div class="subtitle">
                <h1>Recent Posts</h1>
                </div>
            </div>
            <a href="blog.php?page=archive" class="tab-button">Archive</a>
        </div>
        <div class="content">
            <?php
            echo links_most_recent($result_most_recent);
            ?>
        </div>
    </div>
</div>
<header>
    <a class="nav-button previous" href="portfolio.html">
        <img src="images/portfolio-icon.png" alt="portfolio icon">
    </a>
    <a class="nav-button next" href="about.html">
        <img src="images/about-icon.png" alt="about icon">
    </a>
</header>
<main>
</main>
<nav>
    <a class="big-button" href="contact.html">Get In Touch</a>
    <div id="nav-bar">
        <a class="button" href="about.html">
            <div class="icon-container">
                <div class="icon">
                </div>
            </div>
            <div>
                About Me
            </div>
        </a>
        <a class="button" href="index.html">
            <div class="icon-container">
                <div class="icon">
                </div>
            </div>
            <div>
                Home
            </div>
        </a>
        <a class="button" href="portfolio.html">
            <div class="icon-container">
                <div class="icon">
                </div>
            </div>
            <div>
                Portfolio
            </div>
        </a>
        <a class="button current" href="blog.php?page=most-recent">
            <div class="icon-container">
                <div class="icon">
                </div>
            </div>
            <div>
                Blog
            </div>
        </a>
    </div>
</nav>
<footer>
    Icons made by Freepik from www.flaticon.com
</footer>
</body>
</html>