<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin() ?>
   <h1><?php echo $model->score ?>fuuuuuuu!</h1>

    <div class="form-group" style="display:flex">
        <a class="btn btn-primary" href="<?php echo Url::to(['site/sign_up']); ?>" role="button">Sign on</a>
        <div>
            <?= Html::submitButton('Sign in', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>