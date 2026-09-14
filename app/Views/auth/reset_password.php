<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Reset Password | Lex Counsel</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@400;500;600&display=swap"
        rel="stylesheet"
    >

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background: #0B1F3A;
            font-family: 'Poppins', sans-serif;
        }

        .reset-container {
            width: 100%;
            max-width: 460px;
        }

        .reset-card {
            background: #ffffff;
            border-radius: 14px;
            padding: 40px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.25);
        }

        .logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo h1 {
            font-family: 'Playfair Display', serif;
            font-size: 32px;
            color: #0B1F3A;
        }

        .logo span {
            color: #C9A227;
        }

        .logo p {
            margin-top: 6px;
            color: #64748B;
            font-size: 13px;
        }

        .title {
            text-align: center;
            margin-bottom: 25px;
        }

        .title h2 {
            color: #1E293B;
            font-size: 24px;
            margin-bottom: 8px;
        }

        .title p {
            color: #64748B;
            font-size: 14px;
            line-height: 1.6;
        }

        .alert {
            padding: 12px 14px;
            border-radius: 8px;
            margin-bottom: 18px;
            font-size: 13px;
        }

        .alert-error {
            background: #FEE2E2;
            color: #991B1B;
        }

        .alert-success {
            background: #DCFCE7;
            color: #166534;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 600;
            color: #1E293B;
        }

        .password-wrapper {
            position: relative;
        }

        .password-wrapper input {
            width: 100%;
            height: 48px;
            padding: 0 48px 0 14px;
            border: 1px solid #CBD5E1;
            border-radius: 8px;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            color: #1E293B;
            outline: none;
        }

        .password-wrapper input:focus {
            border-color: #C9A227;
            box-shadow: 0 0 0 3px rgba(201, 162, 39, 0.12);
        }

        .toggle-password {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            background: transparent;
            cursor: pointer;
            font-size: 16px;
        }

        .btn {
            width: 100%;
            height: 48px;
            border: none;
            border-radius: 8px;
            background: #C9A227;
            color: #ffffff;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn:hover {
            background: #AE8B1D;
        }

        .back-login {
            text-align: center;
            margin-top: 22px;
        }

        .back-login a {
            color: #0B1F3A;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
        }

        .back-login a:hover {
            color: #C9A227;
        }

        .security-note {
            margin-top: 25px;
            padding-top: 18px;
            border-top: 1px solid #E2E8F0;
            text-align: center;
            color: #64748B;
            font-size: 12px;
            line-height: 1.6;
        }

        @media (max-width: 480px) {
            .reset-card {
                padding: 28px 22px;
            }

            .logo h1 {
                font-size: 28px;
            }

            .title h2 {
                font-size: 21px;
            }
        }
    </style>
</head>

<body>

<div class="reset-container">

    <div class="reset-card">

        <div class="logo">
            <h1>Lex <span>Counsel</span></h1>
            <p>Justice. Integrity. Excellence.</p>
        </div>

        <div class="title">
            <h2>Reset Password</h2>
            <p>
                Create a new secure password for your administrator account.
            </p>
        </div>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-error">
                <?= esc(session()->getFlashdata('error')) ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <?= esc(session()->getFlashdata('success')) ?>
            </div>
        <?php endif; ?>

        <form
            action="<?= base_url('admin/reset-password/' . esc($token)) ?>"
            method="post"
        >

            <?= csrf_field() ?>

            <div class="form-group">

                <label for="new_password">
                    New Password
                </label>

                <div class="password-wrapper">

                    <input
                        type="password"
                        id="new_password"
                        name="new_password"
                        placeholder="Enter new password"
                        required
                        minlength="8"
                        autocomplete="new-password"
                    >

                    <button
                        type="button"
                        class="toggle-password"
                        onclick="togglePassword('new_password', this)"
                    >
                        👁
                    </button>

                </div>

            </div>

            <div class="form-group">

                <label for="confirm_password">
                    Confirm New Password
                </label>

                <div class="password-wrapper">

                    <input
                        type="password"
                        id="confirm_password"
                        name="confirm_password"
                        placeholder="Confirm new password"
                        required
                        minlength="8"
                        autocomplete="new-password"
                    >

                    <button
                        type="button"
                        class="toggle-password"
                        onclick="togglePassword('confirm_password', this)"
                    >
                        👁
                    </button>

                </div>

            </div>

            <button type="submit" class="btn">
                Reset Password
            </button>

        </form>

        <div class="back-login">
            <a href="<?= base_url('admin/login') ?>">
                ← Back to Login
            </a>
        </div>

        <div class="security-note">
            🔒 Your reset link is temporary and will expire automatically.
        </div>

    </div>

</div>

<script>
    function togglePassword(inputId, button) {

        const input = document.getElementById(inputId);

        if (input.type === 'password') {
            input.type = 'text';
            button.textContent = '🙈';
        } else {
            input.type = 'password';
            button.textContent = '👁';
        }
    }
</script>

</body>
</html>