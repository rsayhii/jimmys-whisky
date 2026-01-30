<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page - Sticky Sidebar</title>
    <style>
      

        /* 1. Main Layout Container */
        .container {
            display: flex;
            max-width: 1100px;
            margin: 0 auto;
            gap: 40px;
            align-items: flex-start; /* Required for sticky to work */
        }

        /* 2. Left Side: Scrollable Content */
        .main-content {
            flex: 2; /* Takes 66% width */
        }

        .image-stack img {
            width: 100%;
            display: block;
            margin-bottom: 20px;
            border-radius: 4px;
        }

        .description {
            padding: 20px 0;
            line-height: 1.6;
            color: #333;
        }

        /* 3. Right Side: Sticky Sidebar */
        .sidebar {
            flex: 1; /* Takes 33% width */
            position: -webkit-sticky; /* Safari support */
            position: sticky;
            top: 20px; /* Distance from top of screen when stuck */
        }

        .product-card {
            background: white;
            padding: 30px;
            border: 1px solid #eee;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }

        .brand {
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 1px;
            color: #888;
            margin-bottom: 10px;
        }

        .product-name {
            font-size: 24px;
            margin-bottom: 15px;
        }

        .price {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .btn-add {
            width: 100%;
            padding: 15px;
            background: #000;
            color: white;
            border: none;
            font-weight: bold;
            cursor: pointer;
            transition: opacity 0.2s;
        }

        .btn-add:hover {
            opacity: 0.8;
        }

        /* Responsive - Stacks on mobile */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }
            .sidebar {
                position: static;
                width: 100%;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <main class="main-content">
            <div class="image-stack">
                <img src="https://via.placeholder.com/600x800?text=Product+Front" alt="Front View">
                <img src="https://via.placeholder.com/600x800?text=Product+Back" alt="Back View">
                <img src="https://via.placeholder.com/600x800?text=Packaging+Details" alt="Details">
            </div>
            
            <section class="description">
                <h2>Product Description</h2>
                <p>Enigma of Taif is a sophisticated blend of the finest Taif Rose and deep Oud notes. This fragrance captures the essence of a hidden garden at midnight.</p>
                <p>Scroll down to see more details... (Add more text or images here to test the sticky effect!)</p>
                <div style="height: 1000px;"></div> </section>
        </main>

        <aside class="sidebar">
            <div class="product-card">
                <div class="brand">Swiss Arabian</div>
                <h1 class="product-name">Enigma of Taif</h1>
                <div class="price">₹5,650.00</div>
                
                <button class="btn-add">ADD TO CART</button>
                
                <div style="margin-top: 20px; font-size: 14px; color: #555;">
                    <p>• Free shipping on orders over ₹2000</p>
                    <p>• 100% Authentic Guarantee</p>
                </div>
            </div>
        </aside>
    </div>

</body>
</html>