<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Подключение файла стилей -->

    <title>Библиотека</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" type="text/css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="library.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Marck+Script" rel="stylesheet">
  </head>
  <body>
    <!-- Меню навигации на сайте -->

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Библиотека</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Главная<span class="sr-only">(current)</span></a></li>
          </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Вход</b> <span class="caret"></span></a>
			<ul id="login-dp" class="dropdown-menu">
				<li>
					 <div class="row">
							<div class="col-md-12">
								Войти с помощью
								<div class="social-buttons">
									<a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
									<a href="#" class="btn btn-tw"><i class="fa fa-twitter"></i> Twitter</a>
								</div>
                                или
								 <form class="form" role="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">
										<div class="form-group">
											 <label class="sr-only" for="exampleInputEmail2">Email adress</label>
											 <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Электронная почта" required>
										</div>
										<div class="form-group">
											 <label class="sr-only" for="exampleInputPassword2">Password</label>
											 <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Пароль" required>
                                             <div class="help-block text-right"><a href="">Забыли пароль?</a></div>
										</div>
										<div class="form-group">
											 <button type="submit" class="btn btn-primary btn-block">Войти</button>
										</div>
										<div class="checkbox">
											 <label>
											 <input type="checkbox"> Оставаться в сети
											 </label>
										</div>
								 </form>
							</div>
							<div class="bottom text-center">
								Недавно здесь? <a href="#"><b>Регистрация</b></a>
							</div>
					 </div>
				</li>
			</ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<?php 


    $MySQLConnection = mysql_connect('localhost', 'bdfbl', 'bdfb2');
    $MySQLSelectedDB = mysql_select_db('bdfb', $MySQLConnection);
    mysql_query('SET NAMES utf8');
    $MySQLRecordSet = mysql_query('SELECT * FROM library');


if ( !isset( $_GET["action"] ) ) $_GET["action"] = "showlist";  
  
switch ( $_GET["action"] ) 
{ 
  case "showlist":    // Список всех записей в таблице БД
    show_list(); break; 
  case "addform":     // Форма для добавления новой записи 
    get_add_item_form(); break; 
  case "add":         // Добавить новую запись в таблицу БД
    add_item(); break;
  case "editform":    // Форма для редактирования записи 
    get_edit_item_form(); break; 
  case "update":      // Обновить запись в таблице БД
    update_item(); break; 
  case "delete":      // Удалить запись в таблице БД
    delete_item(); break;
  default: 
    show_list(); 
}

// Функция выводит список всех записей в таблице БД
function show_list() 
{ 
  $query = 'SELECT id, book, author FROM library WHERE 1'; 
  $res = mysql_query( $query ); 
  echo '<h2>Библиотека</h2>'; 
  echo '<table cellpadding="2" cellspacing="0">'; 
  echo '<thead>
            <tr>
                <th>№</th>
                <th>Книга</th>
                <th>Автор</th>
                <th></th>
                <th></th>
            </tr>
        </thead>';
  while ( $item = mysql_fetch_array( $res ) ) 
  { 
    echo '<tbody>';
    echo '<tr>'; 
    echo '<td>'.$item['id'].'</td>'; 
    echo '<td>'.$item['book'].'</td>'; 
    echo '<td>'.$item['author'].'</td>'; 
    echo '<td><a href="'.$_SERVER['PHP_SELF'].'?action=editform&id='.$item['id'].'"><span class="glyphicon glyphicon-pencil" aria-hidden="true">Ред.</span></a></td>'; 
    echo '<td><a href="'.$_SERVER['PHP_SELF'].'?action=delete&id='.$item['id'].'"><span class="glyphicon glyphicon-remove" aria-hidden="true">Удл.</span></a></td>'; 
    echo '</tr>'; 
    echo '</tbody>';
  } 
    echo '<tfoot><tr><td></td><td></td><td></td><td></td><td><p><a href="'.$_SERVER['PHP_SELF'].'?action=addform"><span class="glyphicon glyphicon-plus" aria-hidden="true">Доб.</span></a></p></td></tr></tfoot>';  
    echo '</table>';
} 

// Функция формирует форму для добавления записи в таблице БД 
function get_add_item_form() 
{ 
  echo '<h2>Добавить</h2>';  
  echo '<form name="addform" action="'.$_SERVER['PHP_SELF'].'?action=add" method="POST">'; 
  echo '<table>'; 
  echo '<tr>'; 
  echo '<td>Книга</td>'; 
  echo '<td><input name="book" type="text" placeholder="Название книги" /></td>'; 
  echo '</tr>'; 
  echo '<tr>'; 
  echo '<td>Автор</td>'; 
  echo '<td><input name="author" type="text" placeholder="Автор" /></td>'; 
  echo '</tr>'; 
  echo '<tr>'; 
  echo '<td><input type="submit" value="Сохранить"></td>'; 
  echo '<td><button type="button" onClick="history.back();">Отменить</button></td>'; 
  echo '</tr>'; 
  echo '</table>'; 
  echo '</form>'; 
}

// Функция добавляет новую запись в таблицу БД  
function add_item() 
{ 
  $book = mysql_escape_string( $_POST['book'] ); 
  $author = mysql_escape_string( $_POST['author'] ); 
  $query = "INSERT INTO library (book, author) VALUES ('".$book."', '".$author."');"; 
  mysql_query ( $query ); 
  header( 'Location: '.$_SERVER['PHP_SELF'] );
  die();
}

// Функция формирует форму для редактирования записи в таблице БД 
function get_edit_item_form() 
{ 
  echo '<h2>Редактировать</h2>';
  $query = 'SELECT book, author FROM library WHERE id='.$_GET['id']; 
  $res = mysql_query( $query ); 
  $item = mysql_fetch_array( $res ); 
    
  echo '<form name="editform" action="'.$_SERVER['PHP_SELF'].'?action=update&id='.$_GET['id'].'" method="POST">'; 
  echo '<table>'; 
  echo '<tr>'; 
  echo '<td>Книга</td>'; 
  echo '<td><input name="book" type="text" value="'.$item['book'].'" placeholder="Название книги" /></td>'; 
  echo '</tr>'; 
  echo '<tr>'; 
  echo '<td>Автор</td>'; 
  echo '<td><input name="author" type="text" value="'.$item['author'].'" placeholder="Имя автора" /></td>'; 
  echo '</tr>'; 
  echo '<tr>'; 
  echo '<td><input type="submit" value="Сохранить"></td>'; 
  echo '<td><button type="button" onClick="history.back();">Отменить</button></td>'; 
  echo '</tr>'; 
  echo '</table>'; 
  echo '</form>'; 
} 

// Функция обновляет запись в таблице БД  
function update_item() 
{ 
  $book = mysql_escape_string( $_POST['book'] ); 
  $author = mysql_escape_string( $_POST['author'] ); 
  $query = "UPDATE library SET book='".$book."', author='".$author."' 
            WHERE id=".$_GET['id']; 
  mysql_query ( $query ); 
  header( 'Location: '.$_SERVER['PHP_SELF'] );
  die();
} 

// Функция удаляет запись в таблице БД 
function delete_item() 
{ 
  $query = "DELETE FROM library WHERE id=".$_GET['id']; 
  mysql_query ( $query ); 
  header( 'Location: '.$_SERVER['PHP_SELF'] );
  die();
} 
  
?>
              

  </body>
</html>