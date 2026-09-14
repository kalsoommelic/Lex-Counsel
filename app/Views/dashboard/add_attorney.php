<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Attorney | Lex Counsel</title>

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

        /* Sidebar */
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

        /* Main */
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
            background: #C9A227;
            color: #0B1F3A;
            text-decoration: none;
            padding: 11px 18px;
            border-radius: 7px;
            font-size: 14px;
            font-weight: 600;
        }

        .back-btn:hover {
            opacity: 0.9;
        }

        /* Card */
        .card {
            background: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 3px 15px rgba(15, 23, 42, 0.07);
            max-width: 1000px;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            color: #0B1F3A;
            font-size: 21px;
            margin-bottom: 20px;
            border-bottom: 1px solid #E2E8F0;
            padding-bottom: 12px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        label {
            font-size: 13px;
            font-weight: 600;
            color: #334155;
            margin-bottom: 7px;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 12px 13px;
            border: 1px solid #CBD5E1;
            border-radius: 7px;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            color: #1E293B;
            background: white;
            outline: none;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: #C9A227;
            box-shadow: 0 0 0 3px rgba(201, 162, 39, 0.12);
        }

        textarea {
            min-height: 130px;
            resize: vertical;
        }

        .hint {
            margin-top: 5px;
            font-size: 11px;
            color: #64748B;
        }

        .actions {
            margin-top: 28px;
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            border-top: 1px solid #E2E8F0;
            padding-top: 20px;
        }

        .btn {
            border: none;
            border-radius: 7px;
            padding: 12px 22px;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-cancel {
            background: #E2E8F0;
            color: #334155;
        }

        .btn-save {
            background: #0B1F3A;
            color: white;
        }

        .btn-save:hover {
            background: #132D50;
        }

        .alert {
            max-width: 1000px;
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

        /* Footer */
        .footer {
            margin-top: 35px;
            text-align: center;
            color: #64748B;
            font-size: 12px;
            padding: 20px;
        }

        /* Responsive */
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

            .nav-link::first-letter {
                font-size: 18px;
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

            .topbar h1 {
                font-size: 26px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: auto;
            }

            .card {
                padding: 20px;
            }

            .actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>

<body>

<!-- Sidebar -->
<aside class="sidebar">

    <div class="brand">
        Lex Counsel
    </div>

    <a href="<?= base_url('admin') ?>" class="nav-link">
        Dashboard
    </a>

    <a href="<?= base_url('admin/attorneys') ?>" class="nav-link active">
        Attorneys
    </a>

    <a href="<?= base_url('/') ?>" class="nav-link">
        View Website
    </a>

    <a href="<?= base_url('admin/logout') ?>" class="nav-link logout">
        Logout
    </a>

</aside>


<!-- Main Content -->
<main class="main">

    <div class="topbar">

        <div>
            <h1>Add Attorney</h1>
            <p>Add a new attorney to your Lex Counsel team.</p>
        </div>

        <a href="<?= base_url('admin/attorneys') ?>" class="back-btn">
            ← Back to Attorneys
        </a>

    </div>


    <?php if (session()->getFlashdata('error')): ?>

        <div class="alert alert-error">
            <?= esc(session()->getFlashdata('error')) ?>
        </div>

    <?php endif; ?>


    <div class="card">

        <div class="section-title">
            Attorney Information
        </div>

        <form
            action="<?= base_url('admin/attorneys/add') ?>"
            method="post"
            enctype="multipart/form-data"
        >

            <?= csrf_field() ?>


            <div class="form-grid">

                <!-- Name -->
                <div class="form-group">
                    <label for="name">
                        Full Name *
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="<?= esc(old('name')) ?>"
                        placeholder="e.g. Sarah Ahmed"
                        required
                    >
                </div>


                <!-- Designation -->
                <div class="form-group">
                    <label for="designation">
                        Designation
                    </label>

                    <input
                        type="text"
                        id="designation"
                        name="designation"
                        value="<?= esc(old('designation')) ?>"
                        placeholder="e.g. Senior Partner"
                    >
                </div>


                <!-- Specialization -->
                <div class="form-group">
                    <label for="specialization">
                        Specialization
                    </label>

                    <input
                        type="text"
                        id="specialization"
                        name="specialization"
                        value="<?= esc(old('specialization')) ?>"
                        placeholder="e.g. Corporate Law"
                    >
                </div>


                <!-- Email -->
                <div class="form-group">
                    <label for="email">
                        Email Address
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="<?= esc(old('email')) ?>"
                        placeholder="attorney@example.com"
                    >
                </div>


                <!-- Phone -->
                <div class="form-group">
                    <label for="phone">
                        Phone Number
                    </label>

                    <input
                        type="text"
                        id="phone"
                        name="phone"
                        value="<?= esc(old('phone')) ?>"
                        placeholder="+92 300 1234567"
                    >
                </div>


                <!-- LinkedIn -->
                <div class="form-group">
                    <label for="linkedin">
                        LinkedIn Profile
                    </label>

                    <input
                        type="url"
                        id="linkedin"
                        name="linkedin"
                        value="<?= esc(old('linkedin')) ?>"
                        placeholder="https://linkedin.com/in/username"
                    >
                </div>


                <!-- Status -->
                <div class="form-group">
                    <label for="status">
                        Status
                    </label>

                    <select id="status" name="status">

                        <option
                            value="1"
                            <?= old('status', '1') == '1' ? 'selected' : '' ?>
                        >
                            Active
                        </option>

                        <option
                            value="0"
                            <?= old('status') === '0' ? 'selected' : '' ?>
                        >
                            Inactive
                        </option>

                    </select>
                </div>


                <!-- Image -->
                <div class="form-group">
                    <label for="image">
                        Attorney Photo
                    </label>

                    <input
                        type="file"
                        id="image"
                        name="image"
                        accept=".jpg,.jpeg,.png,.webp"
                    >

                    <div class="hint">
                        JPG, PNG or WEBP — maximum 2MB.
                    </div>
                </div>


                <!-- Bio -->
                <div class="form-group full">
                    <label for="bio">
                        Biography
                    </label>

                    <textarea
                        id="bio"
                        name="bio"
                        placeholder="Write a short professional biography..."
                    ><?= esc(old('bio')) ?></textarea>
                </div>

            </div>


            <div class="actions">

                <a
                    href="<?= base_url('admin/attorneys') ?>"
                    class="btn btn-cancel"
                >
                    Cancel
                </a>

                <button
                    type="submit"
                    class="btn btn-save"
                >
                    Save Attorney
                </button>

            </div>

        </form>

    </div>


    <div class="footer">
        © <?= date('Y') ?> Lex Counsel. All rights reserved.
    </div>

</main>

</body>
</html>