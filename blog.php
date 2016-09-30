<!DOCTYPE html>
<html>
<?php
include 'include/functions.php';
include 'include/connect.php';
switch ($_GET['page']) {
    case 'most-recent':
        $result_most_recent = query_most_recent($con, 3); //getting data for most recent posts
        break;
    case 'archive':
        $result_archive = query_archive($con); //getting data for archive
        break;
    case 'article':
        $result_article = query_article($con); //getting data for an article
        break;
}
mysqli_close($con); //closing connection with database
?>
<head>
    <title>Ralph Rutter</title>
    <?php
    require 'include/links.php';
    ?>
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
                    <h1>
                        <?php
                        switch ($_GET['page']) { //changes subtitle depending on the page
                            case 'most-recent':
                                echo 'Recent Posts';
                                break;
                            case 'archive':
                                echo 'Archive';
                                break;
                            case 'article':
                                echo $result_article['name']; //echoes  title of  article specified in the query string
                                break;
                        }
                        ?>
                    </h1>
                </div>
            </div>
            <a href="blog.php?page=archive" class="tab-button">Archive</a>
        </div>
        <div class="content">
            <?php
            switch ($_GET['page']) { //outputs content depending on the page
                case 'most-recent':
                    echo links_most_recent($result_most_recent); //outputs links to most recent articles
                    break;
                case 'archive':
                    echo links_archive($result_archive); //outputs links to all articles
                    break;
                case 'article':
                    echo generate_article($result_article); //outputs the article specified in the query string (GET)
                    break;
            }
            ?>
        </div>
    </div>
</div>
<header>
    <a class="nav-button previous" href="portfolio.php">
        <img src="images/portfolio-icon.png" alt="portfolio icon">
    </a>
    <a class="nav-button next" href="about.php">
        <img src="images/about-icon.png" alt="about icon">
    </a>
</header>
<main>
</main>
<nav>
    <a class="big-button" href="contact.php">Get In Touch</a>
    <div id="nav-bar">
        <a class="button" href="about.php">
            <div class="icon-container">
                <div class="icon">
                </div>
            </div>
            <div>
                About Me
            </div>
        </a>
        <a class="button" href="index.php">
            <div class="icon-container">
                <div class="icon">
                </div>
            </div>
            <div>
                Home
            </div>
        </a>
        <a class="button" href="portfolio.php">
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