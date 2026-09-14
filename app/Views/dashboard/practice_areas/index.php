<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Practice Areas | Lex Counsel</title>

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

        .add-btn {
            display: inline-block;
            background: #C9A227;
            color: #0B1F3A;
            text-decoration: none;
            padding: 11px 18px;
            border-radius: 7px;
            font-size: 14px;
            font-weight: 600;
        }

        .add-btn:hover {
            opacity: 0.9;
        }

        .alert {
            padding: 13px 16px;
            border-radius: 7px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .alert-success {
            background: #F0FDF4;
            color: #166534;
            border: 1px solid #BBF7D0;
        }

        .alert-error {
            background: #FEF2F2;
            color: #B91C1C;
            border: 1px solid #FECACA;
        }

        .toolbar {
            background: white;
            padding: 18px;
            border-radius: 12px;
            box-shadow: 0 3px 15px rgba(15, 23, 42, 0.07);
            margin-bottom: 20px;
        }

        .filters {
            display: flex;
            gap: 12px;
            align-items: center;
        }

        .search-box {
            flex: 1;
        }

        .search-box input,
        .status-filter select {
            width: 100%;
            padding: 11px 13px;
            border: 1px solid #CBD5E1;
            border-radius: 7px;
            font-family: 'Poppins', sans-serif;
            font-size: 13px;
            outline: none;
        }

        .search-box input:focus,
        .status-filter select:focus {
            border-color: #C9A227;
        }

        .status-filter {
            width: 180px;
        }

        .filter-btn {
            background: #0B1F3A;
            color: white;
            border: none;
            padding: 11px 18px;
            border-radius: 7px;
            font-family: 'Poppins', sans-serif;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
        }

        .table-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 3px 15px rgba(15, 23, 42, 0.07);
            overflow: hidden;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 900px;
        }

        th {
            background: #0B1F3A;
            color: white;
            padding: 14px 15px;
            text-align: left;
            font-size: 12px;
            font-weight: 600;
        }

        td {
            padding: 14px 15px;
            border-bottom: 1px solid #E2E8F0;
            font-size: 13px;
            vertical-align: middle;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tr:hover td {
            background: #F8FAFC;
        }

        .area-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .area-image {
            width: 55px;
            height: 55px;
            border-radius: 8px;
            object-fit: cover;
            border: 1px solid #E2E8F0;
        }

        .area-placeholder {
            width: 55px;
            height: 55px;
            border-radius: 8px;
            background: #F1F5F9;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #64748B;
            font-size: 11px;
            border: 1px solid #E2E8F0;
        }

        .area-name {
            font-weight: 600;
            color: #0B1F3A;
        }

        .description {
            max-width: 280px;
            color: #64748B;
            line-height: 1.5;
        }

        .icon-text {
            color: #C9A227;
            font-weight: 600;
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

        .action-btn {
            display: inline-block;
            padding: 7px 11px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 11px;
            font-weight: 600;
        }

        .edit-btn {
            background: #E0F2FE;
            color: #0369A1;
        }

        .delete-btn {
            background: #FEE2E2;
            color: #B91C1C;
        }

        .empty {
            text-align: center;
            padding: 50px 20px;
            color: #64748B;
        }

        .footer {
            margin-top: 35px;
            text-align: center;
            color: #64748B;
            font-size: 12px;
            padding: 20px;
        }

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

            .filters {
                flex-direction: column;
                align-items: stretch;
            }

            .status-filter {
                width: 100%;
            }

            .filter-btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>

<aside class="sidebar">

    <div class="brand">
        Lex Counsel
    </div>

    <a href="<?= base_url('admin') ?>" class="nav-link">
        Dashboard
    </a>

    <a href="<?= base_url('admin/attorneys') ?>" class="nav-link">
        Attorneys
    </a>

    <a href="<?= base_url('admin/practice-areas') ?>" class="nav-link active">
        Practice Areas
    </a>

    <a href="<?= base_url('/') ?>" class="nav-link">
        View Website
    </a>

    <a href="<?= base_url('admin/logout') ?>" class="nav-link logout">
        Logout
    </a>

</aside>


<main class="main">

    <div class="topbar">

        <div>
            <h1>Practice Areas</h1>
            <p>Manage the legal practice areas of Lex Counsel.</p>
        </div>

        <a
            href="<?= base_url('admin/practice-areas/add') ?>"
            class="add-btn"
        >
            + Add Practice Area
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


    <div class="toolbar">

        <form
            method="get"
            action="<?= base_url('admin/practice-areas') ?>"
        >

            <div class="filters">

                <div class="search-box">

                    <input
                        type="text"
                        name="search"
                        value="<?= esc($search ?? '') ?>"
                        placeholder="Search by name or description..."
                    >

                </div>

                <div class="status-filter">

                    <select name="status">

                        <option value="">
                            All Status
                        </option>

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

                </div>

                <button
                    type="submit"
                    class="filter-btn"
                >
                    Search
                </button>

            </div>

        </form>

    </div>


    <div class="table-card">

        <div class="table-wrapper">

            <?php if (!empty($practiceAreas)): ?>

                <table>

                    <thead>

                        <tr>
                            <th>Practice Area</th>
                            <th>Short Description</th>
                            <th>Icon</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>

                    </thead>

                    <tbody>

                        <?php foreach ($practiceAreas as $area): ?>

                            <tr>

                                <td>

                                    <div class="area-info">

                                        <?php if (!empty($area['image'])): ?>

                                            <img
                                                src="<?= base_url('uploads/practice-areas/' . $area['image']) ?>"
                                                alt="<?= esc($area['name']) ?>"
                                                class="area-image"
                                            >

                                        <?php else: ?>

                                            <div class="area-placeholder">
                                                No Image
                                            </div>

                                        <?php endif; ?>


                                        <div>

                                            <div class="area-name">
                                                <?= esc($area['name']) ?>
                                            </div>

                                            <div style="font-size: 11px; color: #94A3B8; margin-top: 3px;">
                                                <?= esc($area['slug']) ?>
                                            </div>

                                        </div>

                                    </div>

                                </td>


                                <td>

                                    <div class="description">

                                        <?= esc(
                                            !empty($area['short_description'])
                                                ? $area['short_description']
                                                : 'No short description'
                                        ) ?>

                                    </div>

                                </td>


                                <td>

                                    <?php if (!empty($area['icon'])): ?>

                                        <span class="icon-text">
                                            <?= esc($area['icon']) ?>
                                        </span>

                                    <?php else: ?>

                                        <span style="color: #94A3B8;">
                                            —
                                        </span>

                                    <?php endif; ?>

                                </td>


                                <td>

                                    <?php if ((int) $area['status'] === 1): ?>

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
                                            href="<?= base_url('admin/practice-areas/edit/' . $area['id']) ?>"
                                            class="action-btn edit-btn"
                                        >
                                            Edit
                                        </a>

                                        <a
                                            href="<?= base_url('admin/practice-areas/delete/' . $area['id']) ?>"
                                            class="action-btn delete-btn"
                                            onclick="return confirm('Are you sure you want to delete this practice area?');"
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

                    <h3 style="font-family: 'Playfair Display', serif; color: #0B1F3A; margin-bottom: 8px;">
                        No Practice Areas Found
                    </h3>

                    <p>
                        Add your first practice area to get started.
                    </p>

                </div>

            <?php endif; ?>

        </div>

    </div>


    <div class="footer">
        © <?= date('Y') ?> Lex Counsel. All rights reserved.
    </div>

</main>

</body>
</html>
