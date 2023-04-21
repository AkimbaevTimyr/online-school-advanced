<?php
use miloschuman\highcharts\Highmaps;
use yii\bootstrap5\Tabs;
use yii\helpers\Url;

?>

<div class="d-flex flex-column h-100" >
    <div class="d-flex h-100">
        <div class="course">
                <h1><?= $course->name ?> Курс</h1>

                <?php $this->beginBlock('visits'); ?>
                    <div class="course-statistics">
                        <?php
                            $current_month = date('m');
                            $monthes = array("Январь","Февраль","Март","Апрель","Май","Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь" );

                            $m = substr($current_month, 1);

                            echo Highmaps::widget([
                                'id' => 'maps',
                                'options' => [
                                    'chart' => [
                                        'type' => 'pie',
                                    ],
                                    'credits' => [
                                        "enabled" => false,
                                    ],
                                    'title' => [
                                    'text' => 'Статистика посещений за ' . $monthes[$m-1] . '' ,
                                    'style' => [
                                        'align' => 'left'
                                    ],
                                    ],
                                    'accessibility' => [
                                        'announceNewData' => [
                                            'enabled' => 'true',
                                        ],
                                        'point' => [
                                        ],
                                    ],
                                    'plotOptions' => [
                                        'series' => [
                                            'dataLabels' => [
                                                'enabled' => 'true',
                                                'format' => '{point.name}: {point.y} уроков'
                                            ],
                                        ],
                                        'pie' => [
                                            'allowPointSelect' => true,
                                            'cursor' => 'pointer',
                                            'dataLabels' =>  [
                                                    'enabled' => false,
                                            ],
                                            'showInLegend'=> true,
                                        ],
                                    ],
                                    'series' => [
                                    [
                                        'data' => [
                                            [
                                                'name' => 'Посещено',
                                                'y' => 23,
                                            ],
                                            [
                                                'name' => 'Пропущено',
                                                'y' => 5,
                                            ],

                                        ],
                                        'joinBy' => 'hc-key',
                                        'name' => 'Статистика посещений',
                                    ],
                                    ],
                                ],
                            ]);
                        ?>
                    </div>
                <?php $this->endBlock(); ?>

                <?php $this->beginBlock('DatePicker'); ?>
                    <div class="yii2fullcalendar">
                        <?= yii2fullcalendar\yii2fullcalendar::widget(array(
                            'clientOptions' => [
                                'height' => 650,
                                'selectable' => false,
                                'selectHelper' => true,
                                'droppable' => false,
                                'editable' => false,
                                'fixedWeekCount' => false,
                                'defaultDate' => date('Y-m-d'),
                            ],
                            'options' => [
                                'lang' => 'ru',
                            ],
                            'ajaxEvents' => $events,
                        ));?>
                    </div>
                <?php $this->endBlock(); ?>

                <?php $this->beginBlock('CourseMaterials') ?>
                    <div class="black" style="font-size: 16px; margin-bottom: 10px; margin-left: 5px; margin-top: 20px">
                        <?php echo $sectionsCount ?> раздела - <?php echo $sectionMaterialsCount?> лекций
                    </div>
                    <div class="accordion" id="accordionExample">
                        <?php foreach ($course_materials as $index => $course_item): ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading<?php echo $index; ?>">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $index; ?>" aria-expanded="false" aria-controls="collapse<?php echo $index; ?>">
                                        <?= $course_item->name ?>
                                    </button>
                                </h2>
                                <?php foreach ($course_materials_items as $item): ?>
                                    <?php if($course_item->course_sections_id == $item->course_sections_id): ?>
                                        <div id="collapse<?php echo $index; ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $index; ?>" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <a href="<?php echo Url::to(['app/course-materials', 'id' => $item->id]); ?>" class="black"><?= $item->name ?></a>
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
                        'label' => 'Посещения',

                        'content' => $this->blocks['visits'],
                        'active' => true,
                    ],
                    [
                        'label' => 'Календарь',
                        'content' => $this->blocks['DatePicker'],
                    ],
                    [
                        'label' => 'Материалы курса',
                        'content' => $this->blocks['CourseMaterials'],
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>


