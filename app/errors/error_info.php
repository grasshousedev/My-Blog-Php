<?php if (count($statusMessage)): ?>
    <ul class="err">
        <?php foreach ($statusMessage as $key => $value): ?>
            <li><?= $value; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
