<style>
    /*.boot_alert{
        display: none;
    }*/
</style>
<?php
/**
 * @var $this SiteController
 */
$this->pageTitle = Yii::app()->name . ' - Blog';
$this->breadcrumbs = array(
    'Create Blog',
);
?>
<script type="text/javascript">
    $(document).ready(function () {
        $(".alert").hide();
        <?php if (!$model) {?>
        $("#alert_noblog").show();
        /*swal({
         title: 'No blogs found',
         type: 'info',
         html:
         'Try adding new one',
         showCloseButton: false,
         showCancelButton: false,
         confirmButtonText:
         '<i class="fa fa-thumbs-up"></i> Ok'
         });*/

        <?php }?>
    });

    function insert() {
        $(".alert").hide();

        var title = $('#title').val();
        var text = $('#text').val();
        var date = new Date();

        $.ajax({
            url: 'update',
            type: 'POST',
            dataType: 'json',
            data: {
                id: '0',
                title: title,
                date: date,
                text: text
            },
            success: function (data) {

                $("#alert_insert").show();

                setTimeout(function () {
                    window.location.reload();
                }, 900);
            },
            error: function (data) {
//                alert(data);
            }
        });

    }

    function update(id) {

        $(".alert").hide();
        var title = $('#title' + id).val();
        var text = $('#text' + id).val();
        var date = new Date();
        $.ajax({
            url: 'update',
            type: 'POST',
            dataType: 'json',
            data: {
                id: id,
                title: title,
                date: date,
                text: text
            },
            success: function (data) {
                $("#alert_update").show();

                setTimeout(function () {
                    window.location.reload();
                }, 900);

            },
            error: function (data) {

            }
        });
    }

    function remove_blog(id) {
        $(".alert").hide();
        /* swal({
         title: 'Blog has been deleted',
         type: 'warning',
         showCloseButton: false,
         showCancelButton: false,
         showConfirmButton: false,
         timer:1000
         });*/

        $.ajax({
            url: 'delete',
            type: 'POST',
            dataType: 'json',
            data: {
                id: id
            },
            success: function (data) {

                $("#alert_delete").show();
                setTimeout(function () {
                    window.location.reload();
                }, 900);

            },
            error: function (data) {
            }
        });


    }

</script>
<div class="alert alert-dismissible alert-primary navbar-fixed-top container" id="alert_noblog">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <h4>No Blog Found!!!</h4>
    Try Adding New One
</div>
<div class="alert alert-dismissible alert-warning navbar-fixed-top container" id="alert_delete">
    <div class="container">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <h4>Blog Deleted!!!</h4>
        </div>
</div>
<div class="alert alert-dismissible alert-success navbar-fixed-top container" id="alert_insert">
    <div class="container">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <h4>Blog Successfully Inserted!!!</h4>
    </div>
</div>
<div class="alert alert-dismissible alert-info navbar-fixed-top container" id="alert_update">
    <div class="container">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <h4>Blog Successfully Updated!!!</h4>
    </div>
</div>

<?php if (!$model) { ?>
<?php } else { ?>
    <?php foreach ($model as $test) {
        ?>
        <div class="insert_block" id="<?php echo $test->id ?>">
            <?php $form = $this->beginWidget('CActiveForm', array(
                    'enableAjaxValidation' => false,
                    'htmlOptions' => array('enctype' => 'multipart/form-data')
                )
            ); ?>

            <div class="form-group label-floating">

                <?php echo CHtml::label('Title', 'title' . $test->id, array('class' => 'control-label')); ?>
                <?php echo CHtml::textField('title' . $test->id, $test->title, array('class' => 'form-control')); ?>

            </div>
            <div class="form-group label-floating">

                <?php
                echo CHtml::label('Text', 'text' . $test->id, array('class' => 'control-label'));
                echo CHtml::textField('text' . $test->id, $test->text, array('class' => 'form-control'));
                ?>

            </div>

            <?php echo CHtml::htmlButton('Update', array('class' => 'btn btn-success btn-raised ripple-effect', 'onclick' => 'update(' . $test->id . ')')); ?>
            <?php echo CHtml::htmlButton('Delete', array('class' => 'btn btn-danger btn-raised ripple-effect', 'onclick' => 'remove_blog(' . $test->id . ')')); ?>
            <?php echo CHtml::htmlButton($test->date, array('class' => 'btn btn-default ', 'style' => 'float:right', 'disabled' => true)); ?>

            <?php $this->endWidget(); ?>
        </div>
    <?php }
}
?>
<div class="insert_block">
    <?php $form = $this->beginWidget(
        'CActiveForm',
        array(
            'enableAjaxValidation' => false,
            'htmlOptions' => array('enctype' => 'multipart/form-data'),
        )
    );
    ?>
    <div class="form-group label-floating">
        <?php
        echo CHtml::label('Title', 'title', array('class' => 'control-label'));
        echo CHtml::textField('title', "A flash message", array('class' => 'form-control'));
        ?>
    </div>
    <div class="form-group label-floating">
        <?php
        echo CHtml::label('Text', 'text', array('class' => 'control-label'));
        echo CHtml::textField(
            'text',
            "A flash message is used in order to keep a message in session through one or several requests of the same user. By default, it is removed from session after it has been displayed to the user.",
            array('class' => 'form-control')
        );
        ?>
    </div>
    <?php
    echo CHtml::button(
        'Insert',
        array(
            'class' => 'btn btn-raised btn-success',
            'onclick' => 'insert()'
        )
    );
    $this->endWidget();
    ?>
</div>

