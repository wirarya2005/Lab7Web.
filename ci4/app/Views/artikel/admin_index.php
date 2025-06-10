<?= $this->include('template/admin_header'); ?>

<style>
    .content-wrapper {
        padding: 25px;
        max-width: 1280px;
        margin: 0 auto;
    }
    
    .form-search {
        display: flex;
        justify-content: flex-start;
        align-items: center;
        margin: 25px 0;
        background: white;
        padding: 15px 20px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        border-left: 4px solid #2563eb;
    }
    
    .form-search input[type="text"] {
        flex: 1;
        padding: 12px 15px;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        font-size: 16px;
        transition: all 0.3s ease;
        margin-right: 10px;
        background-color: #f8fafc;
        color: #334155;
        font-family: 'Poppins', Arial, sans-serif;
    }
    
    .form-search input[type="text"]:focus {
        outline: none;
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.2);
    }
    
    .form-search input[type="submit"] {
        background: #2563eb;
        color: white;
        border: none;
        padding: 12px 20px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 16px;
        font-weight: 500;
        transition: all 0.3s ease;
        box-shadow: 0 2px 4px rgba(37, 99, 235, 0.2);
    }
    
    .form-search input[type="submit"]:hover {
        background: #1d4ed8;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(37, 99, 235, 0.3);
    }
    
    table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        margin: 20px 0;
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    }
    
    th, td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #e2e8f0;
    }
    
    th {
        background: linear-gradient(to right, #1e293b, #334155);
        color: white;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 14px;
        letter-spacing: 1px;
    }
    
    tr:last-child td {
        border-bottom: none;
    }
    
    tr:hover {
        background-color: #f8fafc;
    }
    
    tr:nth-child(even) {
        background: #f1f5f9;
    }
    
    tr:nth-child(even):hover {
        background: #e2e8f0;
    }
    
    tbody td {
        font-size: 15px;
        color: #334155;
    }
    
    tbody td b {
        color: #1e293b;
        font-weight: 600;
    }
    
    tbody td p {
        margin: 5px 0 0;
        font-size: 13px;
        color: #64748b;
    }
    
    .btn {
        display: inline-block;
        padding: 8px 12px;
        text-decoration: none;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 500;
        transition: all 0.3s ease;
        margin-right: 5px;
        background: #e2e8f0;
        color: #334155;
        border: none;
        cursor: pointer;
    }
    
    .btn:hover {
        opacity: 1;
        transform: translateY(-2px);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    
    .btn-danger {
        background: #dc2626;
        color: white;
    }
    
    .btn-danger:hover {
        background: #b91c1c;
    }
    
    td[colspan="4"] {
        text-align: center;
        padding: 40px;
        color: #64748b;
        font-style: italic;
    }
    
    tfoot th {
        background: #f8fafc;
        color: #334155;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 1px;
        border-top: 2px solid #e2e8f0;
    }
    
    @media (max-width: 768px) {
        .form-search {
            flex-direction: column;
            align-items: stretch;
        }
        
        .form-search input[type="text"] {
            margin-right: 0;
            margin-bottom: 10px;
        }
        
        table {
            display: block;
            overflow-x: auto;
            white-space: nowrap;
        }
        
        th, td {
            padding: 12px 10px;
        }
    }
</style>

<div class="content-wrapper">
    <form method="get" class="form-search">
        <input type="text" name="q" value="<?= $q; ?>" placeholder="Cari data">
        <select name="kategori_id" class="form-control mr-2">
            <option value="">==Semua Kategori==</option>
            <?php foreach (
                isset(
                    $kategori
                ) ? $kategori : [] as $k): ?>
                <option value="<?= $k['id_kategori']; ?>" <?= ($kategori_id == $k['id_kategori']) ? 'selected' : ''; ?>>
                    <?= $k['nama_kategori']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Cari" class="btn btn-primary">
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php if($artikel): foreach($artikel as $row): ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td>
                    <b><?= $row['judul']; ?></b>
                    <p><small><?= substr($row['isi'], 0, 50); ?></small></p>
                </td>
                <td><?= $row['nama_kategori']; ?></td>
                <td><?= $row['status']; ?></td>
                <td>
                    <a class="btn" href="<?= base_url('/admin/artikel/edit/' . $row['id']); ?>">Ubah</a>
                    <a class="btn btn-danger" onclick="return confirm('Yakin menghapus data?');" href="<?= base_url('/admin/artikel/delete/' . $row['id']); ?>">Hapus</a>
                </td>
            </tr>
        <?php endforeach; else: ?>
            <tr>
                <td colspan="4">Belum ada data.</td>
            </tr>
        <?php endif; ?>
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
    </table>
</div>

<?= $this->include('template/admin_footer'); ?>