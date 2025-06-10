<?= $this->include('template/admin_header'); ?>

<div class="content-wrapper">
    <h2><?= isset($artikel) ? 'Edit' : 'Tambah' ?> Artikel</h2>
    <form method="post" action="<?= isset($artikel) ? base_url('/ajax/update/' . $artikel['id']) : base_url('/ajax/create') ?>">
        <label>Judul</label><br>
        <input type="text" name="judul" value="<?= $artikel['judul'] ?? '' ?>" required><br><br>

        <label>Isi</label><br>
        <textarea name="isi" rows="5"><?= $artikel['isi'] ?? '' ?></textarea><br><br>

        <label>Status</label><br>
        <select name="status">
            <option value="draft" <?= (isset($artikel) && $artikel['status'] == 'draft') ? 'selected' : '' ?>>Draft</option>
            <option value="publish" <?= (isset($artikel) && $artikel['status'] == 'publish') ? 'selected' : '' ?>>Publish</option>
        </select><br><br>

        <label>Kategori</label><br>
        <select name="id_kategori">
            <?php foreach ($kategori as $k): ?>
                <option value="<?= $k['id_kategori'] ?>" <?= (isset($artikel) && $artikel['id_kategori'] == $k['id_kategori']) ? 'selected' : '' ?>>
                    <?= $k['nama_kategori'] ?>
                </option>
            <?php endforeach; ?>
        </select><br><br>

        <button type="submit"><?= isset($artikel) ? 'Update' : 'Tambah' ?></button>
    </form>
</div>

<?= $this->include('template/admin_footer'); ?>
