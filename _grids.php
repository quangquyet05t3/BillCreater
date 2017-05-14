<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Grids - jQuery Mobile Demos</title>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <link rel="stylesheet" href="jquery-mobile/demos/css/themes/default/jquery.mobile-1.4.5.min.css">
    <link rel="stylesheet" href="jquery-mobile/demos/_assets/css/jqm-demos.css">
    <script src="jquery-mobile/demos/js/jquery.js"></script>
    <script src="jquery-mobile/demos/_assets/js/index.js"></script>
    <script src="jquery-mobile/demos/js/jquery.mobile-1.4.5.min.js"></script>
</head>
<body>
<div data-role="page" class="jqm-demos" data-quicklinks="true">
<div role="main" class="ui-content jqm-content">

    <p>And an example of a 3 column grid with buttons inside:</p>

    <div data-demo-html="true">
        <fieldset class="ui-grid-b">
            <div class="ui-block-a"><input type="button" value="Hmm"></div>
            <div class="ui-block-b"><input type="reset" value="No"></div>
            <div class="ui-block-c"><input type="submit" value="Yes"></div>
        </fieldset>
    </div><!--/demo-html -->

    <p>View more examples of <a href="../grids-buttons/" data-ajax="false">buttons in grids</a>.</p>

    <h2>Four-column grids</h2>

    <p>A four-column, 25/25/25/25% grid is created by specifying <code>class=ui-grid-c</code> on the parent and adding a fourth block. </p>

    <div data-demo-html="true">
        <div class="ui-grid-c">
            <div class="ui-block-a"><div class="ui-bar ui-bar-a" style="height:60px">Block A</div></div>
            <div class="ui-block-b"><div class="ui-bar ui-bar-a" style="height:60px">Block B</div></div>
            <div class="ui-block-c"><div class="ui-bar ui-bar-a" style="height:60px">Block C</div></div>
            <div class="ui-block-d"><div class="ui-bar ui-bar-a" style="height:60px">Block D</div></div>
        </div><!-- /grid-c -->
    </div><!--/demo-html -->

    <h2>Five-column grids</h2>

    <p>A five-column, 20/20/20/20/20% grid is created by specifying <code>class=ui-grid-d</code> on the parent and adding a fifth block. </p>

    <div data-demo-html="true">
        <div class="ui-grid-d">
            <div class="ui-block-a"><div class="ui-bar ui-bar-a" style="height:60px">Block A</div></div>
            <div class="ui-block-b"><div class="ui-bar ui-bar-a" style="height:60px">Block B</div></div>
            <div class="ui-block-c"><div class="ui-bar ui-bar-a" style="height:60px">Block C</div></div>
            <div class="ui-block-d"><div class="ui-bar ui-bar-a" style="height:60px">Block D</div></div>
            <div class="ui-block-e"><div class="ui-bar ui-bar-a" style="height:60px">Block E</div></div>
        </div><!-- /grid-c -->
    </div><!--/demo-html -->

</div><!-- /content -->
</div><!-- /page -->

</body>
</html>
