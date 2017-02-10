$(document).ready(function() {

    //объявляем функцию проверки вводимых данных на соответствие шаблону
    function checkData(input, pattern, note) {
        if((input.val() != 0)&&(!pattern.test(input.val()))) {
            setTimeout(function() {
                input.focus(); //для корректной работы принудительного фокуса во всех браузерах
            }, 0);
            input.css({'background-image':'none', 'border-color':'red'});
            note.css('visibility', 'visible');
      
        }
        else if(input.val() != 0) {
            input.css({'background-image':'url("yes.jpg")', 'border-color':'#ccc'});
            note.css('visibility', 'hidden');
        }
        else {
            input.css('background-image', 'none');
        }
    }

    //проверяем поле ФИО на соответствие шаблону
    $('#inputName').focusout(function() {
        var input = $(this);
        var pattern = /^[A-Za-zА-Яа-я-]{2,20}\s+[A-Za-zА-Яа-я-]{2,20}/;
        var note = $('#noteName');
        checkData(input, pattern, note);
    });

    //проверяем телефон на соответствие шаблону
    $('#inputTel').focusout(function() {
        var input = $(this);
        var pattern = /^\(\d{3}\)\s\d{3}-\d{2}-\d{2}/;
        var note = $('#noteTel');
        checkData(input, pattern, note);
    });

    //проверяем e-mail на соответствие шаблону
    $('#inputMail').focusout(function() {
        var input = $(this);
        var pattern = /^([A-Za-z0-9_-]+\.)*[A-Za-z0-9_-]+@[A-Za-z0-9_-]+(\.[A-Za-z0-9_-]+)*\.[A-Za-z]{2,6}/;
        var note = $('#noteMail');
        checkData(input, pattern, note);
    });

    //устанавлием ограничение количества символов для пожелания и делаем счетчик символов
    var maxCount = 500;
    $('#counter').html(maxCount);
    $('#inputText').keyup(function() {
        var revText = this.value.length;
        if (revText > maxCount) {
            this.value = this.value.substr(0, maxCount);
        }
        var cnt = (maxCount - revText);
        if(cnt <= 0) {
            $('#counter').html('0');
        }
        else {
            $('#counter').html(cnt);
        }
    });

    //запрещаем отправку формы в случае непринятия пользовательского соглашения
    $('#inputAccept').change(function() {
        $('.btn-primary').prop('disabled', function(i, currentValue) {
            return !currentValue;
        });
    });

    //предотвращаем отправку формы с незаполненными обязательными полями
    function checkForm(input) {
        input.focus();
        input.css('border-color','red');
    }

    $('.btn-primary').click(function() {
        var name = $('#inputName');
        var tel = $('#inputTel');
        var mail = $('#inputMail');

        if(name.val() == '') {
            checkForm(name);
        }
        else if(tel.val() == '') {
            checkForm(tel);
        }
        else if(mail.val() == '') {
            checkForm(mail);
        }
    //если всё заполнено верно, отправляем на сервер, получаем ответ и очищаем форму
        else {
            $.ajax({
                type: "POST",
                url: "add_data.php",
                data: $('#form').serialize(),
                success: function(data) {
                    $('#success').show().html(data).fadeOut(5000);
                    $('#form')[0].reset();
                    $('input').css('background-image', 'none');
                    $('#counter').html(maxCount);
                }
            });
        }
        return false;
    });
});