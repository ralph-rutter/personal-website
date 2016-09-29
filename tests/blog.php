<?php

require('../blog.php');

class StackTest extends PHPUnit_Framework_TestCase
{
    /**
     * Defines an array containing dummy data and passes it into the function and compares the output with what was
     * expected.
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
}

?>