var deleteData, edit;

$(document).ready(function() {

    // open add modal

    $('.popup-add-open').click(function() {
        $('.popup-add-fade').fadeIn();
        return false;
    });

    // close modal

    $('.popup-close').click(function() {
        $(this).parents('.popup-add-fade').fadeOut();
        $(this).parents('.popup-edit-fade').fadeOut();
        $('input').val('');
        return false;
    });

    // close modal by ESC

    $(document).keydown(function(e) {
        if (e.keyCode === 27) {
            e.stopPropagation();
            $('.popup-add-fade').fadeOut();
            $('.popup-edit-fade').fadeOut();
        }
    });

    // get all data from the DB

    getPageData();

    function getPageData() {

        $.ajax({
            type: 'post',
            url: "controller.php",
            data: {page:true}
        }).done(function(data){

            console.log(data);
            var resultJSON = jQuery.parseJSON(data);
            manageRow(resultJSON);
        });
    }

    // Add new contacts table row

    function manageRow(data) {
        var rows = '';

        $.each( data, function( key, value ) {
            rows = rows + '<tr id="' + value.id + '">';
            rows = rows + '<td><a href="#" id="name" class="popup-edit-open" onclick="edit(' + value.id + ')">' + value.name + '</a></td>';
            rows = rows + '<td><a href="#" id="phone" class="popup-edit-open" onclick="edit(' + value.id + ')">' + value.phone + '</a></td>';
            rows = rows + '<td><button class="table__delete-button button popup-delete-open" onclick="deleteData(' + value.id + ');">Удалить</button></td>';
            rows = rows + '</tr>';
        });

        $("tbody").html(rows);
    }

    //add contacts from input to the controller and add them in the table

    $("#add-edit-form").submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: "./controller.php",
            type: 'post',
            data: {
                inputName: $('.popup-form__input-name').val(),
                inputPhone: $('.popup-form__input-number').val()
            }
        }).done(function(data) {

            $('.popup-add-fade').fadeOut();
            getPageData();
            $('input').val('');
        });
    });

    // edit contacts

    edit = function (id) {
        var name = $('#' + id + '').find("#name").text();
        var phone = $('#' + id + '').find("#phone").text();

        // get inputs value

        $("#edit-form").find("input[name='id']").val(id);
        $("#edit-form").find("input[name='inputName']").val(name);
        $("#edit-form").find("input[name='inputPhone']").val(phone);

        $('.popup-edit-fade').fadeIn();
        return false;
    };

    // save changed item in DB

    $("#edit-form").submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: "./controller.php",
            type: 'post',
            data: {
                edit: true,
                id: $('.edit-id').val(),
                inputName: $('#edit-form').find('.popup-form__input-name').val(),
                inputPhone: $('#edit-form').find('.popup-form__input-number').val(),
            }
        }).done(function(data) {

            getPageData();
            $('.popup-edit-fade').fadeOut();
            $('input').val('');
        });
    });

    //delete selected data by identifier

    deleteData = function (id) {
        if(confirm("Вы действительно хотите удалить контакт?")) {

            $.ajax({
                url: "./controller.php",
                type: "POST",
                data: {id: id}
            }).done(function(data){
                getPageData();
            });
        }
    };
});