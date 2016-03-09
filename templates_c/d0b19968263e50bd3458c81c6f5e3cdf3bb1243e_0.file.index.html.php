<?php
/* Smarty version 3.1.29, created on 2016-03-09 10:58:14
  from "C:\Users\hannes.schulze01\Documents\xampp\htdocs\filecms\themes\clean\index.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56dff3b625c332_13335785',
  'file_dependency' => 
  array (
    'd0b19968263e50bd3458c81c6f5e3cdf3bb1243e' => 
    array (
      0 => 'C:\\Users\\hannes.schulze01\\Documents\\xampp\\htdocs\\filecms\\themes\\clean\\index.html',
      1 => 1457517491,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56dff3b625c332_13335785 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $_smarty_tpl->tpl_vars['metaTitle']->value;?>
</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['templateDir']->value;?>
/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['templateDir']->value;?>
/css/clean-blog.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Home</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <?php
$_from = $_smarty_tpl->tpl_vars['arrMenu']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_menuItem_0_saved_item = isset($_smarty_tpl->tpl_vars['menuItem']) ? $_smarty_tpl->tpl_vars['menuItem'] : false;
$_smarty_tpl->tpl_vars['menuItem'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['menuItem']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['menuItem']->value) {
$_smarty_tpl->tpl_vars['menuItem']->_loop = true;
$__foreach_menuItem_0_saved_local_item = $_smarty_tpl->tpl_vars['menuItem'];
?>
                    <li><a href="index.php?page=<?php echo $_smarty_tpl->tpl_vars['menuItem']->value[0];?>
"><?php echo $_smarty_tpl->tpl_vars['menuItem']->value[1];?>
</a></li>
                    <?php
$_smarty_tpl->tpl_vars['menuItem'] = $__foreach_menuItem_0_saved_local_item;
}
if ($__foreach_menuItem_0_saved_item) {
$_smarty_tpl->tpl_vars['menuItem'] = $__foreach_menuItem_0_saved_item;
}
?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('<?php echo $_smarty_tpl->tpl_vars['templateDir']->value;?>
/img/home-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1><?php echo $_smarty_tpl->tpl_vars['pageName']->value;?>
</h1>
                        <hr class="small">
                        <span class="subheading"><?php echo $_smarty_tpl->tpl_vars['pagenameSubtitle']->value;?>
</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div>
                    <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

                </div>
                
                <!--
                <div class="post-preview">
                    <a href="post.html">
                        <h2 class="post-title">
                            Man must explore, and this is exploration at its greatest
                        </h2>
                        <h3 class="post-subtitle">
                            Problems look mighty small from 150 miles up
                        </h3>
                    </a>
                    <p class="post-meta">Posted by <a href="#">Start Bootstrap</a> on September 24, 2014</p>
                </div>
                <hr>
                <div class="post-preview">
                    <a href="post.html">
                        <h2 class="post-title">
                            I believe every human has a finite number of heartbeats. I don't intend to waste any of mine.
                        </h2>
                    </a>
                    <p class="post-meta">Posted by <a href="#">Start Bootstrap</a> on September 18, 2014</p>
                </div>
                <hr>
                <div class="post-preview">
                    <a href="post.html">
                        <h2 class="post-title">
                            Science has not yet mastered prophecy
                        </h2>
                        <h3 class="post-subtitle">
                            We predict too much for the next year and yet far too little for the next ten.
                        </h3>
                    </a>
                    <p class="post-meta">Posted by <a href="#">Start Bootstrap</a> on August 24, 2014</p>
                </div>
                <hr>
                <div class="post-preview">
                    <a href="post.html">
                        <h2 class="post-title">
                            Failure is not an option
                        </h2>
                        <h3 class="post-subtitle">
                            Many say exploration is part of our destiny, but it’s actually our duty to future generations.
                        </h3>
                    </a>
                    <p class="post-meta">Posted by <a href="#">Start Bootstrap</a> on July 8, 2014</p>
                </div>
                <hr>
                
                <ul class="pager">
                    <li class="next">
                        <a href="#">Older Posts &rarr;</a>
                    </li>
                </ul>
                -->
            </div>
        </div>
    </div>

    <hr>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <ul class="list-inline text-center">
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <p class="copyright text-muted">Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['templateDir']->value;?>
/js/jquery.js"><?php echo '</script'; ?>
>

    <!-- Bootstrap Core JavaScript -->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['templateDir']->value;?>
/js/bootstrap.min.js"><?php echo '</script'; ?>
>

    <!-- Custom Theme JavaScript -->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['templateDir']->value;?>
/js/clean-blog.min.js"><?php echo '</script'; ?>
>

</body>

</html>
<?php }
}
