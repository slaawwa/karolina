<?php

/* @var $this yii\web\View */

$this->title = 'Блог • Кароліни';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Нові записи в блозі!</h1>
    </div>

    <div class="body-content">

        <div class="row">
            
            <div class="col-sm-8 blog-main">
            <?php
                foreach ($posts as $post) {
                    echo '<div class="blog-post">
                        <h2 class="blog-post-title">'.$post['title'].'</h2>
                        <p class="blog-post-meta">'.$post['created'].' від
                        
                            <a href="https://vk.com/id183892599" target="_blank">Кароліни</a>
                        
                        </p>
            
                        <p>'.$post['short_desc'].'</p>
                        <blockquote>
                          <p>'.$post['long_desc'].'</p>
                        </blockquote>
                        <hr>
                    </div>';
                }
            ?>
            </div>
            <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
              <div class="sidebar-module sidebar-module-inset">
                <h4>Про мене</h4>
                <p>
                    <em>Я учениця і зробила собі блог))</em>
                    <br>
                    А чого добився ти?))
                </p>
              </div>
            </div>
        </div>

    </div>
</div>
