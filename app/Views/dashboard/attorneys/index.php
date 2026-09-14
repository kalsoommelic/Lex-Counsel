<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Manage Attorneys | Lex Counsel</title>

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

        .add-button {
            background: #0B1F3A;
            color: white;
            text-decoration: none;
            padding: 11px 17px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
        }

        .add-button:hover {
            background: #16345E;
        }

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

        .attorney-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .attorney-image {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #C9A227;
        }

        .no-image {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: #E2E8F0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #64748B;
            font-size: 18px;
            font-weight: 600;
        }

        .attorney-name {
            font-weight: 600;
            color: #0B1F3A;
        }

        .designation {
            font-size: 11px;
            color: #64748B;
            margin-top: 2px;
        }

        .status {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
        }

        .status-active {
            background: #DCFCE7;
            color: #166534;
        }

        .status-inactive {
            background: #FEE2E2;
            color: #991B1B;
        }

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

        .edit {
            background: #E0F2FE;
            color: #0369A1;
        }

        .delete {
            background: #FEE2E2;
            color: #B91C1C;
        }

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

        footer {
            text-align: center;
            padding: 25px 10px 5px;
            color: #64748B;
            font-size: 12px;
        }

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

<aside class="sidebar">

    <div class="brand">
        <h1>Lex Counsel</h1>
        <p>ADMIN PANEL</p>
    </div>

    <nav class="menu">

        <a href="<?= base_url('admin') ?>">
            🏠 <span>Dashboard</span>
        </a>

        <a href="<?= base_url('admin/attorneys') ?>" class="active">
            ⚖️ <span>Attorneys</span>
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
            <h2>Manage Attorneys</h2>
            <p>Manage your Lex Counsel legal team.</p>
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

            <h3>Attorneys</h3>

            <a
                href="<?= base_url('admin/attorneys/add') ?>"
                class="add-button"
            >
                + Add Attorney
            </a>

        </div>


        <form
            method="get"
            action="<?= base_url('admin/attorneys') ?>"
            class="filters"
        >

            <input
                type="text"
                name="search"
                value="<?= esc($search ?? '') ?>"
                placeholder="Search by name, designation, specialization..."
            >

            <select name="status">

                <option value="">All Status</option>

                <option
                    value="1"
                    <?= ($status ?? '') === '1' ? 'selected' : '' ?>
                >
                    Active
                </option>

                <option
                    value="0"
                    <?= ($status ?? '') === '0' ? 'selected' : '' ?>
                >
                    Inactive
                </option>

            </select>

            <button type="submit" class="filter-button">
                Search
            </button>

        </form>


        <div class="table-wrapper">

            <?php if (!empty($attorneys)): ?>

                <table>

                    <thead>

                        <tr>
                            <th>Attorney</th>
                            <th>Specialization</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>

                    </thead>

                    <tbody>

                    <?php foreach ($attorneys as $attorney): ?>

                        <tr>

                            <td>

                                <div class="attorney-info">

                                    <?php if (!empty($attorney['image'])): ?>

                                        <img
                                            src="<?= base_url('uploads/attorneys/' . $attorney['image']) ?>"
                                            alt="<?= esc($attorney['name']) ?>"
                                            class="attorney-image"
                                        >

                                    <?php else: ?>

                                        <div class="no-image">
                                            ⚖
                                        </div>

                                    <?php endif; ?>


                                    <div>

                                        <div class="attorney-name">
                                            <?= esc($attorney['name']) ?>
                                        </div>

                                        <?php if (!empty($attorney['designation'])): ?>

                                            <div class="designation">
                                                <?= esc($attorney['designation']) ?>
                                            </div>

                                        <?php endif; ?>

                                    </div>

                                </div>

                            </td>


                            <td>
                                <?= !empty($attorney['specialization'])
                                    ? esc($attorney['specialization'])
                                    : '—'
                                ?>
                            </td>


                            <td>
                                <?= !empty($attorney['email'])
                                    ? esc($attorney['email'])
                                    : '—'
                                ?>
                            </td>


                            <td>
                                <?= !empty($attorney['phone'])
                                    ? esc($attorney['phone'])
                                    : '—'
                                ?>
                            </td>


                            <td>

                                <?php if ((int) $attorney['status'] === 1): ?>

                                    <span class="status status-active">
                                        Active
                                    </span>

                                <?php else: ?>

                                    <span class="status status-inactive">
                                        Inactive
                                    </span>

                                <?php endif; ?>

                            </td>


                            <td>

                                <div class="actions">

                                    <a
                                        href="<?= base_url('admin/attorneys/edit/' . $attorney['id']) ?>"
                                        class="action edit"
                                    >
                                        Edit
                                    </a>

                                    <a
                                        href="<?= base_url('admin/attorneys/delete/' . $attorney['id']) ?>"
                                        class="action delete"
                                        onclick="return confirm('Are you sure you want to delete this attorney?');"
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

                    <strong>No attorneys found.</strong>

                    Add your first attorney to start building the Lex Counsel legal team.

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