<?php

    use yii\bootstrap5\ActiveForm;
    use yii\helpers\ArrayHelper;
    use yii\widgets\Pjax;
    use yii\helpers\Html;
    use yii\bootstrap5\Nav;
?>
<div>
    <?= $this->render('main') ?>
</div>


<div id="materials">
    
   <div class="admin-create-course" >
        <div>
            <?php 
                $form = ActiveForm::begin([
                    'action' => ['admin/materials'],
                    'method' => 'post'
                ])
            ?>      <?php Pjax::begin() ?>
                        <?=
                            $form->field($section, 'course_id')->dropDownList(ArrayHelper::map($courses, 'id', 'name'),[
                                'prompt' => 'Выберите курс',
                                'id' => 'courses',
                            ]);
                        ?>
                    <?php Pjax::end() ?>

                        <div id="section">
                            <?php 
                                $items = ArrayHelper::map($sectionItems,'course_sections_id', 'name',  );
                                $params = [
                                    'prompt' => 'Выберите Раздел',
                                    'options' => [
                                        'style' => 'display: flex; justify-content: center'
                                    ]
                                ];
                                echo $form->field($section, 'course_sections_id')->dropDownList($items,$params);
                            ?>
                        </div>
                    
                    <div class="row">
                        <div class="col-md-2">
                            <?= $form->field($section, 'name',  ['options' => ['class' => 'm-b-sm input-s-lg']])->input('name') ?>
                            <div class="form-group">
                                <?= Html::submitButton('Загрузить', ['class' => 'btn btn-primary', 'style' => 'width: 100px']) ?>
                            </div>
                        </div>
                    </div>
            <?php 
                ActiveForm::end();
            ?>
        </div>
    </div> 

</div>


<!-- <div class="admin-create-course">
    <div>
        <?php 
            $form = ActiveForm::begin([
                'action' => ['admin/materials'],
                'method' => 'post'
            ])
        ?>
            <?php 

                $items = ArrayHelper::map($courses, 'id', 'name');
                $params = [
                    'prompt' => 'Выберите Курс'
                ];

                echo $form->field($section, 'course_id')->dropDownList($items,$params);

                $items = ArrayHelper::map($sectionItems,'course_materials_id', 'name', 'id', );
                $params = [
                    'prompt' => 'Выберите Раздел',
                ];

                echo $form->field($section, 'course_materials_id')->dropDownList($items,$params);
            
            ?>
            <div class="row">
                <div class="col-md-2">
                    <?= $form->field($section, 'name',  ['options' => ['class' => 'm-b-sm input-s-lg']])->input('name') ?>
                    <button class="btn btn-sm btn-primary" type="submit"><strong>Add</strong></button>
                </div>
            </div>
        <?php 
            ActiveForm::end();
        ?>
    </div>
</div> -->


<script type="text/javascript">


    document.getElementById('courses').addEventListener('change', function() {
        const id = this.value;
        $.ajax({
            url: '/admin/materials?id='+id,
            method: "GET",
            success: function(data){
                // спарсили html
                const d = $($.parseHTML(data));
                // получаем секцию с id section и заменяем разметку в section на новую полученну разметку
                $('#section').html($('#section', d));
            }
        })
    })


</script>