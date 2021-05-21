const { flatMap, method } = require("lodash");



function AdminRegister() {
    var ad_name = $("#admin_name").val();
    var ad_email = $("#admin_email").val();
    var ad_password = $("#admin_password").val();

    if (ad_name == "" || ad_email == "" || ad_password == "") {
        $("#register_warning").delay(5).fadeIn('slow').delay(1500).fadeOut('slow');
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/admin-register',
        method: 'post',
        data: {
            name: ad_name,
            email: ad_email,
            password: ad_password
        },
        dataType: false,
        success: function(data) {
            if (data.data == '0') {
                $("#registered_user").delay(5).fadeIn('slow').delay(1500).fadeOut('slow');
            } else if (data.data == '1') {
                $("#register_success_alert").delay(5).fadeIn('slow').delay(1500).fadeOut('slow');
                $("#register_success_alert").html('<strong>Well done!</strong> You registered successfully.');
                setTimeout(function() {
                    window.location.href = "/login";
                }, 1500);

            }
        }
    });
}

function AdminLogin() {
    var ad_name = $("#lg_name").val();
    var ad_password = $("#lg_password").val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/admin-login',
        method: 'post',
        data: {
            email: ad_name,
            password: ad_password,
            role: '1'
        },
        dataType: false,
        success: function(data) {
            if (data.data == '1') {
                $("#login_success_alert").delay(5).fadeIn('slow').delay(1500).fadeOut('slow');
                $("#login_success_alert").html('<strong>Well done!</strong> You logged in successfully.');
                setTimeout(function() {
                    window.location.href = "/dashboard";
                }, 1500);

            } else if (data.data == '0') {
                $("#login_warning").delay(5).fadeIn('slow').delay(1500).fadeOut('slow');

            }
        }
    });
}


function ResetInformation() {
    $("#reset_info").show()
}

function ResetInfoCancel() {
    $("#reset_info").hide();
}

function ResetInfomation() {
    var reset_email = $("#reset_email").attr('value');
    var reset_pwd = $("#new_password").val();

    if (reset_pwd == "") {
        $("#reset_info_fault").delay(5).fadeIn('slow').delay(1500).fadeOut('slow');
        $("#reset_info_fault").html('<strong>Warning!</strong> Please insert new password.');
    } else {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/reset-password',
            method: 'post',
            data: {
                re_email: reset_email,
                re_password: reset_pwd
            },
            dataType: false,
            success: function(data) {
                if (data.data == "1") {
                    $("#reset_success_alert").delay(5).fadeIn('slow').delay(1500).fadeOut('slow');
                    $("#reset_success_alert").html('<strong>Well done!</strong> You changed the password successfully.');
                    setTimeout(function() {
                        location.reload();
                    }, 1500);
                }
            }
        });
    }
}


function AddCategory() {
    var category = $('#category-text-input').val();
    if (category == "") {
        $("#company_null").delay(5).fadeIn('slow').delay(1500).fadeOut('slow');
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: '/add-category',
        method: 'post',
        data: {
            category: category
        },
        dataType: 'json',
        success: function(data) {

            if (data.data == '0') {
                $("#company_fault").delay(5).fadeIn('slow').delay(1500).fadeOut('slow');
            } else if (data.data == '1') {
                $("#add_category_alert").delay(5).fadeIn('slow').delay(1500).fadeOut('slow');
                $("#add_category_alert").html('<strong>Well done!</strong> You added a piece of category successfully.');
                setTimeout(function() {
                    location.reload();
                }, 1500);

            }
        }
    });
}


var category_remove_id;

function RemoveCategory(elem) {
    category_remove_id = $(elem).attr('data-id');
    if (category_remove_id != "") {
        $('.myModal_Remove_Category').modal('show');
    }
}

function ConfirmRemoveCategory() {
    var remove_category = category_remove_id;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: '/remove-category',
        method: 'post',
        data: {
            id: remove_category
        },
        dataType: false,
        success: function(data) {
            if (data.data == "1") {
                $("#remove_category_alert").delay(5).fadeIn('slow').delay(1500).fadeOut('slow');
                $("#remove_category_alert").html('<strong>Well done!</strong> You removed a piece of category successfully.');
                setTimeout(function() {
                    location.reload();
                }, 1500);
            }
        }
    });
}

var category_edit_id;

function EditCategory(elem) {
    category_edit_id = $(elem).attr('data-id');
    var edit_category = $(elem).attr('value');
    let select_category_html = "";
    select_category_html += '<input class="form-control" type="text" placeholder="' + edit_category + '" id="category_text_input">';
    $('#edit_category').html(select_category_html);
}

function ConfirmEditCategory() {
    var edit_category_name = $('#category_text_input').val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: '/edit-category',
        method: 'post',
        data: {
            id: category_edit_id,
            name: edit_category_name
        },
        dataType: false,
        success: function(data) {
            if (data.data == "0") {
                $("#category_edit_fault").delay(5).fadeIn('slow').delay(1500).fadeOut('slow');
                $("#category_edit_fault").html("<strong>Confirm!</strong> You didn't update the company name.");
                setTimeout(function() {
                    $('.edit-model').modal('hide');
                }, 1500);
            } else if (data.data == "1") {
                $("#category_edit_success_alert").delay(5).fadeIn('slow').delay(1500).fadeOut('slow');
                $("#category_edit_success_alert").html('<strong>Well done!</strong> You removed a piece of category successfully.');
                setTimeout(function() {
                    location.reload();
                }, 1500);
                location.reload();
            }
        }
    });
}

function AddNews() {
    var category_id = $("#select_category").find(":selected").val();
    var add_news = $("#news_content").val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: '/add-news',
        method: 'post',
        data: {
            category_id: category_id,
            news_content: add_news
        },
        dataType: false,
        success: function(data) {
            if (data.data == "0") {
                $("#fault_news_alert").delay(5).fadeIn('slow').delay(1500).fadeOut('slow');
                $("#fault_news_alert").html('<strong>Oh snap!</strong> News already exists! If you want to update this news, please click the edit item in the News table.');
            } else if (data.data == "1") {
                $("#add_news_alert").delay(5).fadeIn('slow').delay(1500).fadeOut('slow');
                $("#add_news_alert").html('<strong>Well done!</strong> You added a piece of News successfully.');
                setTimeout(function() {
                    location.reload();
                }, 1500);
            }
        }
    });
}


var news_remove_id;

function RemoveNews(elem) {
    news_remove_id = $(elem).attr('data-id');
}

function ConfirmNews() {
    console.log(news_remove_id);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: '/news-remove',
        method: 'post',
        data: {
            news_id: news_remove_id
        },
        dataType: false,
        success: function(data) {
            if (data.data == "1") {
                $("#remove_news_alert").delay(5).fadeIn('slow').delay(1500).fadeOut('slow');
                $("#remove_news_alert").html('<strong>Well done!</strong> You removed a piece of News successfully.');
                setTimeout(function() {
                    location.reload();
                }, 1500);
            }
        }
    });
}


var news_edit_id;

function EditNews(elem) {
    var news_content = $(elem).attr('value');
    news_edit_id = $(elem).attr('data-id');
    let select_content_html = "";
    select_content_html += '<textarea required class="form-control" rows="8" id="edit_news_content" placeholder="' + news_content + '"></textarea>';
    $('#old_news_content').html(select_content_html);

}

function ConfirmEditNews() {
    var edit_news_content = $("#edit_news_content").val();

    if (edit_news_content == "") {
        $("#fault_news_edit_alert").delay(5).fadeIn('slow').delay(1500).fadeOut('slow');
        $("#fault_news_edit_alert").html("<strong>Warning!</strong> The news doesn't update yet. If you want to update this news, Please write the content correctly.");
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: '/edit-news',
        method: 'post',
        data: {
            news_id: news_edit_id,
            news_content: edit_news_content
        },
        dataType: false,
        success: function(data) {
            if (data.data == "1") {
                $("#edit_news_alert").delay(5).fadeIn('slow').delay(1500).fadeOut('slow');
                $("#edit_news_alert").html('<strong>Well done!</strong> You updated a piece of News successfully.');
                setTimeout(function() {
                    location.reload();
                }, 1500);
            }
        }
    });

}

function PublishProject() {
    var category_id = $("#publish_category").find(":selected").val();
    var first_slide_speed = $("#first_slide_speed").find(':selected').val();
    var second_slide_speed = $("#second_slide_speed").find(':selected').val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: '/publish-page',
        method: 'post',
        data: {
            id: category_id,
            slide_time_1: first_slide_speed,
            slide_time_2: second_slide_speed
        },
        dataType: false,
        success: function(data) {
            if (data.data == '1') {
                $("#publish_success_alert").delay(5).fadeIn('slow').delay(1500).fadeOut('slow');
                $("#publish_success_alert").html('<strong>Well done!</strong> You published this company successfully.');

            }
        }
    });
}

function PublishImage() {
    var category_id = $("#publish_category").find(":selected").val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/publish-img',
        method: 'post',
        data: {
            id: category_id
        },
        dataType: false,
        success: function(data) {
            if (data.data == "0") {
                $("#category_no_img").delay(5).fadeIn('slow').delay(1500).fadeOut('slow');
            }

            var count = data.data.length;
            var gallery_list = "";
            for (var i = 0; i < count; i++) {
                gallery_list +=
                    '<a class="pull-left" href="' + data.data[i].image + '" title="Project 1">\n' +
                    '<div class="img-responsive">\n' +
                    '<img src="' + data.data[i].image + '" width="390">\n' +
                    '</div>' +
                    '</a>\n';
            }
            $("#category_images").html(gallery_list);
        }
    });
}

function AddScreens() {
    var category_id = $("#screen_category").find(":selected").val();
    var screens_id = $("#screen_select").find(":selected").val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/screens-save',
        method: 'post',
        data: {
            c_id: category_id,
            s_id: screens_id
        },
        dataType: false,
        success: function(data) {
            console.log(data.data);
            if (data.data == "1") {
                $("#screens_success_alert").delay(5).fadeIn('slow').delay(1500).fadeOut('slow');
                $("#screens_success_alert").html('<strong>Well done!</strong> You saved a piece of screens successfully.');
                setTimeout(function() {
                    location.reload();
                }, 1500);
            }
        }
    });

}

var image_id;

function RemoveImage(elem) {
    image_id = $(elem).attr('data-id');

}

function ConfirmScreens() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: '/remove-image',
        method: 'post',
        data: {
            id: image_id
        },
        dataType: false,
        success: function(data) {
            if (data.data == "1") {
                $("#remove_screens_alert").delay(5).fadeIn('slow').delay(1500).fadeOut('slow');
                $("#remove_screens_alert").html('<strong>Well done!</strong> You remove a screens successfully.');
                setTimeout(function() {
                    location.reload();
                }, 1500);
            } else if (data.data == "0") {
                $("#fault_screens_remove_alert").delay(5).fadeIn('slow').delay(1500).fadeOut('slow');
                $("#fault_screens_remove_alert").html('<strong>Well done!</strong> You remove a screens successfully.');
                setTimeout(function() {
                    location.reload();
                }, 1500);
            }
        }
    });
}