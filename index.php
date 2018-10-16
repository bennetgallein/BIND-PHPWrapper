<?php
/**
 * Created by PhpStorm.
 * User: bennet
 * Date: 02.10.18
 * Time: 13:30
 */

use BIND\BIND;

include("vendor/autoload.php");

\Tracy\Debugger::enable();

$bind = new BIND("192.168.1.101");

//$suc = $bind->addRecord("test2.gallein2.de", "86400", "A", "192.168.1.2");

$a = $bind->getZone("gallein2.de");

//$a = $bind->getZone("gallein2.de")->getRecords();
?>
    <html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>DNS Table</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">


        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>

    <div class="container">
        <nav>
            <div class="nav-wrapper">
                <a href="#" class="brand-logo">Logo</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="sass.html">Sass</a></li>
                    <li><a href="badges.html">Components</a></li>
                    <li><a href="collapsible.html">JavaScript</a></li>
                </ul>
            </div>
        </nav>
        <table>
            <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>TTL</th>
                <th>Value</th>
            </tr>
            </thead>

            <tbody>
            <?php

            foreach ($a as $key => $record) {
                if (is_array($record->getAnswer())) {
                } else {
                    echo "<tr>";
                    echo "<th>" . $record->getName() . "</th>";
                    echo "<th>" . $record->getRecordType() . "</th>";
                    echo "<th>" . $record->getTTL() . "</th>";
                    echo "<th>" . $record->getAnswer() . "</th>";
                    echo "</tr>";
                }
            }
            ?>
            </tbody>
        </table>

    </div><!-- /.container -->
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    </body>
    </html>
<?php
//dump($a);
?>