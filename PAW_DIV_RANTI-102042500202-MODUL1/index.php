<?php
$produk_list = [
    [
        "nama" => "THE BASE BRUSH",
        "kategori" => "FACE",
        "harga" => 628000,
        "stok" => 10,
        "gambar" => "images/the-base-brush.png"
    ],
    [
        "nama" => "THE SCULPT BRUSH",
        "kategori" => "FACE",
        "harga" => 456000,
        "stok" => 0,
        "gambar" => "images/the-sculpt-brush.png"
    ],
    [
        "nama" => "THE SET BRUSH",
        "kategori" => "FACE",
        "harga" => 480000,
        "stok" => 8,
        "gambar" => "images/the-set-brush.png"
    ],
    [
        "nama" => "THE FLUSH BRUSH",
        "kategori" => "FACE",
        "harga" => 432000,
        "stok" => 0, 
        "gambar" => "images/the-flush-brush.png"
    ],
    [
        "nama" => "THE BLEND BRUSH",
        "kategori" => "EYE",
        "harga" => 336000,
        "stok" => 15,
        "gambar" => "images/the-blend-brush.png"
    ],
    [
        "nama" => "THE GLINT BRUSH",
        "kategori" => "EYE",
        "harga" => 336000,
        "stok" => 11,
        "gambar" => "images/the-glint-brush.png"
    ],
    [
        "nama" => "THE SMOKE BRUSH",
        "kategori" => "EYE",
        "harga" => 315000,
        "stok" => 12,
        "gambar" => "images/the-smoke-brush.png"
    ],
    [
        "nama" => "THE LINE BRUSH",
        "kategori" => "EYE",
        "harga" => 315000,
        "stok" => 7,
        "gambar" => "images/the-line-brush.png"
    ],
    [
        "nama" => "THE LIP BRUSH",
        "kategori" => "LIP",
        "harga" => 264000,
        "stok" => 9,
        "gambar" => "images/the-lip-brush.png"
    ],
    [
        "nama" => "THE FACE EDIT",
        "subtitle" => "4-Piece Professional Face Collection",
        "kategori" => "SET",
        "harga" => 1350000, 
        "stok" => 6,
        "gambar" => "images/the-face-edit.png"
    ],
    [
        "nama" => "THE EYE EDIT",
        "subtitle" => "4-Piece Professional Eye Collection",
        "kategori" => "SET",
        "harga" => 850000,
        "stok" => 10,
        "gambar" => "images/the-eye-edit.png"
    ],
    [
        "nama" => "THE ARTIST EDIT",
        "subtitle" => "9-Piece Professional Brush Collection",
        "kategori" => "SET",
        "harga" => 2250000, 
        "stok" => 3,
        "gambar" => "images/the-artist-edit.png"
    ]
];

$total_produk = count($produk_list);

function formatRupiah($angka) {
    return "Rp" . number_format($angka, 0, ',', '.');
}

function hitungDiskon($harga) {
    if ($harga >= 1000000) {
        $harga_setelah_diskon = $harga * 0.90; 
        return [
            'is_discount' => true,
            'persen' => 10,
            'harga_akhir' => $harga_setelah_diskon
        ];
    }
    return [
        'is_discount' => false,
        'persen' => 0,
        'harga_akhir' => $harga
    ];
}

function cekStatusStok($stok) {
    if ($stok > 0) {
        return [
            'is_available' => true,
            'label' => 'TERSEDIA',
            'badge_class'  => 'badge-available'
        ];
    }
    return [
        'is_available' => false,
        'label' => 'TIDAK TERSEDIA',
        'badge_class'  => 'badge-soldout'
    ];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BRUSHED by RAN | Professional Makeup Tools</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
    <header class="navbar">
        <nav class="nav-left">
            <a href="#home">HOME</a>
            <a href="#products">BRUSHES</a>
            <a href="#about">ABOUT</a>
        </nav>

        <div class="nav-brand">
            BRUSHED <span class="brand-sub">by RAN</span>
        </div>
    </header>

    <section class="hero" id="home">
        <div class="hero-content">
            <p class="hero-tag">CRAFT. CONTROL. ARTISTRY.</p>
            <h1>THE ART OF PRECISION</h1>
            <p class="hero-desc">BRUSHED by RAN was created for artists who believe every stroke matters. Our professional brushes are designed to deliver precision and control, allowing your technique to take center stage.</p>
            <a href="#products" class="btn-hero">SHOP THE COLLECTION</a>
        </div>
    </section>
    <main class="container" id="products">
        <div class="catalog-header">
            <div>
                <p class="section-subtitle">OUR COLLECTION</p>
                <h2 class="section-title">KATALOG PRODUK</h2>
            </div>
            <div class="total-badge">
                TOTAL PRODUK: <strong><?= $total_produk; ?></strong>
            </div>
        </div>
        <div class="product-grid">
            <?php foreach ($produk_list as $produk) : ?>
                <?php 
                    $info_diskon = hitungDiskon($produk['harga']);
                    $status_stok = cekStatusStok($produk['stok']);
                ?>
                <div class="product-card">
                    <div class="card-image-box">
                        <img src="<?= $produk['gambar']; ?>" alt="<?= $produk['nama']; ?>">
                        <?php if ($info_diskon['is_discount']) : ?>
                            <span class="badge badge-discount"><?= $info_diskon['persen']; ?>% OFF</span>
                        <?php endif; ?>
                        <span class="badge <?= $status_stok['badge_class']; ?>">
                            <?= $status_stok['label']; ?>
                        </span>
                    </div>

                    <div class="card-details">
                        <span class="product-category"><?= $produk['kategori']; ?></span>
                        <h3 class="product-name"><?= $produk['nama']; ?></h3>

                        <?php if (isset($produk['subtitle'])) : ?>
                            <p class="product-subtitle"><?= $produk['subtitle']; ?></p>
                        <?php endif; ?>

                        <div class="price-box">
                            <?php if ($info_diskon['is_discount']) : ?>
                                <span class="old-price"><?= formatRupiah($produk['harga']); ?></span>
                                <span class="final-price"><?= formatRupiah($info_diskon['harga_akhir']); ?></span>
                            <?php else : ?>
                                <span class="final-price"><?= formatRupiah($produk['harga']); ?></span>
                            <?php endif; ?>
                        </div>

                        <p class="stock-text">Stok: <?= $produk['stok']; ?></p>

                        <?php if ($status_stok['is_available']) : ?>
                            <button class="btn-buy">BELI SEKARANG</button>
                        <?php else : ?>
                            <button class="btn-buy disabled" disabled>TIDAK TERSEDIA</button>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <footer class="footer">
        <p>&copy; <?= date("Y"); ?> BRUSHED BY RAN. ALL RIGHTS RESERVED.</p>
    </footer>

</body>
</html>