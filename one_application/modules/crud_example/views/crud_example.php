<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Crud_example</title>
    <style type="text/css" media="screen">
        body {
            width: 650px;
            margin: 0 auto;
        }
        div {
            padding: .3em;
        }
        table {
            width: 100%;
        }
        td {
            border-bottom: 1px solid #000;
        }
        .even {
            background-color: #aaa;
        }
        .odd {
            background-color: #fff;
        }
        .error {
            background-color: #fdd;
            border: 1px solid red;
            margin: .3em;
        }
        #nav {
            border: 1px solid black;
        }
        #footer {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>CRUD for Codeigniter 2.0.x Example</h1>
    <div id="nav">
        <?php echo anchor('crud_example/index/', 'Admin Home'); ?> | <?php echo anchor('crud_example/add', 'Add new Entry'); ?>
    </div>
    <?php 
    // if there is any pagination display it.
    if (isset($pagination) && !empty($pagination)) 
    {   
        echo '<div id="pagination">' . $pagination . '</div>';
    }
    ?>
    <div id="content">
        <?php echo (isset($content)) ? $content : ''; ?>
    </div>
    <div id="footer">
        &copy; Copyright 2011 Matthew Craig.  All rights reserved.
    </div>
</body>
</html>
