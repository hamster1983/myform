<?php header("Content-Type: text/html; charset=utf-8"); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <script src="jquery-3.1.0.min.js"></script>
    <title>Форма регистрации</title>
</head>
<body>
    <div id="title">ЗАПОЛНИТЕ ФОРМУ:</div>
    <form method="POST" id="form" action="" enctype="multipart/form-data">
        <div class="form-group">
            <label for="inputName">Ваши имя и фамилия <span>*</span>:</label>
	        <input type="text" name="name" id="inputName" class="form-control" required placeholder="Имя Фамилия" />
            <span id="noteName"><small>Введите имя и фамилию</small></span>
        </div>
        <div class="form-group">
            <label for="inputTel">Ваш телефон <span>*</span>:</label>
	        <input type="tel" name="tel" id="inputTel" class="form-control" required placeholder="(999) 999-99-99" maxlength="15" />
            <span id="noteTel"><small>Введите номер телефона в соответствии с шаблоном</small></span>
        </div>
        <div class="form-group">
            <label for="inputMail">Ваш e-mail <span>*</span>:</label>
	        <input type="email" name="email" id="inputMail" class="form-control" required placeholder="adress@domain.ru" />
            <span id="noteMail"><small>Введите корректный e-mail</small></span>
        </div>
        <div class="form-group">
            <label for="inputText">Ваши пожелания к работе:</label>
	        <textarea type="text" name="text" id="inputText" class="form-control" placeholder="Макс. 500 символов"></textarea>
	        <div><small>Осталось символов: <span id="counter"></span></small></div>
        </div>
        <div class="form-group">
            <label for="inputAccept">Вы принимаете условия <a href="" target="_blank">Соглашения о сотрудничестве</a>:</label>
	        <input type="checkbox" id="inputAccept" name="accept" checked />Да
        </div>
        <input type="submit" class="btn btn-primary" value="Зарегистрироваться" />
        <div id="success"></div>
        <div id="comment"><span>*</span> &ndash; <small>поля, обязательные для заполнения</small></div>
    </form>
<script src="scripts.js"></script>
</body>
</html>