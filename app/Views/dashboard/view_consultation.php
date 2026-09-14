<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>View Consultation | Lex Counsel</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=Poppins:wght@400;500;600&display=swap"
        rel="stylesheet"
    >

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: #F8F9FA;
            color: #1E293B;
        }

        /* SIDEBAR */

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            height: 100vh;
            background: #0B1F3A;
            color: white;
            padding: 30px 20px;
        }

        .brand {
            text-align: center;
            margin-bottom: 45px;
        }

        .brand h1 {
            margin: 0;
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            color: #C9A227;
        }

        .brand p {
            margin: 5px 0 0;
            font-size: 11px;
            letter-spacing: 1px;
            color: #FFFFFF;
        }

        .menu a {
            display: block;
            padding: 13px 15px;
            margin-bottom: 8px;
            color: white;
            text-decoration: none;
            border-radius: 7px;
            font-size: 14px;
            transition: 0.2s;
        }

        .menu a:hover,
        .menu a.active {
            background: rgba(201, 162, 39, 0.15);
            color: #C9A227;
        }

        .menu .logout {
            margin-top: 25px;
            background: #B91C1C;
            text-align: center;
        }

        .menu .logout:hover {
            background: #991B1B;
            color: white;
        }

        /* MAIN */

        .main {
            margin-left: 250px;
            min-height: 100vh;
            padding: 30px;
        }

        /* TOPBAR */

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 30px;
        }

        .topbar h2 {
            margin: 0;
            font-family: 'Playfair Display', serif;
            font-size: 30px;
            color: #0B1F3A;
        }

        .topbar p {
            margin: 5px 0 0;
            font-size: 14px;
            color: #64748B;
        }

        .view-site {
            display: inline-block;
            background: #C9A227;
            color: #0B1F3A;
            text-decoration: none;
            padding: 11px 18px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 13px;
        }

        .view-site:hover {
            background: #B08D1F;
        }

        /* ALERTS */

        .alert {
            padding: 13px 16px;
            border-radius: 7px;
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

        /* PANEL */

        .panel {
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(11, 31, 58, 0.06);
            margin-bottom: 25px;
        }

        .panel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
        }

        .panel-header h3 {
            margin: 0;
            font-family: 'Playfair Display', serif;
            font-size: 23px;
            color: #0B1F3A;
        }

        /* DETAILS */

        .details-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .detail-box {
            background: #F8F9FA;
            border: 1px solid #E2E8F0;
            border-radius: 8px;
            padding: 17px;
        }

        .detail-box.full {
            grid-column: 1 / -1;
        }

        .detail-label {
            display: block;
            font-size: 11px;
            color: #64748B;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 6px;
            font-weight: 600;
        }

        .detail-value {
            font-size: 14px;
            color: #0B1F3A;
            font-weight: 500;
            word-break: break-word;
        }

        .message-box {
            line-height: 1.8;
            white-space: pre-line;
        }

        /* STATUS */

        .status-pending {
            color: #92400E;
            background: #FEF3C7;
            padding: 6px 12px;
            border-radius: 20px;
            display: inline-block;
            font-size: 12px;
            font-weight: 600;
        }

        .status-approved {
            color: #166534;
            background: #DCFCE7;
            padding: 6px 12px;
            border-radius: 20px;
            display: inline-block;
            font-size: 12px;
            font-weight: 600;
        }

        .status-rejected {
            color: #991B1B;
            background: #FEE2E2;
            padding: 6px 12px;
            border-radius: 20px;
            display: inline-block;
            font-size: 12px;
            font-weight: 600;
        }

        .status-completed {
            color: #1E40AF;
            background: #DBEAFE;
            padding: 6px 12px;
            border-radius: 20px;
            display: inline-block;
            font-size: 12px;
            font-weight: 600;
        }

        /* STATUS FORM */

        .status-form {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .status-form select {
            padding: 10px 13px;
            border: 1px solid #CBD5E1;
            border-radius: 6px;
            font-family: 'Poppins', sans-serif;
            font-size: 13px;
            background: white;
            outline: none;
        }

        .status-form select:focus {
            border-color: #C9A227;
        }

        .update-button {
            border: none;
            background: #C9A227;
            color: #0B1F3A;
            padding: 10px 16px;
            border-radius: 6px;
            font-family: 'Poppins', sans-serif;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
        }

        .update-button:hover {
            background: #B08D1F;
        }

        /* ACTIONS */

        .page-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-top: 25px;
        }

        .back-button {
            display: inline-block;
            background: #0B1F3A;
            color: white;
            text-decoration: none;
            padding: 11px 18px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
        }

        .back-button:hover {
            background: #132C4D;
        }

        .delete-button {
            display: inline-block;
            background: #B91C1C;
            color: white;
            text-decoration: none;
            padding: 11px 18px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
        }

        .delete-button:hover {
            background: #991B1B;
        }

        /* FOOTER */

        footer {
            text-align: center;
            padding: 25px 10px 5px;
            color: #64748B;
            font-size: 12px;
        }

        /* RESPONSIVE */

        @media (max-width: 900px) {

            .sidebar {
                width: 70px;
                padding: 25px 10px;
            }

            .brand h1 {
                font-size: 0;
            }

            .brand h1::after {
                content: "LC";
                font-size: 22px;
            }

            .brand p,
            .menu a span {
                display: none;
            }

            .menu a {
                text-align: center;
                padding: 13px 5px;
            }

            .main {
                margin-left: 70px;
                padding: 20px;
            }

        }

        @media (max-width: 650px) {

            .topbar {
                flex-direction: column;
                align-items: flex-start;
            }

            .details-grid {
                grid-template-columns: 1fr;
            }

            .detail-box.full {
                grid-column: auto;
            }

            .panel {
                padding: 18px;
            }

            .page-actions {
                flex-direction: column;
                align-items: stretch;
            }

            .back-button,
            .delete-button {
                text-align: center;
            }

        }

    </style>

</head>

<body>

<aside class="sidebar">

    <div class="brand">
        <h1>Lex Counsel</h1>
        <p>ADMIN PANEL</p>
    </div>

    <nav class="menu">

        <a href="<?= base_url('admin') ?>">
            🏠 <span>Dashboard</span>
        </a>

        <a href="<?= base_url('admin/attorneys') ?>">
            ⚖️ <span>Attorneys</span>
        </a>

        <a href="<?= base_url('admin/consultations') ?>" class="active">
            📅 <span>Consultations</span>
        </a>

        <a href="<?= base_url() ?>" target="_blank">
            🌐 <span>View Website</span>
        </a>

        <a href="<?= base_url('admin/logout') ?>" class="logout">
            🚪 <span>Logout</span>
        </a>

    </nav>

</aside>


<main class="main">

    <div class="topbar">

        <div>
            <h2>Consultation Details</h2>
            <p>View and manage this consultation request.</p>
        </div>

        <a
            href="<?= base_url() ?>"
            target="_blank"
            class="view-site"
        >
            View Website
        </a>

    </div>


    <?php if (session()->getFlashdata('success')): ?>

        <div class="alert alert-success">
            <?= esc(session()->getFlashdata('success')) ?>
        </div>

    <?php endif; ?>


    <?php if (session()->getFlashdata('error')): ?>

        <div class="alert alert-error">
            <?= esc(session()->getFlashdata('error')) ?>
        </div>

    <?php endif; ?>


    <section class="panel">

        <div class="panel-header">

            <h3>Client Information</h3>

        </div>


        <div class="details-grid">

            <div class="detail-box">

                <span class="detail-label">
                    Client Name
                </span>

                <div class="detail-value">
                    <?= esc($consultation['name']) ?>
                </div>

            </div>


            <div class="detail-box">

                <span class="detail-label">
                    Email Address
                </span>

                <div class="detail-value">
                    <?= esc($consultation['email']) ?>
                </div>

            </div>


            <div class="detail-box">

                <span class="detail-label">
                    Phone Number
                </span>

                <div class="detail-value">

                    <?= !empty($consultation['phone'])
                        ? esc($consultation['phone'])
                        : '—'
                    ?>

                </div>

            </div>


            <div class="detail-box">

                <span class="detail-label">
                    Case Type
                </span>

                <div class="detail-value">

                    <?= !empty($consultation['case_type'])
                        ? esc($consultation['case_type'])
                        : '—'
                    ?>

                </div>

            </div>


            <div class="detail-box">

                <span class="detail-label">
                    Preferred Date
                </span>

                <div class="detail-value">

                    <?php if (!empty($consultation['preferred_date'])): ?>

                        <?= date(
                            'd M Y',
                            strtotime($consultation['preferred_date'])
                        ) ?>

                    <?php else: ?>

                        —

                    <?php endif; ?>

                </div>

            </div>


            <div class="detail-box">

                <span class="detail-label">
                    Submitted On
                </span>

                <div class="detail-value">

                    <?php if (!empty($consultation['created_at'])): ?>

                        <?= date(
                            'd M Y, h:i A',
                            strtotime($consultation['created_at'])
                        ) ?>

                    <?php else: ?>

                        —

                    <?php endif; ?>

                </div>

            </div>


            <div class="detail-box">

                <span class="detail-label">
                    Current Status
                </span>

                <div class="detail-value">

                    <?php

                    $statusClass = match ($consultation['status']) {

                        'approved' => 'status-approved',

                        'rejected' => 'status-rejected',

                        'completed' => 'status-completed',

                        default => 'status-pending',

                    };

                    ?>

                    <span class="<?= $statusClass ?>">
                        <?= esc(ucfirst($consultation['status'])) ?>
                    </span>

                </div>

            </div>


            <div class="detail-box">

                <span class="detail-label">
                    Request ID
                </span>

                <div class="detail-value">
                    #<?= esc($consultation['id']) ?>
                </div>

            </div>


            <div class="detail-box full">

                <span class="detail-label">
                    Client Message
                </span>

                <div class="detail-value message-box">

                    <?= !empty($consultation['message'])
                        ? esc($consultation['message'])
                        : 'No message provided.'
                    ?>

                </div>

            </div>

        </div>

    </section>


    <section class="panel">

        <div class="panel-header">

            <h3>Update Consultation Status</h3>

        </div>


        <form
            method="post"
            action="<?= base_url('admin/consultation/status/' . $consultation['id']) ?>"
            class="status-form"
        >

            <select name="status">

                <option
                    value="pending"
                    <?= $consultation['status'] === 'pending' ? 'selected' : '' ?>
                >
                    Pending
                </option>

                <option
                    value="approved"
                    <?= $consultation['status'] === 'approved' ? 'selected' : '' ?>
                >
                    Approved
                </option>

                <option
                    value="rejected"
                    <?= $consultation['status'] === 'rejected' ? 'selected' : '' ?>
                >
                    Rejected
                </option>

                <option
                    value="completed"
                    <?= $consultation['status'] === 'completed' ? 'selected' : '' ?>
                >
                    Completed
                </option>

            </select>


            <button
                type="submit"
                class="update-button"
            >
                Update Status
            </button>

        </form>

    </section>


    <div class="page-actions">

        <a
            href="<?= base_url('admin/consultations') ?>"
            class="back-button"
        >
            ← Back to Consultations
        </a>


        <a
            href="<?= base_url('admin/consultation/delete/' . $consultation['id']) ?>"
            class="delete-button"
            onclick="return confirm('Are you sure you want to delete this consultation request?');"
        >
            🗑 Delete Consultation
        </a>

    </div>


    <footer>
        © <?= date('Y') ?> Lex Counsel. All rights reserved.
    </footer>

</main>

</body>
</html>