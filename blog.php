<!DOCTYPE html>
<html>
<?php
//connect to database
$con = mysqli_connect("192.168.20.56","root","","my_blog");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Request data from database
$result = mysqli_query($con, "
    SELECT `id`, `name`, `desc`, `date_created`, `slug`
    FROM `articles`
    ORDER BY `date_created` DESC    
    LIMIT 4
    "
);

// Put data into an indexed array, each element of which is an assoc. array representing a row of the table
$result_most_recent = mysqli_fetch_all($result, $resulttype = MYSQLI_ASSOC);

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
            foreach ($result_most_recent as $key => $value) {
                echo "
                <a class='large-list-item' href=\"blog.php?page=article&title=" . $result_most_recent[$key]['slug'] . "\">
                    <div class=\"column1\">" . $result_most_recent[$key]['name'] . "
                    </div>
                    <div class=\"column2\">" . $result_most_recent[$key]['date_created'] . "
                    </div>
                    <div class=\"column3\">" . $result_most_recent[$key]['desc'] . "
                    </div>
                </a>
                ";
            }
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