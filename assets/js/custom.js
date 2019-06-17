$(document).ready(function () {
    var root = document.location.hostname;
    console.log(root);

    $("#department").change(function () {
        var keyword = $(this).val();
        console.log(keyword);
        jx.load('../ajx.php?action=querydepartment&keyword='+keyword, function (data) {
            var obj = jQuery.parseJSON( data );
            var len = obj['teachers'].length;
                $("#teacher").empty();
                $("#teacher").append("<option value='"+0+"'>"+ +"</option>");
                for (var i = 0; i < len; i++) {
                    var tid = obj['teachers'][i]['id'];
                    var tname = obj['teachers'][i]['teacher_name'];
                    $("#teacher").append("<option value='" + tid + "'>" + tname + "</option>");
                }
                var len2 = obj['courses'].length;
                     $("#course").empty();
                     $("#course").append("<option value='"+0+"'>"+ +"</option>");
                     for (var i = 0; i < len2; i++) {
                     var cid = obj['courses'][i]['cid'];
                     var cname = obj['courses'][i]['course_name'];
                     $("#course").append("<option value='" + cid + "'>" + cname + "</option>");
                }


            });
        });
    $("#teacher").change(function () {
        var keyword = $(this).val();
        jx.load('../ajx.php?action=queryteacher&keyword='+keyword, function (data) {
            var obj = jQuery.parseJSON( data );
            var len = obj.length;

                $("#teacher_credit").empty();
                $("#teacher_remaining_credit").empty();
                for (var i = 0; i < len; i++) {
                    var taken = obj[i]['teacher_creditTaken'];
                    var remaining = obj[i]['teacher_remainingcredit'];

                    $("#teacher_credit").val(taken);
                    $("#teacher_remaining_credit").val(remaining);
                }

            });
        });


    $("#course").change(function () {
        var keyword = $(this).val();
        jx.load('../ajx.php?action=querycourse&keyword='+keyword, function (data) {
            var obj = jQuery.parseJSON( data );
            var len = obj.length;
            $("#course_name").empty();
            $("#course_credit").empty();
            for (var i = 0; i < len; i++) {
                var name = obj[i]['course_name'];
                var credit = obj[i]['course_cradite'];

                $("#course_name").val(name);
                $("#course_credit").val(credit);
            }
        });
    });

    $('#d_code').keyup(function () {
        var d_code = $(this).val();
        jx.load('../ajx.php?action=checkCode&keyword='+d_code, function (data) {
            $('#check-code').html(data); // Do what you want with the 'data' variable.
        });
    });
    $('#d_name').keyup(function () {
        var d_name = $(this).val();
        jx.load('../ajx.php?action=checkName&keyword='+d_name, function (data) {
            $('#check-name').html(data); // Do what you want with the 'data' variable.
        });
    });
    $("#schedulINdepartment").change(function () {
        var keyword = $(this).val();
        console.log(keyword);
        jx.load('../ajx.php?action=queryClassSchedul&keyword='+keyword, function (data) {
            $('tbody').html(data);


        });
    });
     $("#regno").change(function () {
            var keyword = $(this).val();
            console.log(keyword);
            jx.load('../ajx.php?action=queryRegno&keyword='+keyword, function (data) {
                var obj = jQuery.parseJSON( data );
                var len = obj['student'].length;

                $("#name").empty();
                $("#email").empty();
                $("#department").empty();
                    var name = obj['student']['student_name'];
                    var email = obj['student']['student_email'];
                    var department = obj['student']['department_id'];

                    $("#name").val(name);
                    $("#email").val(email);
                    $("#department").val(department);

                var len = obj['courses'].length;
                $("#course").empty();
                $("#course").append("<option value='"+0+"'>"+ +"</option>");
                for (var i = 0; i < len; i++) {
                    var cid = obj['courses'][i]['cid'];
                    var cname = obj['courses'][i]['course_name'];
                    $("#course").append("<option value='" + cid + "'>" + cname + "</option>");
                }



            });
        });

});