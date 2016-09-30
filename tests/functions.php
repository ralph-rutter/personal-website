<?php

require '../include/functions.php';

class StackTest extends PHPUnit_Framework_TestCase
{


    public function test_query_most_recent() {
        $this->markTestSkipped(
            'This function involves a database query, so unsuitable for unit testing, an integration test needed'
        );
    }




    /**
     * Defines an array containing dummy data and passes it into the function and compares the output, for equality,
     * with what was expected.
     */
    public function test_links_most_recent_good()
    {
        $test_array = [
            ['slug' => 'slimeball', 'name' => 'jim', 'date_created' => 'yesterday', 'synopsis' => 'not bad'],
            ['slug' => 'slimey', 'name' => 'bob', 'date_created' => 'today', 'synopsis' => 'better'],
            ['slug' => 'slimier', 'name' => 'mcgregor', 'date_created' => 'tomorrow', 'synopsis' => 'terrible']
        ];

        $test_me = links_most_recent($test_array);
        $this->assertEquals(
            $test_me, "
<a class='large-list-item' href=\"blog.php?page=article&title=slimeball\">
    <div class=\"column1\">jim
    </div>
    <div class=\"column2\">yesterday
    </div>
    <div class=\"column3\">not bad
    </div>
</a>

<a class='large-list-item' href=\"blog.php?page=article&title=slimey\">
    <div class=\"column1\">bob
    </div>
    <div class=\"column2\">today
    </div>
    <div class=\"column3\">better
    </div>
</a>

<a class='large-list-item' href=\"blog.php?page=article&title=slimier\">
    <div class=\"column1\">mcgregor
    </div>
    <div class=\"column2\">tomorrow
    </div>
    <div class=\"column3\">terrible
    </div>
</a>
"
        );
    }

    /**
     * Defines an empty array, passes it into the function and compares the output, for equality, with an empty string.
     */
    public function test_links_most_recent_bad()
    {
        $test_array = [];
        $test_me = links_most_recent($test_array);
        $this->assertEquals($test_me, '');
    }

    /**
     * Passes an integer into the function and compares the output with an empty string.
     */

    /**
     * @expectedException PHPUnit_Framework_Error
     */
    public function test_links_most_recent_malform()
    {
        $test_array = 3;
        $test_me = links_most_recent($test_array);
        $this->assertEquals($test_me, '');
    }




    public function test_query_archive() {
        $this->markTestSkipped(
            'This function involves a database query, so unsuitable for unit testing, an integration test needed'
        );
    }




    /**
     * Defines an array containing dummy data and passes it into the function and compares the output, for equality,
     * with what was expected.
     */
    public function test_links_archive_good()
    {
        $test_array = [
            ['slug' => 'slimeball', 'name' => 'jim', 'date_created' => 'yesterday', 'desc' => 'not bad'],
            ['slug' => 'slimey', 'name' => 'bob', 'date_created' => 'today', 'desc' => 'better'],
            ['slug' => 'slimier', 'name' => 'mcgregor', 'date_created' => 'tomorrow', 'desc' => 'terrible']
        ];

        $test_me = links_archive($test_array);
        $this->assertEquals(
            $test_me, "
<a class='large-list-item' href=\"blog.php?page=article&title=slimeball\">
    <div class=\"column1\">jim
    </div>
    <div class=\"column2\">yesterday
    </div>
    <div class=\"column3\">not bad
    </div>
</a>

<a class='large-list-item' href=\"blog.php?page=article&title=slimey\">
    <div class=\"column1\">bob
    </div>
    <div class=\"column2\">today
    </div>
    <div class=\"column3\">better
    </div>
</a>

<a class='large-list-item' href=\"blog.php?page=article&title=slimier\">
    <div class=\"column1\">mcgregor
    </div>
    <div class=\"column2\">tomorrow
    </div>
    <div class=\"column3\">terrible
    </div>
</a>
"
        );
    }

    /**
     * Defines an empty array, passes it into the function and compares the output, for equality, with an empty string.
     */
    public function test_links_archive_bad()
    {
        $test_array = [];
        $test_me = links_archive($test_array);
        $this->assertEquals($test_me, '');
    }

    /**
     * Passes an integer into the function and compares the output with an empty string.
     */

    /**
     * @expectedException PHPUnit_Framework_Error
     */
    public function test_links_archive_malform()
    {
        $test_array = 3;
        $test_me = links_archive($test_array);
        $this->assertEquals($test_me, '');
    }



    public function test_query_article() {
        $this->markTestSkipped(
            'This function involves a database query, so unsuitable for unit testing, an integration test needed'
        );
    }




    /**
     * Defines an array containing dummy data and passes it into the function and compares the output, for equality,
     * with what was expected.
     */
    public function test_generate_article_good()
    {
        $test_array = [
            'slug' => 'slimeball',
            'name' => 'jim',
            'date_created' => 'yesterday',
            'synopsis' => 'not bad',
            'body' => 'skinny'
        ];

        $test_me = generate_article($test_array);
        $this->assertEquals(
            $test_me, "<p>not bad</p><p>skinny</p>"
        );
    }

    /**
     * Defines an empty array, passes it into the function and compares the output, for equality, with an empty string.
     */
    public function test_generate_article_bad()
    {
        $test_array = [];
        $test_me = generate_article($test_array);
        $this->assertEquals($test_me, '');
    }

    /**
     * Passes an integer into the function and compares the output with an empty string.
     */
    public function test_generate_article_malform()
    {
        $test_array = 3;
        $test_me = generate_article($test_array);
        $this->assertEquals($test_me, '');
    }
}

?>