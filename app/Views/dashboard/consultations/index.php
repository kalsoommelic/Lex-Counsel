<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Consultation Requests | Lex Counsel</title>

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
        }

        .panel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 22px;
        }

        .panel-header h3 {
            margin: 0;
            font-family: 'Playfair Display', serif;
            font-size: 23px;
            color: #0B1F3A;
        }


        /* FILTERS */

        .filters {
            display: flex;
            gap: 10px;
            margin-bottom: 22px;
        }

        .filters input,
        .filters select {
            padding: 11px 13px;
            border: 1px solid #CBD5E1;
            border-radius: 6px;
            font-family: 'Poppins', sans-serif;
            font-size: 13px;
            outline: none;
            background: white;
        }

        .filters input {
            flex: 1;
        }

        .filters input:focus,
        .filters select:focus {
            border-color: #C9A227;
        }

        .filter-button {
            border: none;
            background: #C9A227;
            color: #0B1F3A;
            padding: 0 18px;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
        }


        /* TABLE */

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 950px;
        }

        th {
            background: #0B1F3A;
            color: white;
            padding: 13px 12px;
            text-align: left;
            font-size: 12px;
            font-weight: 600;
        }

        td {
            padding: 13px 12px;
            border-bottom: 1px solid #E2E8F0;
            font-size: 13px;
            vertical-align: middle;
        }

        tr:hover td {
            background: #F8FAFC;
        }


        /* CLIENT */

        .client-name {
            font-weight: 600;
            color: #0B1F3A;
        }

        .client-email {
            font-size: 11px;
            color: #64748B;
            margin-top: 3px;
        }


        /* CASE TYPE */

        .case-type {
            color: #334155;
            font-weight: 500;
        }


        /* STATUS */

        .status {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
        }

        .status-pending {
            background: #FEF3C7;
            color: #92400E;
        }

        .status-approved {
            background: #DCFCE7;
            color: #166534;
        }

        .status-rejected {
            background: #FEE2E2;
            color: #991B1B;
        }

        .status-completed {
            background: #DBEAFE;
            color: #1E40AF;
        }


        /* ACTIONS */

        .actions {
            display: flex;
            gap: 7px;
        }

        .action {
            display: inline-block;
            padding: 7px 10px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 11px;
            font-weight: 600;
        }

        .view {
            background: #E0F2FE;
            color: #0369A1;
        }

        .delete {
            background: #FEE2E2;
            color: #B91C1C;
        }


        /* EMPTY */

        .empty {
            text-align: center;
            padding: 45px 20px;
            color: #64748B;
        }

        .empty strong {
            display: block;
            color: #0B1F3A;
            margin-bottom: 5px;
            font-size: 16px;
        }


        /* FOOTER */

        footer {
            text-align: center;
            padding: 25px 10px 5px;
            color: #64748B;
            font-size: 12px;
        }


        /* MOBILE */

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

            .filters {
                flex-direction: column;
            }

            .filter-button {
                padding: 11px;
            }

            .panel {
                padding: 18px;
            }

            .panel-header {
                flex-direction: column;
                align-items: flex-start;
            }

        }

    </style>

</head>


<body>


<!-- SIDEBAR -->

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


        <a
            href="<?= base_url('admin/consultations') ?>"
            class="active"
        >
            📅 <span>Consultations</span>
        </a>


        <a href="<?= base_url() ?>" target="_blank">
            🌐 <span>View Website</span>
        </a>


        <a
            href="<?= base_url('admin/logout') ?>"
            class="logout"
        >
            🚪 <span>Logout</span>
        </a>

    </nav>

</aside>



<!-- MAIN -->

<main class="main">


    <div class="topbar">

        <div>

            <h2>
                Consultation Requests
            </h2>

            <p>
                Manage consultation requests from your website visitors.
            </p>

        </div>


        <a
            href="<?= base_url() ?>"
            target="_blank"
            class="view-site"
        >
            View Website
        </a>

    </div>



    <!-- SUCCESS -->

    <?php if (session()->getFlashdata('success')): ?>

        <div class="alert alert-success">

            <?= esc(session()->getFlashdata('success')) ?>

        </div>

    <?php endif; ?>



    <!-- ERROR -->

    <?php if (session()->getFlashdata('error')): ?>

        <div class="alert alert-error">

            <?= esc(session()->getFlashdata('error')) ?>

        </div>

    <?php endif; ?>



    <section class="panel">


        <div class="panel-header">

            <h3>
                Consultation Requests
            </h3>

        </div>



        <!-- FILTERS -->

        <form
            method="get"
            action="<?= base_url('admin/consultations') ?>"
            class="filters"
        >

            <input
                type="text"
                name="search"
                value="<?= esc($search ?? '') ?>"
                placeholder="Search by name, email, phone or case type..."
            >


            <select name="status">

                <option value="">
                    All Status
                </option>


                <option
                    value="pending"
                    <?= ($status ?? '') === 'pending'
                        ? 'selected'
                        : ''
                    ?>
                >
                    Pending
                </option>


                <option
                    value="approved"
                    <?= ($status ?? '') === 'approved'
                        ? 'selected'
                        : ''
                    ?>
                >
                    Approved
                </option>


                <option
                    value="rejected"
                    <?= ($status ?? '') === 'rejected'
                        ? 'selected'
                        : ''
                    ?>
                >
                    Rejected
                </option>


                <option
                    value="completed"
                    <?= ($status ?? '') === 'completed'
                        ? 'selected'
                        : ''
                    ?>
                >
                    Completed
                </option>

            </select>


            <button
                type="submit"
                class="filter-button"
            >
                Search
            </button>

        </form>



        <!-- TABLE -->

        <div class="table-wrapper">


            <?php if (!empty($consultations)): ?>

                <table>

                    <thead>

                        <tr>

                            <th>
                                Client
                            </th>

                            <th>
                                Phone
                            </th>

                            <th>
                                Case Type
                            </th>

                            <th>
                                Preferred Date
                            </th>

                            <th>
                                Status
                            </th>

                            <th>
                                Submitted
                            </th>

                            <th>
                                Actions
                            </th>

                        </tr>

                    </thead>


                    <tbody>


                    <?php foreach ($consultations as $consultation): ?>

                        <tr>


                            <!-- CLIENT -->

                            <td>

                                <div class="client-name">

                                    <?= esc($consultation['name']) ?>

                                </div>


                                <div class="client-email">

                                    <?= esc($consultation['email']) ?>

                                </div>

                            </td>



                            <!-- PHONE -->

                            <td>

                                <?= !empty($consultation['phone'])
                                    ? esc($consultation['phone'])
                                    : '—'
                                ?>

                            </td>



                            <!-- CASE TYPE -->

                            <td>

                                <span class="case-type">

                                    <?= !empty($consultation['case_type'])
                                        ? esc($consultation['case_type'])
                                        : '—'
                                    ?>

                                </span>

                            </td>



                            <!-- DATE -->

                            <td>

                                <?php if (!empty($consultation['preferred_date'])): ?>

                                    <?= date(
                                        'd M Y',
                                        strtotime(
                                            $consultation['preferred_date']
                                        )
                                    ) ?>

                                <?php else: ?>

                                    —

                                <?php endif; ?>

                            </td>



                            <!-- STATUS -->

                            <td>

                                <?php

                                $statusClass = match (
                                    $consultation['status']
                                ) {

                                    'approved'
                                        => 'status-approved',

                                    'rejected'
                                        => 'status-rejected',

                                    'completed'
                                        => 'status-completed',

                                    default
                                        => 'status-pending',
                                };

                                ?>


                                <span
                                    class="status <?= $statusClass ?>"
                                >

                                    <?= esc(
                                        ucfirst(
                                            $consultation['status']
                                        )
                                    ) ?>

                                </span>

                            </td>



                            <!-- SUBMITTED -->

                            <td>

                                <?php if (!empty($consultation['created_at'])): ?>

                                    <?= date(
                                        'd M Y',
                                        strtotime(
                                            $consultation['created_at']
                                        )
                                    ) ?>

                                <?php else: ?>

                                    —

                                <?php endif; ?>

                            </td>



                            <!-- ACTIONS -->

                            <td>

                                <div class="actions">


                                    <a
                                        href="<?= base_url(
                                            'admin/consultation/' .
                                            $consultation['id']
                                        ) ?>"
                                        class="action view"
                                    >
                                        View
                                    </a>


                                    <a
                                        href="<?= base_url(
                                            'admin/consultation/delete/' .
                                            $consultation['id']
                                        ) ?>"
                                        class="action delete"
                                        onclick="return confirm(
                                            'Are you sure you want to delete this consultation request?'
                                        );"
                                    >
                                        Delete
                                    </a>

                                </div>

                            </td>


                        </tr>

                    <?php endforeach; ?>


                    </tbody>

                </table>


            <?php else: ?>


                <div class="empty">

                    <strong>
                        No consultation requests found.
                    </strong>

                    Consultation requests submitted from the website
                    will appear here.

                </div>


            <?php endif; ?>


        </div>


    </section>



    <footer>

        © <?= date('Y') ?> Lex Counsel. All rights reserved.

    </footer>


</main>


</body>
</html>