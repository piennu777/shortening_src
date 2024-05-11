<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8" />
    <title>リンク短縮｜pien.red</title>
    <meta name="keywords" content="pien.red,リンク短縮">
    <meta name="description" content="ここが死ぬまでご利用可能のリンク短縮ツールです。生成した後削除キーさえ保管していれば簡単に削除することが可能！">
    <meta name="copyright" content="Copyright &copy; 2023 PIENNU. All rights reserved." />
    <meta property="og:title" content="リンク短縮 - pien.red" />
    <meta name="og:description" content="ここが死ぬまでご利用可能のリンク短縮ツールです。生成した後削除キーさえ保管していれば簡単に削除することが可能！">
    <meta property="og:image" content="https://pien.red/t/shortening/header.jpg">
    <meta property="og:locale" content="ja_JP" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.png">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Jersey+25+Charted&family=Noto+Sans+JP:wght@100..900&display=swap');
        </style>
    <style>
* {
    margin: 0;
}

body {
    margin: 0;
    padding: 0;
    font-family: "Noto Sans JP", sans-serif;
    font-optical-sizing: auto;
    font-weight: weight;
    font-style: normal;
}

h2 {
    font-size: 40px;
    color: #555555;
    margin-top: 30px;
    margin-bottom: 15px;
}

a {
    text-decoration:none;
}

/* ヘッダー */
header {
    color: #2b2b2b;
    padding: 20px;
    display: flex;
    align-items: center;
}

.logo {
    flex: 1;
}

.logo img {
    height: 40px; /* アイコンの高さ */
    width: auto;
}

nav ul {
    color: #2b2b2b;
    list-style-type: none;
    margin: 0;
    padding: 0;
    display: flex;
}

nav ul li {
    color: #2b2b2b;
    margin-right: 20px;
}

nav ul li a {
    color: #2b2b2b;
    text-decoration: none;
}

/* Welcome to pien.red! */
.hero {
    background-color: #f2f2f2;
    padding: 20px 10px;
    text-align: center;
}
.hero p {
  font-size: 19px;
}
.hero a {
    color: #424242;
}

.btn {
    background-color: #e4e4e4;
    padding: 6px 8px 6px 8px;
    border-radius: 15px 15px 15px 15px;
    transition: 0.5s;
    margin-top: 5px;
    margin-left: 3px;
    margin-right: 3px;
    scroll-behavior: smooth;
}

.btn:hover {
    background-color: #cecece;
}

.fa-fire {
    margin-right: 5px;
    margin-left: 2px;
    color: #6d6d6d;
}

.fa-trash {
    margin-right: 5px;
    margin-left: 2px;
    color: #ff6d6d;
}

/* フォーム */
.form-container {
        max-width: 500px;
        margin: auto;
        padding: 20px;
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        border-radius: 8px;
    }

    .form-container label {
        display: block;
        margin-bottom: 5px;
    }

    .form-container input[type="url"],
    .form-container input[type="text"] {
        width: calc(100% - 20px);
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
    }

    .form-container button[type="submit"] {
        width: calc(100% - 20px);
        padding: 10px;
        background-color: #007bff;
        border: none;
        border-radius: 5px;
        color: #fff;
        font-size: 16px;
        cursor: pointer;
    }

    .form-container button[type="submit"]:hover {
        background-color: #0056b3;
    }

    .form-container .compressed-link {
        margin-top: 15px;
    }
    </style>
</head>
<body>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <header>
        <div class="logo">
            <a href="/"><img src="/favicon.png" alt="ロゴ"></a>
        </div>
        <nav>
            <ul>
                <li><a href="/">ホーム</a></li>
                <li><a href="https://contact.piennu777.jp/">お問い合わせ</a></li>
            </ul>
        </nav>
    </header>
    
<main>
<section class="hero">
        <h2>URL短縮</h2>
        <p style="margin-bottom: 29px;">ここが死ぬまで利用することができます。</p>
        <a href="#generation" class="btn"><i class="fa-solid fa-fire"></i>早速使う！</a>
        <a href="#deletion" class="btn"><i class="fa-solid fa-trash"></i>削除したい</a>
        <br><br><br>
    </section>


    <br>

    <div class="form-container" id="generation">
        <form action="compress.php" method="post">
            <h3>短縮URLを生成</h3>
            <p style="margin-bottom: 8px;"></p>
            <label for="link">URL</label>
            <input type="url" id="link" name="link" required placeholder="https://example.com">
    
            <label for="directory">名前</label>
            <input type="text" id="directory" name="directory" placeholder="pien.red/〇〇" required>

            <button type="submit">生成</button>
    
            <?php
            // フォームからのリダイレクト後にメッセージを表示
            if (isset($_GET['link'])) {
                echo '<p class="compressed-link">圧縮されたリンク: <a href="http://' . htmlspecialchars($_GET['link']) . '">' . htmlspecialchars($_GET['link']) . '</a></p>';
            }
            
            if (isset($_GET['key'])) {
                $key = $_GET['key'];
                echo '<p class="key">削除キー: ' . htmlspecialchars($key) . '</p>';
            }
    
            // エラーメッセージを表示
            if (isset($_GET['error'])) {
                echo '<p class="compressed-link">ERROR: ' . htmlspecialchars($_GET['error']) . '</p>';
            }
            ?>
        </form>
    </div>

    <br>

    <div class="form-container" id="deletion">
        <form action="deletion.php" method="post">
            <h3>短縮URLを削除</h3>
            <p style="margin-bottom: 8px;"></p>
            <label for="link">名前</label>
            <input type="text" id="link" name="link" required placeholder="https://pien.red/〇〇">
    
            <label for="directory">削除キー</label>
            <input type="text" id="directory" name="directory" placeholder="〇〇〇〇" required>
    
            <button type="submit" style="background-color: #ff0000;">削除</button>
    
            <?php
            // フォームからのリダイレクト後にメッセージを表示
            if (isset($_GET['ok'])) {
                echo '<p class="compressed-link">削除されました。</p>';
            }
    
            // エラーメッセージを表示
            if (isset($_GET['no'])) {
                echo '<p class="compressed-link">ERROR: ' . htmlspecialchars($_GET['error']) . '</p>';
            }
            ?>
        </form>
    </div>

    <br><br>
    </main>

  <!-- JavaScriptの巣窟 -->
  <script>
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();

            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
</script>
  <script src="https://kit.fontawesome.com/dd69661a1b.js" crossorigin="anonymous"></script>
</body>
</html>
