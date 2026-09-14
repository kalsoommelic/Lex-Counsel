<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Practice Area - Lex Counsel</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

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
            padding: 30px 20px;
            color: white;
        }

        .brand {
            text-align: center;
            margin-bottom: 40px;
        }

        .brand h2 {
            font-family: 'Playfair Display', serif;
            color: #C9A227;
            font-size: 27px;
        }

        .brand p {
            font-size: 11px;
            color: #ddd;
            margin-top: 4px;
        }

        .nav-links {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .nav-links a {
            text-decoration: none;
            color: #fff;
            padding: 13px 15px;
            border-radius: 7px;
            font-size: 14px;
            transition: 0.3s;
        }

        .nav-links a:hover,
        .nav-links a.active {
            background: #C9A227;
            color: #0B1F3A;
        }

        .nav-links .logout {
            margin-top: 20px;
            background: #b91c1c;
        }

        .nav-links .logout:hover {
            background: #dc2626;
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
            margin-bottom: 30px;
            gap: 20px;
        }

        .topbar h1 {
            font-family: 'Playfair Display', serif;
            font-size: 30px;
            color: #0B1F3A;
        }

        .topbar p {
            color: #64748B;
            font-size: 13px;
            margin-top: 5px;
        }

        .back-btn {
            display: inline-block;
            text-decoration: none;
            background: #0B1F3A;
            color: white;
            padding: 11px 18px;
            border-radius: 7px;
            font-size: 13px;
            transition: 0.3s;
        }

        .back-btn:hover {
            background: #C9A227;
            color: #0B1F3A;
        }

        .form-card {
            background: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 18px rgba(15, 23, 42, 0.07);
            max-width: 1000px;
        }

        .form-title {
            font-family: 'Playfair Display', serif;
            font-size: 22px;
            color: #0B1F3A;
            margin-bottom: 25px;
        }

        .alert {
            padding: 12px 15px;
            border-radius: 7px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .full-width {
            grid-column: 1 / -1;
        }

        label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #334155;
            margin-bottom: 8px;
        }

        label span {
            color: #b91c1c;
        }

        input,
        textarea,
        select {
            width: 100%;
            border: 1px solid #CBD5E1;
            border-radius: 7px;
            padding: 12px 13px;
            font-family: 'Poppins', sans-serif;
            font-size: 13px;
            color: #1E293B;
            background: white;
            outline: none;
            transition: 0.3s;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: #C9A227;
            box-shadow: 0 0 0 3px rgba(201, 162, 39, 0.12);
        }

        textarea {
            resize: vertical;
            min-height: 130px;
        }

        .help-text {
            font-size: 11px;
            color: #64748B;
            margin-top: 6px;
        }

        .file-input {
            padding: 9px;
        }

        .buttons {
            display: flex;
            gap: 12px;
            margin-top: 10px;
        }

        .btn {
            border: none;
            padding: 12px 22px;
            border-radius: 7px;
            font-family: 'Poppins', sans-serif;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary {
            background: #C9A227;
            color: #0B1F3A;
        }

        .btn-primary:hover {
            background: #b08d1f;
        }

        .btn-secondary {
            background: #E2E8F0;
            color: #334155;
        }

        .btn-secondary:hover {
            background: #CBD5E1;
        }

        footer {
            text-align: center;
            margin-top: 35px;
            padding: 20px;
            color: #64748B;
            font-size: 12px;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
                padding: 25px 10px;
            }

            .brand h2 {
                font-size: 18px;
            }

            .brand p {
                display: none;
            }

            .nav-links a {
                font-size: 0;
                text-align: center;
            }

            .nav-links a::first-letter {
                font-size: 18px;
            }

            .main {
                margin-left: 70px;
                padding: 20px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .full-width {
                grid-column: auto;
            }

            .topbar {
                flex-direction: column;
                align-items: flex-start;
            }

            .form-card {
                padding: 20px;
            }
        }

        @media (max-width: 480px) {
            .main {
                padding: 15px;
            }

            .topbar h1 {
                font-size: 25px;
            }

            .buttons {
                flex-direction: column;
            }

            .btn {
                text-align: center;
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <aside class="sidebar">

        <div class="brand">
            <h2>Lex Counsel</h2>
            <p>Admin Panel</p>
        </div>

        <nav class="nav-links">
            <a href="<?= base_url('admin') ?>">Dashboard</a>
            <a href="<?= base_url('admin/attorneys') ?>">Attorneys</a>
            <a href="<?= base_url('admin/practice-areas') ?>" class="active">Practice Areas</a>
            <a href="<?= base_url('/') ?>">View Website</a>
            <a href="<?= base_url('admin/logout') ?>" class="logout">Logout</a>
        </nav>

    </aside>


    <main class="main">

        <div class="topbar">
            <div>
                <h1>Add Practice Area</h1>
                <p>Create a new legal practice area for your Lex Counsel website.</p>
            </div>

            <a href="<?= base_url('admin/practice-areas') ?>" class="back-btn">
                ← Back to Practice Areas
            </a>
        </div>


        <div class="form-card">

            <h2 class="form-title">Practice Area Information</h2>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-error">
                    <?= esc(session()->getFlashdata('error')) ?>
                </div>
            <?php endif; ?>


            <form
                action="<?= base_url('admin/practice-areas/add') ?>"
                method="post"
                enctype="multipart/form-data"
            >

                <?= csrf_field() ?>

                <div class="form-grid">

                    <div class="form-group">
                        <label>
                            Practice Area Name <span>*</span>
                        </label>

                        <input
                            type="text"
                            name="name"
                            value="<?= esc(old('name')) ?>"
                            placeholder="e.g. Corporate Law"
                            required
                        >
                    </div>


                    <div class="form-group">
                        <label>
                            Icon
                        </label>

                        <input
                            type="text"
                            name="icon"
                            value="<?= esc(old('icon')) ?>"
                            placeholder="e.g. fa-solid fa-building"
                        >

                        <div class="help-text">
                            You can enter a Font Awesome icon class.
                        </div>
                    </div>


                    <div class="form-group full-width">
                        <label>
                            Short Description
                        </label>

                        <textarea
                            name="short_description"
                            placeholder="Write a short description of this practice area..."
                        ><?= esc(old('short_description')) ?></textarea>
                    </div>


                    <div class="form-group full-width">
                        <label>
                            Full Description
                        </label>

                        <textarea
                            name="description"
                            placeholder="Write the complete description of this practice area..."
                            style="min-height: 200px;"
                        ><?= esc(old('description')) ?></textarea>
                    </div>


                    <div class="form-group">
                        <label>
                            Practice Area Image
                        </label>

                        <input
                            type="file"
                            name="image"
                            class="file-input"
                            accept=".jpg,.jpeg,.png,.webp"
                        >

                        <div class="help-text">
                            JPG, PNG or WEBP. Maximum size: 2MB.
                        </div>
                    </div>


                    <div class="form-group">
                        <label>
                            Status
                        </label>

                        <select name="status">
                            <option value="1" <?= old('status', '1') == '1' ? 'selected' : '' ?>>
                                Active
                            </option>

                            <option value="0" <?= old('status') === '0' ? 'selected' : '' ?>>
                                Inactive
                            </option>
                        </select>
                    </div>

                </div>


                <div class="buttons">

                    <button type="submit" class="btn btn-primary">
                        Add Practice Area
                    </button>

                    <a
                        href="<?= base_url('admin/practice-areas') ?>"
                        class="btn btn-secondary"
                    >
                        Cancel
                    </a>

                </div>

            </form>

        </div>


        <footer>
            © <?= date('Y') ?> Lex Counsel. All rights reserved.
        </footer>

    </main>

</body>
</html>
