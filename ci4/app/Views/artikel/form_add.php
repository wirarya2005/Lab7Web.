<?= $this->include('template/admin_header'); ?>

<div class="admin-container">
  <h2 class="admin-title"><?= $title; ?></h2>
  
  <div class="admin-card">
    <form action="<?= base_url('admin/artikel/add') ?>" method="post" enctype="multipart/form-data" class="admin-form">
      <div class="form-group">
        <input type="text" name="judul" placeholder="Judul" class="form-control">
      </div>
      
      <div class="form-group">
        <textarea name="isi" cols="50" rows="10" placeholder="Isi artikel" class="form-control"></textarea>
      </div>
      
      <div class="form-group">
        <select name="id_kategori" class="form-control" required>
          <option value="">Pilih Kategori</option>
          <?php foreach ($kategori as $k): ?>
            <option value="<?= $k['id_kategori']; ?>"><?= $k['nama_kategori']; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      
      <div class="form-group file-upload">
        <label for="file-upload" class="file-label">
          <span class="file-icon">📎</span>
          <span class="file-text">Upload Gambar</span>
        </label>
        <input type="file" name="gambar" id="file-upload">
        <span class="selected-file">Tidak ada file yang dipilih</span>
      </div>
      
      <div class="form-group">
        <button type="submit" class="btn-submit">Kirim</button>
      </div>
    </form>
  </div>
</div>

<style>
  :root {
    --primary-color: #4a6cf7;
    --secondary-color: #6c757d;
    --success-color: #28a745;
    --background-color: #f8f9fa;
    --card-color: #ffffff;
    --text-color: #495057;
    --border-color: #e9ecef;
    --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    --radius: 8px;
    --transition: all 0.3s ease;
  }

  .admin-container {
    max-width: 900px;
    margin: 2rem auto;
    padding: 0 1rem;
  }

  .admin-title {
    color: var(--text-color);
    font-size: 2rem;
    margin-bottom: 1.5rem;
    padding-bottom: 0.5rem;
    border-bottom: 2px solid var(--primary-color);
  }

  .admin-card {
    background-color: var(--card-color);
    border-radius: var(--radius);
    box-shadow: var(--shadow);
    padding: 2rem;
    margin-bottom: 2rem;
  }

  .admin-form .form-group {
    margin-bottom: 1.5rem;
  }

  .admin-form .form-control {
    width: 100%;
    padding: 0.75rem;
    font-size: 1rem;
    border: 1px solid var(--border-color);
    border-radius: var(--radius);
    background-color: #fff;
    transition: var(--transition);
  }

  .admin-form .form-control:focus {
    outline: none;
    border-color: var(--primary-color);
    box-shadow: 0 0 0 0.2rem rgba(74, 108, 247, 0.25);
  }

  .admin-form textarea.form-control {
    min-height: 200px;
    resize: vertical;
  }

  .file-upload {
    position: relative;
    display: flex;
    flex-direction: column;
  }

  .file-label {
    display: inline-flex;
    align-items: center;
    background-color: var(--secondary-color);
    color: white;
    padding: 0.75rem 1rem;
    border-radius: var(--radius);
    cursor: pointer;
    transition: var(--transition);
    margin-bottom: 0.5rem;
    width: fit-content;
  }

  .file-label:hover {
    background-color: #5a6268;
  }

  .file-icon {
    margin-right: 0.5rem;
  }

  input[type="file"] {
    position: absolute;
    left: -9999px;
    opacity: 0;
  }

  .selected-file {
    color: var(--secondary-color);
    font-size: 0.9rem;
    margin-top: 0.25rem;
  }

  .btn-submit {
    background-color: var(--primary-color);
    color: white;
    border: none;
    padding: 0.75rem 2rem;
    font-size: 1rem;
    border-radius: var(--radius);
    cursor: pointer;
    transition: var(--transition);
  }

  .btn-submit:hover {
    background-color: #3559ed;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
  }

  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
  }

  .admin-card {
    animation: fadeIn 0.5s ease-out;
  }
</style>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const fileInput = document.getElementById('file-upload');
    const fileNameDisplay = document.querySelector('.selected-file');
    
    fileInput.addEventListener('change', function() {
      if (this.files.length > 0) {
        fileNameDisplay.textContent = this.files[0].name;
      } else {
        fileNameDisplay.textContent = 'Tidak ada file yang dipilih';
      }
    });
  });
</script>

<?= $this->include('template/admin_footer'); ?>