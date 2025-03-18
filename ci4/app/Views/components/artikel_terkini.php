<h3>Artikel Terkini</h3>
<ul class="artikel-terkini">
    <?php foreach ($artikel as $row): ?>
        <li>
            <a href="<?= base_url('/artikel/' . $row['slug']) ?>">
                <?= $row['judul'] ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>
