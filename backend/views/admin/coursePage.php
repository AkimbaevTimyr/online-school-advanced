<?php

use yii\bootstrap5\Modal;
use yii\bootstrap5\Tabs;
use yii\helpers\Html;
use yii\bootstrap5\Nav;
use yii\helpers\Url;

?>


<div class="course">
    <div id="main-body-content" style="margin-left: 30px"">
    <div style="display: flex; align-items: center; max-width: 400px; justify-content: space-between; width: auto">
        <h1><?php echo $course->name ?> Курс</h1>
        <div>
            <?php echo \yii\helpers\Html::a('Delete', ['/admin/delete-course', 'id' => $course->id], [
                'class' => 'btn btn-danger',
                'data-method' => 'post',
                'data-confirm' => 'Вы уверены что хотите удалить данный курс?',
                'style' => 'width: 75px'
            ]) ?>
        </div>
    </div>

    <?php $this->beginBlock('DatePicker'); ?>

    <?php
    Modal::begin([
        'id' => 'crEvent',
        'size' => 'modal-md',
        'title' => 'Добавление события',
        'headerOptions' => ['class' => 'black'],
    ]);
    echo '<div id="modalContent"></div>';
    Modal::end();
    ?>

    <?php
    // Модальное окно просмотра и редактирования
    Modal::begin([
        'id' => 'view',
        'title' => 'Удаление и редактирование события',
        'headerOptions' => ['class' => 'black'],
    ]);
    Modal::end();
    ?>

    <div class="yii2fullcalendar">
        <?= yii2fullcalendar\yii2fullcalendar::widget(array(
            'clientOptions' => [
                'height' => 650,
                'selectable' => true,
                'selectHelper' => true,
                'droppable' => true,
                'editable' => true,
                'fixedWeekCount' => false,
                'defaultDate' => date('Y-m-d'),
                'dayClick' => new \yii\web\JsExpression("function(event){
                                            var date = $(this).attr('data-date');
                                                $.ajax({
                                                    url: '/admin/event',
                                                    type: 'GET',
                                                    data: {
                                                        date: date,
                                                        courseId: $course->id,
                                                    },
                                                    success: function(data) {
                                                        console.log(data)
                                                         $('#crEvent').modal('show')
                                                            .find('#modalContent')
                                                            .html(data);
                                                    },
                                                    error: function(error) {
                                                        alert(error);
                                                        console.log(error);
                                                    }
                                                });
                                        }"),
                'eventDrop' => new \yii\web\JsExpression("function(event, data, revertFunc){
                                            console.log(event.start)
                                            var eventData = {
                                                eventId: event.id,
                                                start: event.start.format(),
                                                end: event.end.format(),
                                            };
                                            $.ajax({
                                                url: '/admin/event-update',
                                                type: 'POST',
                                                data: eventData,
                                                success: function(response) {
                                                    console.log(response);
                                                },
                                                error: function(xhr, status, error) {
                                                    console.error(error);
                                                }
                                            })
                                        }"),
                'eventResize' => new \yii\web\JsExpression("function(event, data, revertFunc){
                                            console.log(event.start)
                                            var eventData = {
                                                eventId: event.id,
                                                start: event.start.format(),
                                                end: event.end.format(),
                                            };
                                            $.ajax({
                                                url: '/admin/event-update',
                                                type: 'POST',
                                                data: eventData,
                                                success: function(response) {
                                                    console.log(response);
                                                },
                                                error: function(xhr, status, error) {
                                                    console.error(error);
                                                }
                                            })
                                        }"),
                'eventClick' => new \yii\web\JsExpression("function(event) {
                                            viewUrl = '/admin/view?id=' + event.id;
                                            updateUrl = '/admin/event-update?id=' + event.id;
                                            $('#edit-link').attr('href', updateUrl);
                                              $('#view').find('.modal-body').load(viewUrl);
                                              $('#view').modal('show');
                                        }"),
            ],
            'options' => [
                'lang' => 'ru',
            ],
            'ajaxEvents' => $events,
        ));?>
    </div>
    <?php $this->endBlock(); ?>


    <?php $this->beginBlock('CourseStructure'); ?>
    <br>
    <div class="accordion" id="accordionExample">
        <?php foreach ($sections as $index => $section): ?>
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading<?php echo $index; ?>">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $index; ?>" aria-expanded="false" aria-controls="collapse<?php echo $index; ?>">
                        <?= $section->name ?>
                    </button>
                </h2>
                <?php foreach ($sectionsMaterials as $sectionsMaterial): ?>
                    <?php if($section->course_sections_id == $sectionsMaterial->course_sections_id): ?>
                        <div id="collapse<?php echo $index; ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $index; ?>" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <a href="<?php echo Url::to(['admin/course-materials', 'id' => $sectionsMaterial->id]); ?>" class="black"><?= $sectionsMaterial->name ?></a>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>
    <?php $this->endBlock(); ?>

    <?php echo Tabs::Widget([
        'items' => [
            [
                'label' => 'Календарь',
                'content' => $this->blocks['DatePicker'],
                'active' => true,
            ],
            [
                'label' => 'Структура курса',
                'content' => $this->blocks['CourseStructure'],
            ],
        ],
    ]); ?>
</div>





