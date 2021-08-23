<?php if(!empty($message)): ?>
            <?php foreach($message as $info): ?>
                <div class="alert alert-<?=$info['type']?>" role="alert">
                    <?= $info['msg'] ?>
                </div>
            <?php endforeach ?>
<?php endif ?>