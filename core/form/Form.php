<?php
/**
 * Form render class.
 */
namespace app\core\form;

use app\core\Model;

/**
 * Class Form
 *
 * @package app\core\form
 */
class Form
{


	/**
	 * This method begin HTML form.
	 *
	 * @param $action
	 * @param $method
	 *
	 * @return Form
	 */
	public static function begin($action, $method)
	{
		echo sprintf('<form action="%s" method="%s">', $action, $method);
		return new Form();

	}

	/**
	 * This method begin HTML form.
	 *
	 * @param $action
	 * @param $method
	 *
	 * @return Form
	 */
	public static function addArticleForm($action, $method)
	{
		echo sprintf('<form action="%s" method="%s" enctype="multipart/form-data">', $action, $method);
		return new Form();

	}


	/**
	 * This method end HTML form.
	 */
	public static function end()
	{
		echo '</form>';

	}


	/**
	 * This method render field.
	 *
	 * @param Model $model
	 * @param $attribute
	 *
	 * @return InputField
	 */
	public function field(Model $model, $attribute)
	{
		return new InputField($model, $attribute);

	}

	/**
	 * This method start HTML block with comments.
	 *
	 * @param string $label
	 * @param string $class
	 *
	 * @return Form
	 */
	public static function startComments(string $label, string $class)
	{

		echo sprintf('
					<div class="%s">
						<hr>
						<label class="%s label">%s</label>'
			, $class, $label, $label);
		return new Form();

	}


	/**
	 * This method ends HTML block.
	 */
	public static function close()
	{
		echo '</div>';

	}


	public static function renderCommentForm(string $class)
	{
		echo sprintf('
			<div class="%s">
				<form>
				<input type="text" name="name" class="comment-name">
				<input type="text" name="email" class="comment-email">
				<textarea type="text" name="text" class="comment-text"></textarea>
				<button type="submit" class="button contact">send</button>
				</form>
			</div>
		', $class);
	}


	public static function imageField()
	{
		return '<input type="file" name="image">';
	}


    public function editField($label, $value, $name)
    {
        return sprintf('
                <label>%s</label>
                <input type="text" name="%s" class="form-control field" value="%s">
        ',$label,$name, $value);
	}

    public function editTextarea($label, $value)
    {
        return sprintf('
                <label>%s</label>
                <textarea type="text" name="text" class="form-control textarea">%s</textarea>
        ',$label, $value);
    }

    public function renderDiv($class)
    {
        return sprintf('
                <div class="%s">        
        ', $class);
    }

    public function endDiv()
    {
        echo "</div>";
    }

    public function regionsSelection()
    {
        return '<label for="region">Choose a region for image:</label>
                  <select id="region" name="region">
                        <option value="/" selected>Home page</option>
                        <option value="/about">About page</option>
                        <option value="/blog">Blog page</option>
                        <option value="/contact">Contact page</option>
                        <option value="/profile">Profile page</option>
                        <option value="/allArticles">Admin Articles List</option>
                        <option value="/Design">Design Page</option>
                        <option value="/admin">Admin Panel Page</option>
                        <option value="/messages">Messages Page</option>
                        <option value="/subEmails">Subscribers Emails Page</option>
                        <option value="/addArticle">Add New Article Page</option>
                        <option value="/login">Login Page</option>
                        <option value="/register">Register Page</option>
                   </select>';
    }
}
