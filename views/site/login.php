<style>
    body {
        background: url('http://localhost/unijorge/image/unijorge.jpg') fixed;
        background-size: cover;
        padding: 0;
        margin: 0;
    }

    .wrap {
        width: 100%;
        height: 100%;
        min-height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        z-index: 99;
    }

    p.form-title {
        font-family: 'Open Sans', sans-serif;
        font-size: 20px;
        font-weight: 600;
        text-align: center;
        color: #FFFFFF;
        margin-top: 5%;
        text-transform: uppercase;
        letter-spacing: 4px;
    }

    form {
        width: 250px;
        margin: 0 auto;
    }

    form.login input[type="text"], form.login input[type="password"] {
        width: 100%;
        margin: 0;
        padding: 5px 10px;
        background: 0;
        border: 0;
        border-bottom: 1px solid #FFFFFF;
        outline: 0;
        font-style: italic;
        font-size: 12px;
        font-weight: 400;
        letter-spacing: 1px;
        margin-bottom: 5px;
        color: #FFFFFF;
        outline: 0;
    }

    form.login input[type="submit"] {
        width: 100%;
        font-size: 14px;
        text-transform: uppercase;
        font-weight: 500;
        margin-top: 16px;
        outline: 0;
        cursor: pointer;
        letter-spacing: 1px;
    }

    form.login input[type="submit"]:hover {
        transition: background-color 0.5s ease;
    }

    form.login .remember-forgot {
        float: left;
        width: 100%;
        margin: 10px 0 0 0;
    }

    form.login .forgot-pass-content {
        min-height: 20px;
        margin-top: 10px;
        margin-bottom: 10px;
    }

    form.login label, form.login a {
        font-size: 12px;
        font-weight: 400;
        color: #FFFFFF;
    }

    form.login a {
        transition: color 0.5s ease;
    }

    form.login a:hover {
        color: #2ecc71;
    }

    .pr-wrap {
        width: 100%;
        height: 100%;
        min-height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        z-index: 999;
        display: none;
    }

    .show-pass-reset {
        display: block !important;
    }

    .pass-reset {
        margin: 0 auto;
        width: 250px;
        position: relative;
        margin-top: 22%;
        z-index: 999;
        background: #FFFFFF;
        padding: 20px 15px;
    }

    .pass-reset label {
        font-size: 12px;
        font-weight: 400;
        margin-bottom: 15px;
    }

    .pass-reset input[type="email"] {
        width: 100%;
        margin: 5px 0 0 0;
        padding: 5px 10px;
        background: 0;
        border: 0;
        border-bottom: 1px solid #000000;
        outline: 0;
        font-style: italic;
        font-size: 12px;
        font-weight: 400;
        letter-spacing: 1px;
        margin-bottom: 5px;
        color: #000000;
        outline: 0;
    }

    .pass-reset input[type="submit"] {
        width: 100%;
        border: 0;
        font-size: 14px;
        text-transform: uppercase;
        font-weight: 500;
        margin-top: 10px;
        outline: 0;
        cursor: pointer;
        letter-spacing: 1px;
    }

    .pass-reset input[type="submit"]:hover {
        transition: background-color 0.5s ease;
    }

    .posted-by {
        position: absolute;
        bottom: 26px;
        margin: 0 auto;
        color: #FFF;
        background-color: rgba(0, 0, 0, 0.66);
        padding: 10px;
        left: 45%;
    }

    .containerClass {
        margin-top: 6%;
        border: 2px solid;
        color: #434344;
        border-radius: 30px;
        align-items: center;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
        margin-right: 30%;
        margin-left: 30%;
        background: #7e98b2;
    }
</style>

<div class="container" >
    <div class="row">
        <div class="col-md-12">
            <div class="wrap">
                <div class="containerClass">
                    <?php use yii\bootstrap\ActiveForm;
                    use yii\bootstrap\Html;
                    use yii\widgets\MaskedInput;

                    $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'layout' => 'horizontal',
                        'fieldConfig' => [
                            'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                            'horizontalCssClasses' => [
                                'label' => 'row',
                                'offset' => 'col',
                                'wrapper' => 'col',
                                'error' => '',
                                'hint' => '',
                            ],
                        ],
                    ]); ?>
                    <br>
                    <div class="customer-form">
                    <div class="row">
                        <div class="col-sm-8" style="margin-left: 13%">
                            <?= $form->field($model, 'usuario_cpf')->widget(MaskedInput::className(), [
                                'mask' => '999.999.999-99',
                            ]) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3" style="margin-left: 13%">
                            <?= $form->field($model, 'usuario_senha')->passwordInput(['style' => 'width:auto; margin:auto']) ?>
                        </div>
                    </div>
                    </div>
                    <div class="col">
                        <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button', 'style' => 'width:50%; margin-left:25%']) ?>
                    </div>
                    <br>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
        <div class="posted-by">Posted By: <a href="http://www.jquery2dotnet.com">Adelson, Vinicius</a></div>
    </div>























