<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= esc($title ?? 'Change Password') ?> | Lex Counsel</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=Poppins:wght@300;400;500;600&display=swap"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #f8f9fa;
            color: #1e293b;
            min-height: 100vh;
        }

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            height: 100vh;
            background: #0b1f3a;
            color: #ffffff;
            padding: 30px 20px;
        }

        .brand {
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            font-weight: 700;
            text-align: center;
            margin-bottom: 45px;
        }

        .brand span {
            color: #c9a227;
        }

        .menu-title {
            font-size: 11px;
            color: #94a3b8;
            letter-spacing: 1.5px;
            margin-bottom: 12px;
            padding-left: 12px;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 13px;
            text-decoration: none;
            color: #dbe4f0;
            padding: 13px 14px;
            border-radius: 8px;
            margin-bottom: 8px;
            font-size: 14px;
            transition: 0.3s;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: rgba(201, 162, 39, 0.15);
            color: #c9a227;
        }

        .sidebar a i {
            width: 20px;
            text-align: center;
        }

        .logout-link {
            margin-top: 20px;
            color: #ff6b6b !important;
        }

        .logout-link:hover {
            background: rgba(255, 107, 107, 0.12) !important;
            color: #ff6b6b !important;
        }

        .main {
            margin-left: 250px;
            min-height: 100vh;
            padding: 35px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 35px;
        }

        .topbar h1 {
            font-family: 'Playfair Display', serif;
            font-size: 30px;
            color: #0b1f3a;
            margin-bottom: 5px;
        }

        .topbar p {
            color: #64748b;
            font-size: 14px;
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            background: #0b1f3a;
            color: #ffffff;
            padding: 11px 18px;
            border-radius: 7px;
            font-size: 13px;
            transition: 0.3s;
        }

        .back-btn:hover {
            background: #c9a227;
            color: #0b1f3a;
        }

        .password-card {
            max-width: 650px;
            background: #ffffff;
            border-radius: 12px;
            padding: 35px;
            box-shadow: 0 5px 20px rgba(11, 31, 58, 0.08);
            border: 1px solid #e5e7eb;
        }

        .card-header {
            margin-bottom: 28px;
        }

        .card-header h2 {
            font-family: 'Playfair Display', serif;
            color: #0b1f3a;
            font-size: 24px;
            margin-bottom: 8px;
        }

        .card-header p {
            color: #64748b;
            font-size: 13px;
            line-height: 1.6;
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 500;
            color: #334155;
            margin-bottom: 8px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
        }

        .input-wrapper input {
            width: 100%;
            padding: 13px 45px 13px 42px;
            border: 1px solid #d1d5db;
            border-radius: 7px;
            font-family: 'Poppins', sans-serif;
            font-size: 13px;
            outline: none;
            transition: 0.3s;
        }

        .input-wrapper input:focus {
            border-color: #c9a227;
            box-shadow: 0 0 0 3px rgba(201, 162, 39, 0.12);
        }

        .toggle-password {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            background: transparent;
            color: #94a3b8;
            cursor: pointer;
            padding: 5px;
        }

        .toggle-password:hover {
            color: #0b1f3a;
        }

        .password-note {
            font-size: 11px;
            color: #64748b;
            margin-top: 6px;
        }

        .submit-btn {
            width: 100%;
            border: none;
            background: #c9a227;
            color: #0b1f3a;
            padding: 13px;
            border-radius: 7px;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
        }

        .submit-btn:hover {
            background: #0b1f3a;
            color: #ffffff;
        }

        .alert {
            max-width: 650px;
            padding: 13px 16px;
            border-radius: 7px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .alert-success {
            background: #ecfdf5;
            color: #047857;
            border: 1px solid #a7f3d0;
        }

        .alert-error {
            background: #fef2f2;
            color: #b91c1c;
            border: 1px solid #fecaca;
        }

        footer {
            margin-left: 250px;
            padding: 20px 35px;
            color: #64748b;
            font-size: 12px;
            text-align: center;
        }

        @media (max-width: 768px) {

            .sidebar {
                width: 70px;
                padding: 25px 10px;
            }

            .brand {
                font-size: 20px;
                margin-bottom: 35px;
            }

            .brand span,
            .menu-title,
            .sidebar a span {
                display: none;
            }

            .sidebar a {
                justify-content: center;
                padding: 13px 8px;
            }

            .main {
                margin-left: 70px;
                padding: 25px 20px;
            }

            footer {
                margin-left: 70px;
                padding: 20px;
            }

            .topbar {
                align-items: flex-start;
                gap: 15px;
                flex-direction: column;
            }

            .password-card {
                padding: 25px 20px;
            }
        }
    </style>
</head>

<body>

<aside class="sidebar">

    <div class="brand">
        Lex <span>Counsel</span>
    </div>

    <div class="menu-title">
        ADMIN PANEL
    </div>

    <a href="<?= base_url('admin') ?>">
        <i class="fa-solid fa-gauge-high"></i>
        <span>Dashboard</span>
    </a>

    <a href="<?= base_url('admin/change-password') ?>" class="active">
        <i class="fa-solid fa-lock"></i>
        <span>Change Password</span>
    </a>

    <a href="<?= base_url('/') ?>">
        <i class="fa-solid fa-globe"></i>
        <span>View Website</span>
    </a>

    <a
        href="<?= base_url('admin/logout') ?>"
        class="logout-link"
        onclick="return confirm('Are you sure you want to logout?');"
    >
        <i class="fa-solid fa-right-from-bracket"></i>
        <span>Logout</span>
    </a>

</aside>


<main class="main">

    <div class="topbar">

        <div>
            <h1>Change Password</h1>
            <p>Update your Lex Counsel admin account password securely.</p>
        </div>

        <a href="<?= base_url('admin') ?>" class="back-btn">
            <i class="fa-solid fa-arrow-left"></i>
            Back to Dashboard
        </a>

    </div>


    <?php if (session()->getFlashdata('success')): ?>

        <div class="alert alert-success">
            <i class="fa-solid fa-circle-check"></i>
            <?= esc(session()->getFlashdata('success')) ?>
        </div>

    <?php endif; ?>


    <?php if (session()->getFlashdata('error')): ?>

        <div class="alert alert-error">
            <i class="fa-solid fa-circle-exclamation"></i>
            <?= esc(session()->getFlashdata('error')) ?>
        </div>

    <?php endif; ?>


    <div class="password-card">

        <div class="card-header">

            <h2>Update Password</h2>

            <p>
                Enter your current password and choose a new secure password.
                Your new password must contain at least 8 characters.
            </p>

        </div>


        <form
            action="<?= base_url('admin/change-password') ?>"
            method="post"
        >

            <?= csrf_field() ?>


            <div class="form-group">

                <label for="current_password">
                    Current Password
                </label>

                <div class="input-wrapper">

                    <i class="fa-solid fa-lock"></i>

                    <input
                        type="password"
                        id="current_password"
                        name="current_password"
                        placeholder="Enter current password"
                        required
                    >

                    <button
                        type="button"
                        class="toggle-password"
                        onclick="togglePassword('current_password', this)"
                    >
                        <i class="fa-solid fa-eye"></i>
                    </button>

                </div>

            </div>


            <div class="form-group">

                <label for="new_password">
                    New Password
                </label>

                <div class="input-wrapper">

                    <i class="fa-solid fa-key"></i>

                    <input
                        type="password"
                        id="new_password"
                        name="new_password"
                        placeholder="Enter new password"
                        minlength="8"
                        required
                    >

                    <button
                        type="button"
                        class="toggle-password"
                        onclick="togglePassword('new_password', this)"
                    >
                        <i class="fa-solid fa-eye"></i>
                    </button>

                </div>

                <div class="password-note">
                    Minimum 8 characters.
                </div>

            </div>


            <div class="form-group">

                <label for="confirm_password">
                    Confirm New Password
                </label>

                <div class="input-wrapper">

                    <i class="fa-solid fa-shield-halved"></i>

                    <input
                        type="password"
                        id="confirm_password"
                        name="confirm_password"
                        placeholder="Confirm new password"
                        minlength="8"
                        required
                    >

                    <button
                        type="button"
                        class="toggle-password"
                        onclick="togglePassword('confirm_password', this)"
                    >
                        <i class="fa-solid fa-eye"></i>
                    </button>

                </div>

            </div>


            <button type="submit" class="submit-btn">
                <i class="fa-solid fa-key"></i>
                Change Password
            </button>

        </form>

    </div>

</main>


<footer>
    © <?= date('Y') ?> Lex Counsel. All rights reserved.
</footer>


<script>

function togglePassword(inputId, button) {

    const input = document.getElementById(inputId);
    const icon = button.querySelector('i');

    if (input.type === 'password') {

        input.type = 'text';

        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');

    } else {

        input.type = 'password';

        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');

    }
}

</script>

</body>
</html>