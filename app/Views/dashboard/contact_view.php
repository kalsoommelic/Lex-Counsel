<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= esc($title ?? 'View Contact') ?> - Lex Counsel</title>

    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=Poppins:wght@300;400;500;600&display=swap"
        rel="stylesheet"
    >

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Poppins", sans-serif;
            background: #F8F9FA;
            color: #1E293B;
        }

        .page {
            min-height: 100vh;
            padding: 40px;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            gap: 20px;
        }

        .heading h1 {
            font-family: "Playfair Display", serif;
            color: #0B1F3A;
            font-size: 36px;
        }

        .heading p {
            margin-top: 5px;
            color: #64748B;
            font-size: 13px;
        }

        .back-button {
            padding: 11px 18px;
            background: #0B1F3A;
            color: white;
            text-decoration: none;
            font-size: 13px;
        }

        .back-button:hover {
            background: #142D4F;
        }

        .contact-card {
            background: white;
            border: 1px solid #E2E8F0;
            padding: 35px;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
            padding-bottom: 25px;
            border-bottom: 1px solid #E2E8F0;
            margin-bottom: 25px;
        }

        .card-header h2 {
            font-family: "Playfair Display", serif;
            color: #0B1F3A;
            font-size: 28px;
        }

        .card-header p {
            margin-top: 6px;
            color: #64748B;
            font-size: 13px;
        }

        .status {
            display: inline-block;
            padding: 7px 13px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
        }

        .status-new {
            background: #FFF7ED;
            color: #C2410C;
        }

        .status-read {
            background: #EFF6FF;
            color: #2563EB;
        }

        .status-replied {
            background: #ECFDF5;
            color: #047857;
        }

        .status-closed {
            background: #F1F5F9;
            color: #475569;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .info-box {
            padding: 18px;
            background: #F8F9FA;
            border: 1px solid #E2E8F0;
        }

        .info-label {
            display: block;
            margin-bottom: 7px;
            color: #64748B;
            font-size: 11px;
            letter-spacing: 1px;
            font-weight: 600;
        }

        .info-value {
            color: #0B1F3A;
            font-size: 14px;
            word-break: break-word;
        }

        .message-section {
            margin-top: 10px;
        }

        .message-section h3 {
            margin-bottom: 12px;
            color: #0B1F3A;
            font-family: "Playfair Display", serif;
            font-size: 22px;
        }

        .message-box {
            min-height: 180px;
            padding: 20px;
            background: #F8F9FA;
            border: 1px solid #E2E8F0;
            color: #334155;
            font-size: 14px;
            line-height: 1.8;
            white-space: pre-wrap;
        }

        .actions {
            display: flex;
            gap: 12px;
            margin-top: 30px;
            padding-top: 25px;
            border-top: 1px solid #E2E8F0;
        }

        .action-button {
            display: inline-block;
            padding: 11px 18px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
        }

        .email-button {
            background: #C9A227;
            color: #0B1F3A;
        }

        .delete-button {
            background: #FEF2F2;
            color: #B91C1C;
            border: 1px solid #FECACA;
        }

        .email-button:hover {
            background: #B58E1C;
        }

        .delete-button:hover {
            background: #FEE2E2;
        }

        @media (max-width: 700px) {

            .page {
                padding: 20px;
            }

            .topbar {
                flex-direction: column;
                align-items: flex-start;
            }

            .card-header {
                flex-direction: column;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .contact-card {
                padding: 22px;
            }

            .actions {
                flex-direction: column;
            }

        }

    </style>

</head>

<body>

<div class="page">

    <div class="container">

        <!-- Top Bar -->

        <div class="topbar">

            <div class="heading">

                <h1>
                    Contact Details
                </h1>

                <p>
                    View complete contact message information.
                </p>

            </div>

            <a
                href="<?= base_url('admin') ?>"
                class="back-button"
            >
                ← Back to Dashboard
            </a>

        </div>


        <!-- Contact Card -->

        <div class="contact-card">

            <div class="card-header">

                <div>

                    <h2>
                        <?= esc($contact['subject'] ?? 'No Subject') ?>
                    </h2>

                    <p>
                        Contact message #<?= esc($contact['id']) ?>
                    </p>

                </div>


                <?php

                    $contactStatus = $contact['status'] ?? 'new';

                    $statusClass = 'status-new';

                    if ($contactStatus === 'read') {
                        $statusClass = 'status-read';
                    } elseif ($contactStatus === 'replied') {
                        $statusClass = 'status-replied';
                    } elseif ($contactStatus === 'closed') {
                        $statusClass = 'status-closed';
                    }

                ?>

                <span class="status <?= esc($statusClass) ?>">
                    <?= esc(ucfirst($contactStatus)) ?>
                </span>

            </div>


            <!-- Contact Information -->

            <div class="info-grid">

                <div class="info-box">

                    <span class="info-label">
                        NAME
                    </span>

                    <div class="info-value">
                        <?= esc($contact['name'] ?? '-') ?>
                    </div>

                </div>


                <div class="info-box">

                    <span class="info-label">
                        EMAIL
                    </span>

                    <div class="info-value">
                        <?= esc($contact['email'] ?? '-') ?>
                    </div>

                </div>


                <div class="info-box">

                    <span class="info-label">
                        PHONE
                    </span>

                    <div class="info-value">
                        <?= esc($contact['phone'] ?? '-') ?>
                    </div>

                </div>


                <div class="info-box">

                    <span class="info-label">
                        DATE
                    </span>

                    <div class="info-value">
                        <?= esc($contact['created_at'] ?? '-') ?>
                    </div>

                </div>

            </div>


            <!-- Message -->

            <div class="message-section">

                <h3>
                    Message
                </h3>

                <div class="message-box">
                    <?= esc($contact['message'] ?? 'No message available.') ?>
                </div>

            </div>


            <!-- Actions -->

            <div class="actions">

                <a
                    href="mailto:<?= esc($contact['email']) ?>"
                    class="action-button email-button"
                >
                    ✉ Reply by Email
                </a>


                <a
                    href="<?= base_url('admin/contact/delete/' . $contact['id']) ?>"
                    class="action-button delete-button"
                    onclick="return confirm('Are you sure you want to delete this contact message?');"
                >
                    Delete Message
                </a>

            </div>

        </div>

    </div>

</div>

</body>

</html>