<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin() ?>
    <?= $form->field($login_model, 'login')->textInput() ?>
    <?= $form->field($login_model, 'password')->passwordInput() ?>

    <div class="form-group" style="display:flex">
        <a class="btn btn-primary" href="<?php echo Url::to(['site/sign_up']); ?>" role="button">Sign on</a>
        <div>
            <?= Html::submitButton('Sign in', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>
