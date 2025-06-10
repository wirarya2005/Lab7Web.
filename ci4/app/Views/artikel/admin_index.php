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
        gap: 10px;
        margin: 25px 0;
        background: white;
        padding: 15px 20px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        border-left: 4px solid #2563eb;
    }
    
    .form-search input[type="text"],
    .form-search select {
        flex: 1;
        padding: 12px 15px;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        font-size: 16px;
        transition: all 0.3s ease;
        background-color: #f8fafc;
        color: #334155;
        font-family: 'Poppins', Arial, sans-serif;
    }
    
    .form-search input[type="text"]:focus,
    .form-search select:focus {
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
        
        .form-search input[type="text"],
        .form-search select {
            margin-right: 0;
            margin-bottom: 10px;
        }
        
        .form-search input[type="submit"] {
            width: 100%;
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
    <a href="<?= base_url('ajax/form') ?>" class="btn btn-primary" style="margin-bottom: 15px;">+ Tambah Artikel</a>

    <form id="search-form" class="form-search">
        <input type="text" name="q" id="search-box" value="<?= esc($q ?? '') ?>" placeholder="Cari data" class="form-control mr-2">
        <select name="kategori_id" id="category-filter" class="form-control mr-2">
            <option value="">==Semua Kategori==</option>
            <?php foreach ($kategori as $k): ?>
                <option value="<?= $k['id_kategori']; ?>" <?= ($kategori_id == $k['id_kategori']) ? 'selected' : ''; ?>>
                    <?= $k['nama_kategori']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Cari" class="btn btn-primary">
    </form>

    <div id="article-container"></div>
    <div id="pagination-container"></div>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    const articleContainer = $('#article-container');
    const paginationContainer = $('#pagination-container');
    const searchBox = $('#search-box');
    const categoryFilter = $('#category-filter');
    const searchForm = $('#search-form');
    const baseUrl = '<?= base_url(); ?>'; 

    const fetchData = (url) => {
        // Show loading indicators
        articleContainer.html('<p style="text-align: center; padding: 20px; color: #64748b;">Memuat data artikel...</p>');
        paginationContainer.html('<p style="text-align: center; padding: 10px; color: #64748b;">Memuat paginasi...</p>');

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            success: function(data) {
                renderArticles(data.artikel);
                renderPagination(data.pager, data.q, data.kategori_id, data.orderBy, data.sortOrder);
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error: " + status + " - " + error);
                articleContainer.html('<p style="text-align: center; padding: 20px; color: #dc2626;">Gagal memuat data. Silakan coba lagi.</p>');
                paginationContainer.html('');
            }
        });
    };

    const renderArticles = (articles) => {
        let html = `
            <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th data-sort-by="id" class="sortable">ID <span class="sort-icon"></span></th>
                        <th data-sort-by="judul" class="sortable">Judul <span class="sort-icon"></span></th>
                        <th data-sort-by="nama_kategori" class="sortable">Kategori <span class="sort-icon"></span></th>
                        <th data-sort-by="status" class="sortable">Status <span class="sort-icon"></span></th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
        `;
        if (articles && articles.length > 0) {
            const baseUrl = '<?= base_url(); ?>';
            articles.forEach(article => {
                const editUrl = `${baseUrl}admin/artikel/edit/${article.id}`;
                const deleteUrl = `${baseUrl}admin/artikel/delete/${article.id}`;
                html += `
                    <tr>
                        <td>${article.id}</td>
                        <td>
                            <b>${article.judul}</b>
                            <p style="font-size: 0.85em; color: #666;">${(article.isi || '').substring(0, 50)}...</p>
                        </td>
                        <td>${article.nama_kategori}</td>
                        <td><span class="badge ${article.status === 'published' ? 'badge-success' : 'badge-secondary'}">${article.status}</span></td>
                        <td>
                            <a class="btn btn-sm btn-info" href="${editUrl}">Ubah</a>
                            <a class="btn btn-sm btn-danger" onclick="return confirm('Yakin menghapus data?')" href="${deleteUrl}">Hapus</a>
                        </td>
                    </tr>
                `;
            });
        } else {
            html += `<tr><td colspan="5" style="text-align: center; padding: 40px; color: #64748b; font-style: italic;">Tidak ada data.</td></tr>`;
        }
        html += `</tbody></table></div>`;
        articleContainer.html(html);
    };

    const renderPagination = (pager, q, kategori_id, orderBy, sortOrder) => {
        let html = '';
        if (pager && pager.links && pager.links.length > 0) {
            const baseUrl = '<?= base_url(); ?>';
            html += `<nav aria-label="Page navigation"><ul class="pagination justify-content-center">`;
            pager.links.forEach(link => {
                let url = `${baseUrl}admin/artikel`;
                if (link.uri) {
                    const urlParams = new URLSearchParams(link.uri.split('?')[1]);
                    const page = urlParams.get('page');
                    if (page) {
                        url += `?page=${page}`;
                    }
                }
                
                const separator = url.includes('?') ? '&' : '?';
                url += `${separator}q=${encodeURIComponent(q)}&kategori_id=${encodeURIComponent(kategori_id)}&orderBy=${encodeURIComponent(orderBy)}&sortOrder=${encodeURIComponent(sortOrder)}`;

                html += `<li class="page-item ${link.active ? 'active' : ''}"><a class="page-link" href="#" data-page-url="${url}">${link.title}</a></li>`;
            });
            html += `</ul></nav>`;
        }
        paginationContainer.html(html);
    };

    searchForm.on('submit', function(e) {
        e.preventDefault();
        const q = searchBox.val();
        const kategori_id = categoryFilter.val();
        const currentOrderBy = $('#article-container th.sortable.active').data('sort-by') || 'id';
        const currentSortOrder = $('#article-container th.sortable.active').data('sort-order') || 'DESC';
        fetchData(`${baseUrl}admin/artikel?q=${encodeURIComponent(q)}&kategori_id=${encodeURIComponent(kategori_id)}&orderBy=${encodeURIComponent(currentOrderBy)}&sortOrder=${encodeURIComponent(currentSortOrder)}`);
    });

    categoryFilter.on('change', function() {
        searchForm.trigger('submit');
    });

    // Handle pagination link clicks
    $(document).on('click', '.page-link', function(e) {
        e.preventDefault();
        const url = $(this).data('page-url');
        fetchData(url);
    });

    // Handle sorting clicks
    $(document).on('click', '#article-container th.sortable', function() {
        const clickedColumn = $(this);
        const orderBy = clickedColumn.data('sort-by');
        let sortOrder = 'ASC';

        // If this column is already sorted, toggle the order
        if (clickedColumn.hasClass('active')) {
            sortOrder = (clickedColumn.data('sort-order') === 'ASC') ? 'DESC' : 'ASC';
        }

        // Remove active class and sort icons from other columns
        $('#article-container th.sortable').removeClass('active').removeData('sort-order');
        $('#article-container th .sort-icon').html('');

        // Add active class and set sort order for the clicked column
        clickedColumn.addClass('active').data('sort-order', sortOrder);
        clickedColumn.find('.sort-icon').html(sortOrder === 'ASC' ? ' &#9650;' : ' &#9660;'); // Up or Down arrow

        // Trigger a new data fetch with sorting parameters
        const q = searchBox.val();
        const kategori_id = categoryFilter.val();
        fetchData(`${baseUrl}admin/artikel?q=${encodeURIComponent(q)}&kategori_id=${encodeURIComponent(kategori_id)}&orderBy=${encodeURIComponent(orderBy)}&sortOrder=${encodeURIComponent(sortOrder)}`);
    });

    // Initial load and set default sorting visual
    const initialOrderBy = 'id'; // Default sort column
    const initialSortOrder = 'DESC'; // Default sort order
    
    // Set active class and sort order for the default column visually
    const defaultSortColumn = $(`#article-container th[data-sort-by="${initialOrderBy}"]`);
    defaultSortColumn.addClass('active').data('sort-order', initialSortOrder);
    defaultSortColumn.find('.sort-icon').html(initialSortOrder === 'ASC' ? ' &#9650;' : ' &#9660;');

    const initialUrl = `${baseUrl}admin/artikel?orderBy=${encodeURIComponent(initialOrderBy)}&sortOrder=${encodeURIComponent(initialSortOrder)}`;
    fetchData(initialUrl);
});
</script>

<?= $this->include('template/admin_footer'); ?>