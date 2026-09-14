<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Blog Post | Lex Counsel</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@400;500;600&display=swap"
        rel="stylesheet"
    >

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #F8F9FA;
            color: #1E293B;
        }

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            height: 100vh;
            background: #0B1F3A;
            color: white;
            padding: 25px 18px;
            z-index: 1000;
        }

        .brand {
            font-family: 'Playfair Display', serif;
            font-size: 27px;
            font-weight: 700;
            color: #C9A227;
            text-align: center;
            margin-bottom: 35px;
        }

        .nav-link {
            display: block;
            text-decoration: none;
            color: white;
            padding: 13px 15px;
            margin-bottom: 8px;
            border-radius: 7px;
            font-size: 14px;
            transition: 0.3s;
        }

        .nav-link:hover,
        .nav-link.active {
            background: rgba(201, 162, 39, 0.15);
            color: #C9A227;
        }

        .logout {
            color: #ff6b6b;
            margin-top: 25px;
        }

        .logout:hover {
            background: rgba(255, 107, 107, 0.12);
            color: #ff6b6b;
        }

        .main {
            margin-left: 250px;
            min-height: 100vh;
            padding: 30px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            gap: 20px;
        }

        .topbar h1 {
            font-family: 'Playfair Display', serif;
            color: #0B1F3A;
            font-size: 30px;
            margin-bottom: 5px;
        }

        .topbar p {
            color: #64748B;
            font-size: 14px;
        }

        .back-btn {
            display: inline-block;
            background: #E2E8F0;
            color: #334155;
            text-decoration: none;
            padding: 11px 18px;
            border-radius: 7px;
            font-size: 14px;
            font-weight: 600;
        }

        .back-btn:hover {
            background: #CBD5E1;
        }

        .alert {
            padding: 13px 16px;
            border-radius: 7px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .alert-error {
            background: #FEF2F2;
            color: #B91C1C;
            border: 1px solid #FECACA;
        }

        .form-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 3px 15px rgba(15, 23, 42, 0.07);
            padding: 30px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 22px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .full-width {
            grid-column: 1 / -1;
        }

        label {
            color: #0B1F3A;
            font-size: 13px;
            font-weight: 600;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 12px 13px;
            border: 1px solid #CBD5E1;
            border-radius: 7px;
            font-family: 'Poppins', sans-serif;
            font-size: 13px;
            color: #1E293B;
            outline: none;
            background: white;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #C9A227;
        }

        textarea {
            resize: vertical;
            line-height: 1.6;
        }

        .help-text {
            color: #64748B;
            font-size: 11px;
        }

        .file-input {
            padding: 10px;
            background: #F8FAFC;
        }

        .image-preview {
            margin-top: 10px;
        }

        .image-preview img {
            width: 220px;
            height: 140px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #E2E8F0;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #E2E8F0;
        }

        .cancel-btn,
        .save-btn {
            border: none;
            text-decoration: none;
            padding: 11px 20px;
            border-radius: 7px;
            font-family: 'Poppins', sans-serif;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
        }

        .cancel-btn {
            background: #E2E8F0;
            color: #334155;
        }

        .save-btn {
            background: #C9A227;
            color: #0B1F3A;
        }

        .save-btn:hover {
            opacity: 0.9;
        }

        .footer {
            margin-top: 35px;
            text-align: center;
            color: #64748B;
            font-size: 12px;
            padding: 20px;
        }

        @media (max-width: 900px) {

            .sidebar {
                width: 70px;
                padding: 25px 10px;
            }

            .brand {
                font-size: 0;
            }

            .brand::after {
                content: "LC";
                font-size: 20px;
            }

            .nav-link {
                text-align: center;
                font-size: 0;
                padding: 13px 5px;
            }

            .main {
                margin-left: 70px;
                padding: 20px;
            }

        }

        @media (max-width: 650px) {

            .topbar {
                align-items: flex-start;
                flex-direction: column;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .full-width {
                grid-column: auto;
            }

            .form-card {
                padding: 20px;
            }

            .form-actions {
                flex-direction: column;
            }

            .cancel-btn,
            .save-btn {
                width: 100%;
                text-align: center;
            }

        }

    </style>

</head>

<body>

<aside class="sidebar">

    <div class="brand">
        Lex Counsel
    </div>

    <a href="<?= base_url('admin') ?>" class="nav-link">
        Dashboard
    </a>

    <a href="<?= base_url('admin/attorneys') ?>" class="nav-link">
        Attorneys
    </a>

    <a href="<?= base_url('admin/practice-areas') ?>" class="nav-link">
        Practice Areas
    </a>

    <a href="<?= base_url('admin/posts') ?>" class="nav-link active">
        Blog Posts
    </a>

    <a href="<?= base_url('/') ?>" class="nav-link">
        View Website
    </a>

    <a href="<?= base_url('admin/logout') ?>" class="nav-link logout">
        Logout
    </a>

</aside>


<main class="main">

    <div class="topbar">

        <div>

            <h1>Add Blog Post</h1>

            <p>Create a new article for the Lex Counsel blog.</p>

        </div>

        <a
            href="<?= base_url('admin/posts') ?>"
            class="back-btn"
        >
            ← Back to Posts
        </a>

    </div>


    <?php if (session()->getFlashdata('error')): ?>

        <div class="alert alert-error">

            <?= esc(session()->getFlashdata('error')) ?>

        </div>

    <?php endif; ?>


    <div class="form-card">

        <form
            action="<?= base_url('admin/posts/add') ?>"
            method="post"
            enctype="multipart/form-data"
        >

            <?= csrf_field() ?>


            <div class="form-grid">


                <div class="form-group full-width">

                    <label for="title">
                        Post Title *
                    </label>

                    <input
                        type="text"
                        id="title"
                        name="title"
                        value="<?= old('title') ?>"
                        placeholder="Enter blog post title"
                        required
                    >

                </div>


                <div class="form-group">

                    <label for="category_id">
                        Category *
                    </label>

                    <select
                        id="category_id"
                        name="category_id"
                        required
                    >

                        <option value="">
                            Select Category
                        </option>

                        <?php foreach ($categories as $category): ?>

                            <option
                                value="<?= esc($category['id']) ?>"
                                <?= (string) old('category_id') === (string) $category['id'] ? 'selected' : '' ?>
                            >
                                <?= esc($category['name']) ?>
                            </option>

                        <?php endforeach; ?>

                    </select>

                </div>


                <div class="form-group">

                    <label for="status">
                        Status *
                    </label>

                    <select
                        id="status"
                        name="status"
                        required
                    >

                        <option
                            value="draft"
                            <?= old('status', 'draft') === 'draft' ? 'selected' : '' ?>
                        >
                            Draft
                        </option>

                        <option
                            value="published"
                            <?= old('status') === 'published' ? 'selected' : '' ?>
                        >
                            Published
                        </option>

                    </select>

                </div>


                <div class="form-group full-width">

                    <label for="excerpt">
                        Short Excerpt
                    </label>

                    <textarea
                        id="excerpt"
                        name="excerpt"
                        rows="4"
                        placeholder="Write a short summary of this article..."
                    ><?= old('excerpt') ?></textarea>

                    <span class="help-text">
                        A short description that can be displayed on the blog listing page.
                    </span>

                </div>


                <div class="form-group full-width">

                    <label for="content">
                        Post Content *
                    </label>

                    <textarea
                        id="content"
                        name="content"
                        rows="16"
                        placeholder="Write your complete blog article here..."
                        required
                    ><?= old('content') ?></textarea>

                    <span class="help-text">
                        Write the complete article content here.
                    </span>

                </div>


                <div class="form-group full-width">

                    <label for="featured_image">
                        Featured Image
                    </label>

                    <input
                        type="file"
                        id="featured_image"
                        name="featured_image"
                        class="file-input"
                        accept=".jpg,.jpeg,.png,.webp"
                    >

                    <span class="help-text">
                        JPG, PNG or WEBP. Maximum size: 2MB.
                    </span>

                    <div
                        id="imagePreview"
                        class="image-preview"
                    ></div>

                </div>


            </div>


            <div class="form-actions">

                <a
                    href="<?= base_url('admin/posts') ?>"
                    class="cancel-btn"
                >
                    Cancel
                </a>

                <button
                    type="submit"
                    class="save-btn"
                >
                    Save Blog Post
                </button>

            </div>


        </form>

    </div>


    <div class="footer">
        © <?= date('Y') ?> Lex Counsel. All rights reserved.
    </div>

</main>


<script>

const imageInput = document.getElementById('featured_image');

const imagePreview = document.getElementById('imagePreview');


imageInput.addEventListener('change', function () {

    imagePreview.innerHTML = '';

    const file = this.files[0];

    if (!file) {
        return;
    }


    const allowedTypes = [
        'image/jpeg',
        'image/png',
        'image/webp'
    ];


    if (!allowedTypes.includes(file.type)) {

        imagePreview.innerHTML =
            '<span style="color:#B91C1C;font-size:12px;">Invalid image type.</span>';

        this.value = '';

        return;
    }


    if (file.size > 2 * 1024 * 1024) {

        imagePreview.innerHTML =
            '<span style="color:#B91C1C;font-size:12px;">Image must not exceed 2MB.</span>';

        this.value = '';

        return;
    }


    const reader = new FileReader();


    reader.onload = function (event) {

        imagePreview.innerHTML =
            '<img src="' +
            event.target.result +
            '" alt="Featured Image Preview">';

    };


    reader.readAsDataURL(file);

});

</script>

</body>

</html>