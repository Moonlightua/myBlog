<div class="back"><a href="/allArticles">BACK</a></div>

<h1>Edit Article</h1>

<?php use app\core\form\Form;

/** @var $field \app\models\AddArticleForm */
/** @var $model \app\models\Blog */

$this->title = 'Edit Article';
$path = $_SERVER['REQUEST_URI'];
$position = strpos($path, '?');

$id = substr($path, $position + 6, strlen($path));

$article = $model->showOne($id);

foreach ($article as $item) {
    $title = $item['title'];
    $text = $item['text'];
    $subtitle = $item['subtitle'];
}


$form = Form::addArticleForm('articleEdit', 'post'); ?>
<?php echo '<div>' . $form->editField('Title',$title, 'title').'</div>' ?>
<?php echo '<div>' . $form->editField('Subtitle',$subtitle, 'subtitle').'</div>' ?>
<?php echo '<div>' . $form->imageField() . '</div>'; ?>
<?php echo '<div>' . $form->editTextarea('Text',$text) . '</div>' ?>

<button type="submit" class="btn btn-primary">Submit</button>

<?php Form::end(); ?>

