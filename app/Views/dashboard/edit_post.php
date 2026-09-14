<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Blog Post - Lex Counsel</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
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
            padding: 25px 15px;
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
            color: #ffffff;
            padding: 13px 15px;
            margin-bottom: 8px;
            border-radius: 8px;
            font-size: 14px;
            transition: 0.3s;
        }

        .nav-link:hover,
        .nav-link.active {
            background: #C9A227;
            color: #0B1F3A;
        }

        .logout {
            color: #ff6b6b;
            margin-top: 25px;
        }

        .logout:hover {
            background: #ff6b6b;
            color: white;
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
            gap: 20px;
            margin-bottom: 30px;
        }

        .page-title {
            font-family: 'Playfair Display', serif;
            font-size: 32px;
            color: #0B1F3A;
        }

        .subtitle {
            color: #64748B;
            font-size: 14px;
            margin-top: 5px;
        }

        .btn {
            display: inline-block;
            border: none;
            text-decoration: none;
            cursor: pointer;
            padding: 11px 20px;
            border-radius: 7px;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            font-weight: 600;
        }

        .btn-gold {
            background: #C9A227;
            color: #0B1F3A;
        }

        .btn-gold:hover {
            background: #b28d1f;
        }

        .btn-gray {
            background: #E2E8F0;
            color: #0B1F3A;
        }

        .form-card {
            background: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 3px 12px rgba(0,0,0,0.06);
            max-width: 1000px;
        }

        .form-group {
            margin-bottom: 22px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 600;
            color: #0B1F3A;
        }

        .required {
            color: #DC2626;
        }

        .input,
        .select,
        .textarea {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #CBD5E1;
            border-radius: 7px;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            color: #1E293B;
            outline: none;
        }

        .input:focus,
        .select:focus,
        .textarea:focus {
            border-color: #C9A227;
        }

        .textarea {
            min-height: 220px;
            resize: vertical;
        }

        .excerpt {
            min-height: 100px;
        }

        .help {
            margin-top: 6px;
            font-size: 12px;
            color: #64748B;
        }

        .current-image {
            margin-top: 12px;
        }

        .current-image img {
            width: 180px;
            height: 120px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #CBD5E1;
        }

        .image-preview {
            margin-top: 15px;
            display: none;
        }

        .image-preview img {
            width: 220px;
            height: 140px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #CBD5E1;
        }

        .form-actions {
            display: flex;
            gap: 12px;
            margin-top: 25px;
        }

        .alert {
            padding: 14px 18px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .alert-error {
            background: #FEE2E2;
            color: #991B1B;
        }

        footer {
            text-align: center;
            padding: 30px 10px 10px;
            color: #64748B;
            font-size: 12px;
        }

        @media (max-width: 900px) {

            .sidebar {
                width: 70px;
                padding: 20px 10px;
            }

            .brand {
                font-size: 0;
            }

            .brand::after {
                content: "LC";
                font-size: 20px;
            }

            .nav-link {
                font-size: 0;
                text-align: center;
                padding: 13px 5px;
            }

            .main {
                margin-left: 70px;
                padding: 20px;
            }
        }

        @media (max-width: 600px) {

            .topbar {
                flex-direction: column;
                align-items: flex-start;
            }

            .page-title {
                font-size: 26px;
            }

            .main {
                padding: 15px;
            }

            .form-card {
                padding: 20px;
            }

            .form-actions {
                flex-direction: column;
            }

            .form-actions .btn {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>

<body>

<!-- Sidebar -->
<div class="sidebar">

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

    <a href="<?= base_url() ?>" class="nav-link">
        View Website
    </a>

    <a href="<?= base_url('admin/logout') ?>" class="nav-link logout">
        Logout
    </a>

</div>


<!-- Main -->
<div class="main">

    <div class="topbar">

        <div>
            <h1 class="page-title">Edit Blog Post</h1>

            <p class="subtitle">
                Update your Lex Counsel blog article.
            </p>
        </div>

        <a href="<?= base_url('admin/posts') ?>" class="btn btn-gray">
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
            action="<?= base_url('admin/posts/edit/' . $post['id']) ?>"
            method="post"
            enctype="multipart/form-data"
        >

            <?= csrf_field() ?>


            <!-- Title -->
            <div class="form-group">

                <label for="title">
                    Post Title <span class="required">*</span>
                </label>

                <input
                    type="text"
                    id="title"
                    name="title"
                    class="input"
                    value="<?= esc(old('title', $post['title'] ?? '')) ?>"
                    placeholder="Enter blog post title"
                    required
                >

            </div>


            <!-- Category -->
            <div class="form-group">

                <label for="category_id">
                    Category <span class="required">*</span>
                </label>

                <select
                    id="category_id"
                    name="category_id"
                    class="select"
                    required
                >

                    <option value="">
                        Select Category
                    </option>

                    <?php foreach (($categories ?? []) as $category): ?>

                        <option
                            value="<?= esc($category['id']) ?>"
                            <?= ((string) old('category_id', $post['category_id'] ?? '') === (string) $category['id']) ? 'selected' : '' ?>
                        >
                            <?= esc($category['name']) ?>
                        </option>

                    <?php endforeach; ?>

                </select>

            </div>


            <!-- Status -->
            <div class="form-group">

                <label for="status">
                    Status
                </label>

                <select
                    id="status"
                    name="status"
                    class="select"
                >

                    <option
                        value="draft"
                        <?= old('status', $post['status'] ?? 'draft') === 'draft' ? 'selected' : '' ?>
                    >
                        Draft
                    </option>

                    <option
                        value="published"
                        <?= old('status', $post['status'] ?? '') === 'published' ? 'selected' : '' ?>
                    >
                        Published
                    </option>

                </select>

            </div>


            <!-- Excerpt -->
            <div class="form-group">

                <label for="excerpt">
                    Excerpt
                </label>

                <textarea
                    id="excerpt"
                    name="excerpt"
                    class="textarea excerpt"
                    placeholder="Short description of the article"
                ><?= esc(old('excerpt', $post['excerpt'] ?? '')) ?></textarea>

                <div class="help">
                    A short summary that can be displayed on the blog listing.
                </div>

            </div>


            <!-- Content -->
            <div class="form-group">

                <label for="content">
                    Content <span class="required">*</span>
                </label>

                <textarea
                    id="content"
                    name="content"
                    class="textarea"
                    placeholder="Write your blog article here..."
                    required
                ><?= esc(old('content', $post['content'] ?? '')) ?></textarea>

            </div>


            <!-- Featured Image -->
            <div class="form-group">

                <label for="featured_image">
                    Featured Image
                </label>

                <?php if (!empty($post['featured_image'])): ?>

                    <div class="current-image">

                        <div class="help" style="margin-bottom: 8px;">
                            Current Image
                        </div>

                        <img
                            src="<?= base_url('uploads/posts/' . $post['featured_image']) ?>"
                            alt="<?= esc($post['title']) ?>"
                        >

                    </div>

                <?php endif; ?>


                <input
                    type="file"
                    id="featured_image"
                    name="featured_image"
                    class="input"
                    accept=".jpg,.jpeg,.png,.webp"
                >

                <div class="help">
                    Upload a new JPG, PNG or WEBP image. Maximum size: 2MB.
                    Leave blank to keep the current image.
                </div>


                <div class="image-preview" id="imagePreview">

                    <img id="previewImage" src="" alt="Preview">

                </div>

            </div>


            <!-- Actions -->
            <div class="form-actions">

                <button
                    type="submit"
                    class="btn btn-gold"
                >
                    Update Blog Post
                </button>

                <a
                    href="<?= base_url('admin/posts') ?>"
                    class="btn btn-gray"
                >
                    Cancel
                </a>

            </div>

        </form>

    </div>


    <footer>
        © <?= date('Y') ?> Lex Counsel. All rights reserved.
    </footer>

</div>


<script>

const imageInput = document.getElementById('featured_image');
const imagePreview = document.getElementById('imagePreview');
const previewImage = document.getElementById('previewImage');

imageInput.addEventListener('change', function () {

    const file = this.files[0];

    if (!file) {
        imagePreview.style.display = 'none';
        previewImage.src = '';
        return;
    }

    const allowedTypes = [
        'image/jpeg',
        'image/png',
        'image/webp'
    ];

    if (!allowedTypes.includes(file.type)) {
        alert('Only JPG, PNG and WEBP images are allowed.');
        this.value = '';
        imagePreview.style.display = 'none';
        return;
    }

    if (file.size > 2 * 1024 * 1024) {
        alert('Featured image must not exceed 2MB.');
        this.value = '';
        imagePreview.style.display = 'none';
        return;
    }

    const reader = new FileReader();

    reader.onload = function (event) {

        previewImage.src = event.target.result;
        imagePreview.style.display = 'block';

    };

    reader.readAsDataURL(file);

});

</script>

</body>
</html>