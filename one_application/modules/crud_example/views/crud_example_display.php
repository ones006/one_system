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
        #date {
            font-style: italic;
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
        <?php echo anchor('crud_example/index', 'Admin Home'); ?> 
    </div>
   <div id="content">
        <h2><?php echo (isset($title)) ? $title : ''; ?></h2>
        <p id="date">Date: <?php echo (isset($date)) ? $date : ''; ?>;</p>
        <?php echo (isset($content)) ? $content : ''; ?>
    </div>
    <div id="footer">
        &copy; Copyright 2011 Matthew Craig.  All rights reserved.
    </div>
</body>
</html>
