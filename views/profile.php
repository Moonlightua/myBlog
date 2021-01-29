<?php
/** @var $this \app\core\View */

use app\core\Application;

$this->title = 'Profile';
$image = Application::$app->user->getDisplayImage();

?>
<div class="profile-content">
    <div class="profile-username">
        <p>Hello, <?php echo Application::$app->user->getDisplayName(); ?>!</p>
    </div>
    <div class="profile-email">
        <p><?php echo Application::$app->user->getDisplayEmail();?></p>
    </div>
    <div class="profile-date">
       <p><?php echo Application::$app->user->getDisplayCreatedDate();?></p>
    </div>
<?php
echo <<< msg
        <div class="profile-image">
            <img src="img/users/$image">
        </div>
    msg;
?>
</div>