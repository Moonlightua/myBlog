<h1>Edit Article</h1>

<?php use app\core\form\Form;

/** @var $field \app\models\AddArticleForm */
/** @var $model \app\models\Blog */

$path = $_SERVER['REQUEST_URI'];
$position = strpos($path, '?');

$id = substr($path, $position + 6, strlen($path));

$article = $model->showOne($id);

foreach ($article as $item) {
    $title = $item['title'];
    $text = $item['text'];
}


$form = Form::addArticleForm('articlePost', 'post'); ?>
<?php echo '<div>' . $form->editField('Title',$title).'</div>' ?>
<?php echo '<div>' . $form->imageField() . '</div>'; ?>
<?php echo '<div>' . $form->editTextarea('Text',$text) . '</div>' ?>

<button type="submit" class="btn btn-primary">Submit</button>

<?php Form::end(); ?>

