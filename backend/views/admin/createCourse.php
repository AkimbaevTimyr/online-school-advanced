<?php

use mihaildev\ckeditor\CKEditor;
use yii\helpers\Html;
    use yii\bootstrap5\Nav;
?>


<div class="d-flex">
    <div>
        <?php echo $this->render("/admin/sidebar.php"); ?>
    </div>
    <div class="main-body gray-bg" >
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0; height: 60px">
            <div class="navbar-header">
            </div>
            <ul class="nav navbar-top-links navbar-right" style="margin-right: 20px;">
                <?php
                echo Nav::widget([
                    'options' => ['class' => 'navbar-nav align-center'],
                    'items' => [
                        Yii::$app->user->isGuest
                            ? ['label' => 'Login', 'url' => ['/user/login']]
                            : '<li class="nav-item">'
                            . Html::beginForm(['/user/logout'])
                            . Html::submitButton(
                                'Выйти',
                                ['class' => 'm-t-xs nav-link btn logout']
                            )
                            . Html::endForm()
                            . '</li>'
                    ]
                ]);
                ?>
            </ul>
        </nav>
        <div id="main-body-content">
            <div class="gray-bg p-m course-wrapper">
                <div class="wrapper wrapper-content animated fadeInRight">
                    <div class="row" style="width: 750px">
                        <div id="alert-success" class="alert alert-success" style="display: none" >
                            Курс успешно создан
                        </div>
                        <div id="alert-danger" class="alert alert-danger" style="display: none" >
                            Произошла ошибка при добавлении курса
                        </div>
                        <div class="col-lg-12">
                            <div class="ibox ">
                                <div class="ibox-title">
                                    <h5>Заполните поля для добавления нового курса.</h5>
                                </div>
                                <form id="form" onsubmit="handleSubmit(event)" class="needs-validation" method="post" enctype="multipart/form-data" novalidate>
                                    <div class="ibox-content">
                                        <div class="mb-3 flex">
                                            <label class="form-label">Название Курса</label>
                                            <div class="d-block">
                                                <input id="courseName" type="text" class="form-control" style="width: 500px" name="courseName" required>
                                                <div class="invalid-feedback">
                                                    Пожалуйста заполните название курса
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 flex">
                                            <label class="form-label">Продолжительность курса</label>
                                            <div class="d-block">
                                                <input id="courseTime" type="number" min="1" class="form-control" style="width: 500px" name="courseTime" required>
                                                <div class="invalid-feedback">
                                                    Пожалуйста заполните название курса
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 flex">
                                            <label class="form-label">Описание курса</label>
                                            <div class="d-block">
                                                <input id="courseDescription" type="text" min="1" class="form-control" style="width: 500px" name="courseDescription" required>
                                                <div class="invalid-feedback">
                                                    Пожалуйста заполните название курса
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 flex">
                                            <label class="form-label">Описание профессии</label>
                                            <div class="d-block">
                                                <?= CKEditor::widget([
                                                    'name' => 'professionDescription',
                                                    'options' => ['id' => 'professionDescription'],
                                                    'editorOptions' => [
                                                        'height' => 50,
                                                        'width' => 500,
                                                        'toolbar' => [
                                                            ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript'],
                                                            ['NumberedList', 'BulletedList', 'Blockquote'],
                                                            ['Link', 'Unlink', 'Anchor'],
                                                            ['Image', 'Table', 'HorizontalRule', 'SpecialChar'],
                                                            ['Format', 'Font', 'FontSize'],
                                                            ['TextColor', 'BGColor'],
                                                            ['Maximize', 'ShowBlocks', 'Undo', 'Redo'],
                                                        ],
                                                    ],
                                                ]) ?>
                                                <div class="invalid-feedback">
                                                    Пожалуйста заполните название курса
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 flex">
                                            <label class="form-label" >Изображения курса</label>
                                            <div class="d-block">
                                                <input class="form-control" name="courseImg" type="file" id="formFile" style="width: 500px" required>
                                                <div class="invalid-feedback">
                                                    Пожалуйста прикрепите файлы
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="ibox-content">
                                        <fieldset id="ibox-section-1" class="ibox-content card">
                                            <div class="mb-3 flex" >
                                                <label class="form-label">Раздел</label>
                                                <div class="flex">
                                                    <div class="d-block">
                                                        <input id="sectionName-1"  name="courseMaterials[]" type="text" class="form-control" style="width: 500px" required>
                                                        <div class="invalid-feedback">
                                                            Пожалуйста заполните раздел
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="border-bottom: 1px solid #d3d3d3;"></div>
                                            <div id="materials" class="mt-3">
                                                <div class="mb-3 flex">
                                                    <label class="form-label">Тема</label>
                                                    <div class="flex">
                                                        <div class="d-block">
                                                            <div class="invalid-feedback">
                                                                Пожалуйста заполните тему
                                                            </div>
                                                            <input id="courseMaterials-1" name="courseMaterials[]" type="text" class="form-control" style="width: 450px" required >
                                                        </div>
                                                        <button onclick="onMaterialsClick(this)" type="button" id="add-material"   class="btn btn-primary" style="width: 40px; height: 38px; margin-left: 10px">+</button>
                                                    </div>
                                                </div>
                                                <div class="mb-3 flex">
                                                    <label class="form-label">Описание</label>
                                                    <div class="flex">
                                                        <div class="d-block">
                                                            <input id="courseMaterials-1" name="description[]" type="text" class="form-control" style="width: 500px" required >
                                                            <div class="invalid-feedback">
                                                                Пожалуйста заполните описание
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 flex">
                                                    <label class="form-label" >Прикрепить файл</label>
                                                    <div class="d-block">
                                                        <input class="form-control" name="file[]" type="file" id="formFile" style="width: 500px" required>
                                                        <div class="invalid-feedback">
                                                            Пожалуйста прикрепите файлы
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-offset-4 " >
                                                <button onclick="onSectionClick()" type="button" class="btn border" style="min-width: 100px">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"></path>
                                                    </svg>
                                                    Раздел
                                                </button>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="ibox-content">
                                        <div class="form-group row">
                                            <div class="col-sm-offset-4" >
                                                <button id="button" type="submit" class="btn btn-primary" style="min-width: 100px">Создать</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="display: none">
        <fieldset id="ibox-section" class="ibox-content card" >
            <div class="mb-3 flex">
                <label class="form-label">Раздел</label>
                <div class="flex">
                    <input id="sectionName"  name="courseMaterials[]" type="text" class="form-control" style="width: 450px" required >
                    <button onclick="onSectionDelete(this)" data-del="delete" type="button" id="delete-section" class="btn btn-danger" style="width: 40px; height: 38px; margin-left: 10px">-</button>
                </div>
            </div>
            <div style="border-bottom: 1px solid #d3d3d3;"></div>
            <div id="materials" class="mt-3">
                <div class="mb-3 flex">
                    <label class="form-label">Тема</label>
                    <div class="flex">
                        <input id="courseMaterials" name="courseMaterials[]" type="text" accept=".doc,.docx,.txt,.pdf" class="form-control" style="width: 450px" required>
                        <button onclick="onMaterialsClick(this)" type="button" id="add-material" class="btn btn-primary" style="width: 40px; height: 38px; margin-left: 10px">+</button>
                    </div>
                </div>
                <div class="mb-3 flex">
                    <label class="form-label">Описание</label>
                    <div class="flex">
                        <input id="courseMaterials-1" name="description[]" type="text" class="form-control" style="width: 500px" required >
                    </div>
                </div>
                <div class="mb-3 flex">
                    <label class="form-label" >Прикрепить файл</label>
                    <input class="form-control" name="file[]" type="file" id="formFile" style="width: 500px" required>
                </div>
            </div>
            <button onclick="onSectionClick()" type="button" class="btn border" style="min-width: 100px">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"></path>
                </svg>
                Раздел
            </button>
        </fieldset>
    </div>
</div>






<script type="text/javascript">

    let id = 1;
    let materialsId = 0;

    const parentSection = document.getElementById('ibox-section');
    const parentMaterials = document.getElementById('materials-block');

    const uploadTypeSelect = document.getElementById('upload-type');
    const fileInput = document.getElementById('file-input');
    const linkInput = document.getElementById('link-input');
    uploadTypeSelect.addEventListener('change', (event) => {
        if (event.target.value === 'file') {
            fileInput.style.display = 'block';
            linkInput.style.display = 'none';
        } else {
            fileInput.style.display = 'none';
            linkInput.style.display = 'block';
        }
    });

    function onSectionClick(){
        id++;
        var copy = parentSection.cloneNode(true);
        copy.id = `ibox-section-${id}`
        $('#ibox-content').append(copy);
    }

    function onMaterialsClick(el){
        let section = el.parentNode.parentNode.parentNode.parentNode;
        $(section.childNodes[5]).append(`
            <div style="border-top: 1px solid #d3d3d3" >
                <div class="mb-3 flex" id="materials-block" style="margin-top: 10px">
                            <label class="form-label">Тема</label>
                            <div class="flex">
                                <input id="courseMaterials" type="text" class="form-control" style="width: 450px" name="courseMaterials[]" required>
                                <button onclick="onMaterialsDelete(this)" type="button" id="add-material" class="btn btn-danger" style="width: 40px; height: 38px; margin-left: 10px">-</button>
                            </div>
                </div>
                <div class="mb-3 flex">
                    <label class="form-label">Описание</label>
                    <div class="flex">
                        <input id="courseMaterials-1" type="text" name="description[]" class="form-control" style="width: 500px" required>
                    </div>
                </div>
                   <div class="mb-3 flex">
                    <label class="form-label" >Прикрепить файл</label>
                    <input class="form-control" name="file[]" type="file" id="formFile" style="width: 500px" required>
                </div>
           </div>
    `);
    }

    function onSectionDelete(el)
    {
        el.parentNode.parentNode.parentNode.remove();
    }

    function onMaterialsDelete(el)
    {
        el.parentNode.parentNode.parentNode.remove();
    }

    function handleSubmit(e){
        let f = document.getElementById('form')

        e.preventDefault();

        if (f.checkValidity() == false) {
            e.preventDefault()
            e.stopPropagation();
            f.classList.add('was-validated');
        } else {
            f.classList.remove('was-validated');
            let forms  = document.forms[1].getElementsByTagName('fieldset'); //получаем поля из формы
            let items = [];  // храним fieldset
            let arr = []; // храним значения из полей в разных массивах
            let desc = [] // храним значения описаний

            for(let form of forms){
                items.push(form)
            }

            //получаем введенные данные из полей тема
            for(let item of items){
                let a =[]
                for (let i = 0; i < item.elements.length; i++) {
                    if(item.elements[i].nodeName === 'INPUT' && item.elements[i].type === "text" && item.elements[i].name === 'courseMaterials[]' ){
                        a.push(item.elements[i].value)
                    }
                }
                arr.push(a)
            }

            //получаем введенные данные из полей описание
            for(let item of items){
                let d = [] //desc
                for (let i = 0; i < item.elements.length; i++) {
                    if(item.elements[i].nodeName === 'INPUT' && item.elements[i].name === "description[]"){
                        d.push(item.elements[i].value)
                    }
                }
                desc.push(d)
            }

            let courseId = Math.floor(Math.random() * 10000);

            c = $('#courseName').val();

            let courseTime = $('#courseTime').val();
            let courseDescription = $('#courseDescription').val();
            let professionDescription = $('#professionDescription').val();
            let courseImg = document.querySelector('input[name="courseImg"]').files[0];

            let courseInformation = {
                course_time : courseTime,
                course_description : courseDescription,
                about_profession : professionDescription,
            }

            console.log( courseTime)
            console.log( courseDescription)
            console.log( professionDescription)
            console.log( courseImg)

            let courseSectionsId;

            let lastArr = [];

            for(let item of arr){
                courseSectionsId = Math.floor(Math.random() * 185930);
                let a = [];
                let obj = {
                    name: item[0],
                    course_id: courseId,
                    course_sections_id:  courseSectionsId,
                };
                a.push(obj);
                for(let i = 1; i <= item.length; i++){
                    let courseMaterialsId = Math.floor(Math.random() * 185930);
                    let o = {
                        id: courseMaterialsId,
                        name: item[i],
                        course_id: courseId,
                        course_sections_id: courseSectionsId,
                        description : "",
                    }
                    a.push(o);
                }
                lastArr.push(a)
            }

            for (let i = 0; i < lastArr.length; i++) {
                for (let j = 0; j < lastArr[i].length; j++) {
                    if(lastArr[i][j+1] !== undefined){
                        lastArr[i][j+1].description = desc[i][j]
                    }
                }
            }

            course = {id: courseId, name: c}

            let formData = new FormData();

            let files = document.querySelectorAll('input[name="file[]"]');
            for(let j = 0; j<= files.length-1; j++){
                formData.append(`file[]`, files[j].files[0]);
            }

            formData.append('course', JSON.stringify(course));
            formData.append('arr', JSON.stringify(lastArr));
            formData.append('courseInformation', JSON.stringify(courseInformation));
            formData.append('courseImg', courseImg);

            $.ajax({
                url: `/admin/create`,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function (data) {
                    const block = document.getElementById('alert-danger');
                    block.style.display = 'block';
                    setTimeout(()=> {
                        block.style.display = 'none';
                    }, 2000)
                    console.log(data, 'success');
                },
                error: function (error) {
                    const block = document.getElementById('alert-success');
                    block.style.display = 'block';
                    setTimeout(()=> {
                        block.style.display = 'none';
                    }, 2000)
                    let f = document.getElementById('form');
                    f.reset();
                    for(let i = 2; i <= id; i++){
                        const parent = document.getElementById('ibox-content');
                        let child = document.getElementById(`ibox-section-${i}`);
                        parent.removeChild(child);
                    }
                },
            })
            for(let i = 2; i <= id; i++){
                const parent = document.getElementById('ibox-content');
                let child = document.getElementById(`ibox-section-${i}`);
                if(child){
                    parent.removeChild(child);
                }
            }
        }
    }
</script>



<!--Создаем раздел  и она сразу пушится в бд-->
<!--создаем лекцию и она сразу пушится в бд-->


