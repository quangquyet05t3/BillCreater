
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>External and internal panels</title>
    <link rel="shortcut icon" href="jquery-mobile/demos/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="jquery-mobile/demos/css/themes/default/jquery.mobile-1.4.5.min.css">
    <script src="jquery-mobile/demos/js/jquery.js"></script>
    <script src="jquery-mobile/demos/js/jquery.mobile-1.4.5.min.js"></script>
    <script>
        $( document ).on( "pagecreate", function() {
            $( "body > [data-role='panel']" ).panel();
            $( "body > [data-role='panel'] [data-role='listview']" ).listview();
        });
        $( document ).one( "pageshow", function() {
            $( "body > [data-role='header']" ).toolbar();
            $( "body > [data-role='header'] [data-role='navbar']" ).navbar();
        });
    </script>
</head>
<body>

<div data-role="header" data-position="fixed" data-theme="a">
    <h1>Bill Creater</h1>
    <a href="#outside" data-icon="bars" data-iconpos="notext">Menu</a>
</div><!-- /header -->

<div data-role="page" id="a">

    <div role="main" class="ui-content">

        <h2>Page C</h2>

        <p>Content</p>

        <p>The left panel and fixed header are outside the page. The right panel and fixed footer are inside the pages.</p>

    </div><!-- /content -->


</div><!-- /page -->

<div data-role="panel" id="outside" data-theme="b">
    <ul data-role="listview">
        <li data-icon="back"><a href="#" data-rel="close">Close</a></li>
        <li><a href="panel.php">Page A</a></li>
        <li><a href="page-b.php">Page B</a></li>
        <li><a href="page-c.php">Page C</a></li>
    </ul>
</div>

</body>
</html>
