<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Blog Posts - Lex Counsel</title>

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

        .filters {
            background: white;
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 25px;
            box-shadow: 0 3px 12px rgba(0,0,0,0.06);
        }

        .filter-form {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr auto;
            gap: 12px;
        }

        .input,
        .select {
            width: 100%;
            padding: 11px 13px;
            border: 1px solid #CBD5E1;
            border-radius: 7px;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            outline: none;
            background: white;
        }

        .input:focus,
        .select:focus {
            border-color: #C9A227;
        }

        .table-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 3px 12px rgba(0,0,0,0.06);
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 850px;
        }

        th {
            background: #0B1F3A;
            color: white;
            padding: 14px;
            text-align: left;
            font-size: 13px;
            font-weight: 600;
        }

        td {
            padding: 14px;
            border-bottom: 1px solid #E2E8F0;
            font-size: 13px;
            vertical-align: middle;
        }

        tr:hover td {
            background: #F8F9FA;
        }

        .post-image {
            width: 65px;
            height: 50px;
            object-fit: cover;
            border-radius: 7px;
            border: 1px solid #E2E8F0;
        }

        .no-image {
            width: 65px;
            height: 50px;
            border-radius: 7px;
            background: #E2E8F0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            color: #64748B;
        }

        .post-title {
            font-weight: 600;
            color: #0B1F3A;
        }

        .badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            text-transform: capitalize;
        }

        .badge-published {
            background: #DCFCE7;
            color: #166534;
        }

        .badge-draft {
            background: #FEF3C7;
            color: #92400E;
        }

        .actions {
            display: flex;
            gap: 7px;
        }

        .action-btn {
            padding: 7px 10px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 11px;
            font-weight: 600;
        }

        .edit-btn {
            background: #E2E8F0;
            color: #0B1F3A;
        }

        .delete-btn {
            background: #FEE2E2;
            color: #B91C1C;
        }

        .alert {
            padding: 14px 18px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .alert-success {
            background: #DCFCE7;
            color: #166534;
        }

        .alert-error {
            background: #FEE2E2;
            color: #991B1B;
        }

        .empty {
            text-align: center;
            padding: 50px 20px;
            color: #64748B;
        }

        .empty h3 {
            color: #0B1F3A;
            margin-bottom: 8px;
            font-family: 'Playfair Display', serif;
            font-size: 22px;
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

            .nav-link::first-letter {
                font-size: 18px;
            }

            .main {
                margin-left: 70px;
                padding: 20px;
            }

            .filter-form {
                grid-template-columns: 1fr;
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


<!-- Main Content -->
<div class="main">

    <div class="topbar">

        <div>
            <h1 class="page-title">Blog Posts</h1>

            <p class="subtitle">
                Manage articles and content for the Lex Counsel blog.
            </p>
        </div>

        <a href="<?= base_url('admin/posts/add') ?>" class="btn btn-gold">
            + Add Blog Post
        </a>

    </div>


    <!-- Success Message -->
    <?php if (session()->getFlashdata('success')): ?>

        <div class="alert alert-success">
            <?= esc(session()->getFlashdata('success')) ?>
        </div>

    <?php endif; ?>


    <!-- Error Message -->
    <?php if (session()->getFlashdata('error')): ?>

        <div class="alert alert-error">
            <?= esc(session()->getFlashdata('error')) ?>
        </div>

    <?php endif; ?>


    <!-- Filters -->
    <div class="filters">

        <form method="get"
              action="<?= base_url('admin/posts') ?>"
              class="filter-form">

            <input
                type="text"
                name="search"
                class="input"
                placeholder="Search posts..."
                value="<?= esc($search ?? '') ?>"
            >

            <select name="status" class="select">

                <option value="">
                    All Status
                </option>

                <option value="draft"
                    <?= (($status ?? '') === 'draft') ? 'selected' : '' ?>>
                    Draft
                </option>

                <option value="published"
                    <?= (($status ?? '') === 'published') ? 'selected' : '' ?>>
                    Published
                </option>

            </select>


            <select name="category" class="select">

                <option value="">
                    All Categories
                </option>

                <?php foreach (($categories ?? []) as $category): ?>

                    <option
                        value="<?= esc($category['id']) ?>"
                        <?= ((string)($categoryId ?? '') === (string)$category['id']) ? 'selected' : '' ?>
                    >
                        <?= esc($category['name']) ?>
                    </option>

                <?php endforeach; ?>

            </select>


            <button type="submit" class="btn btn-gold">
                Filter
            </button>

        </form>

    </div>


    <!-- Posts Table -->
    <div class="table-card">

        <?php if (!empty($posts)): ?>

            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Views</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>

                    </thead>

                    <tbody>

                        <?php foreach ($posts as $post): ?>

                            <tr>

                                <td>

                                    <?php if (!empty($post['featured_image'])): ?>

                                        <img
                                            src="<?= base_url('uploads/posts/' . $post['featured_image']) ?>"
                                            alt="<?= esc($post['title']) ?>"
                                            class="post-image"
                                        >

                                    <?php else: ?>

                                        <div class="no-image">
                                            No Image
                                        </div>

                                    <?php endif; ?>

                                </td>


                                <td>

                                    <div class="post-title">
                                        <?= esc($post['title']) ?>
                                    </div>

                                </td>


                                <td>
                                    <?= esc($post['category_name'] ?? 'Uncategorized') ?>
                                </td>


                                <td>

                                    <?php if (($post['status'] ?? '') === 'published'): ?>

                                        <span class="badge badge-published">
                                            Published
                                        </span>

                                    <?php else: ?>

                                        <span class="badge badge-draft">
                                            Draft
                                        </span>

                                    <?php endif; ?>

                                </td>


                                <td>
                                    <?= esc($post['views'] ?? 0) ?>
                                </td>


                                <td>
                                    <?= !empty($post['created_at'])
                                        ? date('d M Y', strtotime($post['created_at']))
                                        : '-' ?>
                                </td>


                                <td>

                                    <div class="actions">

                                        <a
                                            href="<?= base_url('admin/posts/edit/' . $post['id']) ?>"
                                            class="action-btn edit-btn"
                                        >
                                            Edit
                                        </a>

                                        <a
                                            href="<?= base_url('admin/posts/delete/' . $post['id']) ?>"
                                            class="action-btn delete-btn"
                                            onclick="return confirm('Are you sure you want to delete this blog post?');"
                                        >
                                            Delete
                                        </a>

                                    </div>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        <?php else: ?>

            <div class="empty">

                <h3>No Blog Posts Found</h3>

                <p>
                    You have not created any blog posts yet.
                </p>

            </div>

        <?php endif; ?>

    </div>


    <footer>
        © <?= date('Y') ?> Lex Counsel. All rights reserved.
    </footer>

</div>

</body>
</html>