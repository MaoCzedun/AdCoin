<?php
use yii\bootstrap\ActiveForm as BootForm;
use yii\bootstrap\Html as BootHtml;
$form = BootForm::begin();
?>
<?=$form->field($model,'email')?>
<?=$form->field($model,'password')->passwordInput()?>
<?=BootHtml::submitButton('Войти',['class'=>'btn btn-default'])?>
<?php BootForm::end()?>