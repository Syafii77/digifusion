<?= $this->extend('layout/app'); ?>
<?= $this->section('head'); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Read the latest articles about Diggers. Explore insights, updates, and information to enhance your knowledge.">
    <title>Articles - Diggers</title>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<!-- Banner -->
<section class="hero-section text-center" style="background-color: #F7C433; padding: 40px 20px; border-radius: 30px;">
    <div class="container">
        <h1 style="font-size: 3rem; color: #FFFFFF; text-decoration: underline;">Blogs</h1>
        <p style="color: #FFFFFF; margin-bottom: 40px; font-size: 1.2rem;">Read some of the existing Blogs about Diggers</p>
    </div>
</section>

<style>
    .hero-section {
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        height: 50vh;
        padding: 40px 20px; /* Padding di dalam section */
    }

    .hero-section h1 {
        font-size: 3rem;
        color: #FFFFFF;
        text-decoration: underline;
    }

    .hero-section p {
        margin-bottom: 40px;
        color: #FFFFFF;
        font-size: 1.2rem; /* Ukuran teks lebih besar untuk lebih terlihat */
    }

    @media (max-width: 768px) {
        .hero-section h1 {
            font-size: 2.5rem; /* Ukuran teks lebih kecil di layar kecil */
        }

        .hero-section p {
            margin-bottom: 20px; /* Mengurangi margin di bawah teks di layar kecil */
            font-size: 1rem; /* Ukuran teks deskripsi lebih kecil */
        }

        .hero-section {
            padding: 20px 10px; /* Mengurangi padding di layar kecil */
        }
    }
</style>

<!-- Sort Dropdown -->
<section class="sort-section" style="text-align: center; margin: 20px 0;">
    <label for="sort-select" class="sort-label">Sort By:</label>
    <div class="custom-select-wrapper">
        <select id="sort-select" class="custom-select" onchange="sortArticles()">
            <option value="alphabetical">Alphabetical</option>
            <option value="date_newest">Date (Newest First)</option>
            <option value="date_oldest">Date (Oldest First)</option>
        </select>
    </div>
</section>

<!-- Card Articles -->
<!-- Card Articles -->
<section>
    <div class="container" style="padding: 0 15px;">
        <div class="row g-4" id="article-list" style="display: flex; flex-direction: column;">
            <?php if (!empty($articles)): ?>
                <?php foreach ($articles as $article): ?>
                    <div class="col-12 article-item" data-title="<?= strtolower($article['judul_artikel']); ?>" data-date="<?= strtotime($article['created_at']); ?>">
                        <div class="card h-100 d-flex flex-row card-shadow" style="margin: 10px 0; align-items: center;">
                            <div class="card-img-wrapper">
                                <img src="<?= base_url('image/' . $article['foto_artikel']); ?>" class="card-img-top article-img" alt="<?= $article['judul_artikel']; ?>">
                            </div>
                            <div class="card-body" style="flex: 1; padding: 20px;">
                                <h5 class="card-title"><?= $article['judul_artikel']; ?></h5>
                                <p class="card-text deskripsi-artikel"><?= $article['deskripsi_artikel']; ?></p>
                                <p class="card-text" style="font-size: 0.9rem; color: #999;">Created at: <?= date('d M Y', strtotime($article['created_at'])); ?></p>
                                <a href="<?= base_url('artikel/detail/' . $article['slug']); ?>" class="read-more">Read-more</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No articles found.</p>
            <?php endif; ?>
        </div>
    </div>
</section>

<style>
    .card-shadow {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .card-shadow:hover {
        transform: translateY(-5px) scale(1.03);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
    }

    .card {
        display: flex;
        flex-direction: row;
    }

    .card-img-wrapper {
        flex-shrink: 0;
        width: 200px;
        background-color: #f9f9f9;
        overflow: hidden;
        border-radius: 10px 0 0 10px;
    }

    .article-img {
        object-fit: cover;
        width: 100%;
        height: 100%;
    }

    .deskripsi-artikel {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    /* Responsiveness */
    @media (max-width: 768px) {
        .card {
            flex-direction: column;
        }

        .card-img-wrapper {
            width: 100%;
            height: 200px;
            border-radius: 10px 10px 0 0;
        }

        .card-body {
            padding: 15px;
        }
    }
</style>


<!-- CSS untuk gaya baru Sort By -->
<style>
    .sort-label {
        font-weight: bold;
        margin-right: 10px;
    }

    .custom-select-wrapper {
        display: inline-block;
        position: relative;
    }

    .custom-select {
        background-color: #fff;
        border: 2px solid #F6C135;
        border-radius: 8px;
        padding: 10px;
        font-size: 1rem;
        cursor: pointer;
        appearance: none;
        width: 200px;
        text-align: center;
        color: #333;
    }

    .custom-select:focus {
        outline: none;
        border-color: #F7C433;
    }

    .custom-select-wrapper::after {
        content: "▼";
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 0.8rem;
        color: #999;
    }

    .card-shadow {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Shadow dasar */
        transition: transform 0.3s, box-shadow 0.3s; /* Transisi untuk efek 3D */
    }

    .card-shadow:hover {
        transform: translateY(-10px) scale(1.05); /* Efek angkat sedikit dan membesar */
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3); /* Shadow lebih tebal saat hover */
    }

    .card-img-wrapper {
        padding: 10px;
        background-color: #f9f9f9;
    }

    .article-img {
        object-fit: cover;
        width: 100%;
        height: 250px; /* Besarkan ukuran gambar */
    }

    .deskripsi-artikel {
        display: -webkit-box;
        -webkit-line-clamp: 4;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .read-more {
        text-decoration: underline;
        color: #F6C135;
        font-weight: bold;
        display: block;
        margin-top: 15px;
    }

    .read-more:hover {
        color: #F7C433;
    }
</style>

<?= $this->endSection(); ?>
