<?php
/* @var $users Userinfoobj[] */

if (!function_exists('user_box')) {

    function user_box(Userinfoobj $user) {
        ?>
        <div class="user">
            <a href="<?= base_url(PATH_P_PRE . $user->screen_name) ?>">
                <img src="<?= $user->get_image_url() ?>" alt="">
            </a>
            <p>
                <span class="screenname"><a href="//twitter.com/<?= $user->screen_name ?>" target="_blank">@<?= $user->screen_name ?></a></span>
            </p>
            <a class="button expand jump" href="<?= base_url(PATH_P_PRE . $user->screen_name) ?>">
                執行する
            </a>
                <!--<li class="name"><?= h($user->name) ?></li>-->
            <p class="point">犯罪係数<span class="point" data-sync-point="<?= $user->user_id ?>"><img class="loading" src="<?= base_url(PATH_IMG . '/loading.gif') ?>" alt=""></span></p>
        </div>

        <?php
    }

}

$this->load->view('psychopassform');
?>
<div class="row">
    <div class="small-12 small-centered medium-10 medium-push-1">
        <h3>現在のあなたのTLにいるフレンド</h3>
        <?php if ($users !== FALSE) { ?>
            <ul class="small-block-grid-2 medium-block-grid-4">
                <?php
                foreach ($users as $user) {
                    echo '<li>';
                    user_box($user);
                    echo '</li>';
                }
                ?>
            </ul>
        <?php } else { ?>
            <h5>TL が読み込めません Twitter制限 または 非ログインユーザ</h5>
        <?php } ?>
    </div>
</div>