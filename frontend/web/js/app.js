
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

function myCourseFunction(id) {
    $.ajax({
        url: '/app/course?id='+id,
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





