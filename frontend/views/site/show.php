
<h1>SHOW ACTION</h1>



<?php 
use yii\helpers\Url;
use frontend\models\Likes;
use frontend\models\Comments;
use frontend\models\Posts;
use frontend\models\Subscribe;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\widgets\Pjax;

 

$this->registerJs("
    $('#form').on('beforeSubmit', function() {
        // Получаем объект формы
        console.log('Started');
        var testform = $(this);
        // отправляем данные на сервер
        $.ajax({
            // Метод отправки данных (тип запроса)
            type : testform.attr('method'),
            // URL для отправки запроса
            url : testform.attr('action'),
            // Данные формы
            data : {test:'123'}
        }).done(function(data) {
                if (data.error == null) {
                    console.log('norm');

                } else {
                    console.log('ne norm');
                    console.log(data);

                }
        }).fail(function() {

        })
        // Запрещаем прямую отправку данных из формы
        return false;
    })

");
?>

<!-- // $js = <<<JS 
// $('#btn').on('click',function(){
//     $.ajax({
//         url: 'index.php?r=post/index',
//         data: {test:'123'},
//         type: 'POST',
//         success: function(res){
//             console.log(res);
//         }
//         error: function(){
//             alert('Erorrrr');
//         }
//     });
// });
// JS; -->

<!-- // $this->registerJs("$('#btn').on('click',function(){
//     $.ajax({
//         url: 'yii-application/backend/web/index.php?r=site%2Flogin',
//         data: {test:'123'},
//         type: 'POST',
//         success: function(res){
//             console.log(res);
//             alert(res);
//         },
//         error: function(){
//             alert('Erorrrr');
//         }
//     });
// });");

// $this->registerJs("
// $('form#profile-newpost').on('beforeSubmit', function(e){
// 	console.log('beforeSubmit');
// 	var data = new FormData();
	

// 	var title = $('.post-block .input-title').val();
	
    
// 	var textData = {
// 		title: title,
// 		text: title,
		
// 	};
// 		textData = JSON.stringify(textData);
// 		$.ajax({
// 		url: 'yii-application/frontend/web/index.php?r=site%2Findex',
// 		type: 'POST',
// 		data: textData,
// 		cache: false,
// 		contentType: 'application/json; charset=utf-8', // Так jQuery скажет серверу что это строковой запрос
// 		success: function( data, textStatus, jqXHR ){
           

// 			if( typeof data.error === 'undefined' ){
// 						data = JSON.parse(data);
// 						alert('sdf');
// 						console.log(data);
						
						
						
// 					}
// 					else{
// 						console.log('ОШИБКИ ОТВЕТА сервера: ' + data.error );
// 					}
// 				},
// 				error: function( jqXHR, textStatus, errorThrown ){
// 					console.log('ОШИБКИ AJAX запроса2: ' + textStatus );
// 				}
//     });
// });
// "); -->


<?php //$this->registerJsFile('@web/js/script.js', ['depends' => 'yii\web\YiiAsset'])?>
<button class="btn btn-success" id="btn">Click me</button>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'], 
'id' => 'form',
'action' => 'yii-application/frontend/web/index.php?r=site%2test',
'method'=>'post',
'enableAjaxValidation' => true]); ?>

				   <?=Html::input('text', 'title', '', ['class' => 'input-title', 'placeholder' => 'enter title'])?>
				   <?=Html::textarea('text', '', ['class' => 'add-post-text', 'placeholder' => 'write your post'])?>
				   <?=Html::input('file', 'file')?>
                 

				   
				    <div class="buttons">
						<?= Html::submitButton('publish', [ 'class' => 'btn btn-success save-post', 'id' => 'clickButton' ]) ?>
						<?= Html::submitButton('cancel', [ 'class' => 'btn btn-danger cancel-post' ]) ?>
					</div>

				<?php ActiveForm::end(); ?>

				<div id="message"></div>

