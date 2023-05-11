<?php

use yii\bootstrap5\ActiveForm;

$this->title = $courseMaterial->name;
$this->params['breadcrumbs'][] = ['label' => 'Список Курсов', 'url' => ['course-list']];
$this->params['breadcrumbs'][] = $this->title;

?>


<?php if(Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success w-75">
        <?= Yii::$app->session->getFlash('success') ?>
    </div>
<?php endif; ?>

<?php if(Yii::$app->session->hasFlash('error')): ?>
    <div class="alert alert-danger w-75">
        <?= Yii::$app->session->getFlash('error') ?>
    </div>
<?php endif; ?>

<div>
    <div class="row ">
        <div class="col-lg-6">
            <div class="ibox">
                <?php $form = ActiveForm::begin([
                    'action' => ["/admin/course-materials/{$courseMaterial->id}"],
                    'options' => [
                        'data-pjax' => 1
                    ]
                ]); ?>
                    <?= $form->field($courseMaterial, 'name')->textInput(['value' => $courseMaterial->name]) ?>
                    <?= $form->field($courseMaterial, 'description')->textarea(['rows' => 5, 'value' => $courseMaterial->description]) ?>
                    <button class="btn btn-primary w-auto">Update</button>
                <?php ActiveForm::end() ?>
                <br>
                <form onsubmit="uploadLink(event)">
                    <div class="ibox-content d-flex"> 
                        <input class="form-control" id="link" placeholder="Ссылка на внешний источник" >
                        <button class="btn btn-primary" style="width: 100px; margin-left: 15px">Загрузить</button>
                    </div>
                </form>
                <form onsubmit="uploadFile(event)">
                    <div class="ibox-content d-flex">
                        <input class="form-control" id="file"  name='materials-file' placeholder="Файл" type="file"
                               accept=".pdf, .docx, .mp4">
                        <button class="btn btn-primary" style="width: 100px; margin-left: 15px">Загрузить</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    function uploadFile(e){
        e.preventDefault();
        let formData = new FormData();
        let file = document.querySelector('input[name="materials-file"]').files[0];
        formData.append('file', file);
        $.ajax({
            url: "/admin/upload-file?id=" + <?php echo $courseMaterial->id ?>,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'json',
            success : function(){

            },
            error : function () {

            },
        })
    }

    function uploadLink(e){
        e.preventDefault();
        let link = $('#link').val();
        $.ajax({
            url: `/admin/update-link?link=`+link+"&"+"id=<?php echo $courseMaterial->id ?>",
            type: "POST",
            data: {link: link},
            contentType: false,
            processData: false,
            dataType: 'json',
            success : function(){

            },
            error : function () {

            },
        })
    }



</script>

