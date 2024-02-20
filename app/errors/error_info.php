<?php if (count($statusMessage)): ?>
    <ul>
        <?php foreach ($statusMessage as $key => $value): ?>
            <li><?= $value; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
