<?php

$this->title = $courseMaterial->name;
$this->params['breadcrumbs'][] = ['label' => 'Список Курсов', 'url' => ['course-list']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div>
    <div class="row ">
        <div class="col-lg-6">
            <div class="ibox">
                <div class="ibox-content">
                    <h5><?php echo $courseMaterial->name ?></h5>
                </div>
                <div class="ibox-content">
                    <p>
                        <?php echo $courseMaterial->description ?>
                    </p>
                </div>
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

    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }


    function myCourseFunction(id) {
        $.ajax({
            url: '/site/course?id='+id,
            method: "GET",
            success: function(data) {
                $("#main-body-content").html(data);
            }
        })
        document.getElementById('main-body-content').classList.add("show");
    }

    function exitFunction() {
        $.ajax({
            url: '/user/logout',
            method: "POST",
            success: function() {
                console.log('exit')
            }
        })
    }

    window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    // openDropdown.classList.add('active');
                }
            }
        }
    }

</script>

