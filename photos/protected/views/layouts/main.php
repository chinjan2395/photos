<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="en">

    <!--blueprint CSS framework -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ripples.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-material-design.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">


    <!-- Javascript-->
    <script style="javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.js"></script>
    <script style="javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-min.js"></script>
    <script style="javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.js"></script>
    <script style="javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/sweetalert.js"></script>
    <script style="javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/material.js"></script>
    <script style="javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/ripples.js"></script>
    <script type="text/javascript" language="javascript"
            src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

</head>

<body>
<div class="navbar-header header">
    <div class="container">
    <span class="icon-bar"></span>
        <a href="/" class="navbar-brand"><?php echo CHtml::encode(Yii::app()->name); ?></a>
        <div id="w0-collapse" class="collapse navbar-collapse">
            <?php $this->widget('zii.widgets.CMenu', array('htmlOptions' => array('id' => 'w1', 'class' => 'navbar-nav navbar-right nav'),
                'items' => array(
                    array('label' => 'Home',    'url' => array('/')),
                    array('label' => 'Blog',    'url' => array('/site/create')),
                    array('label' => 'Import',    'url' => array('/site/initimport')),
                    array('label' => 'Export',  'url' => array('/site/export')),
                    array('label' => 'Places', 'url' => array('/site/initmap')),
                    array('label' => 'Login',   'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                    array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
                ),
            )); ?>
        </div>
    </div>
</div>

<div class="container" id="page">

    <?php if (isset($this->breadcrumbs)): ?>
        <?php $this->widget('zii.widgets.CBreadcrumbs',
            array(
            'links' => $this->breadcrumbs,
        )); ?>

    <?php endif ?>

    <?php echo $content; ?>

    <div class="clear"></div>

</div>

<script>
    $( document ).ready(function()
    {
        $(function()
        {
            $.material.init();
        });
    });
</script>

</body>
</html>
