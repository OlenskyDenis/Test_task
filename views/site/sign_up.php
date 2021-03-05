<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin() ?>
    <?= $form->field($model, 'login')->textInput() ?>
    <?= $form->field($model, 'password')->passwordInput() ?>
    <?= $form->field($model, 'date_of_birth')->textInput(['type'=>'date', 'min'=>'2021-01-01','max'=>'2021-12-31']) ?>
    <span class="validity"></span>
    <div class="form-group" style="display:flex">
        <a class="btn btn-primary" href="<?php echo Url::to(['site/index']) ?>" role="button">Back</a>
        <div>
            <?= Html::submitButton('Register', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>
