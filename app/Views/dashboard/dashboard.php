<!DOCTYPE html>

<html lang="en">

<head>

```
<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>
    <?= esc($title ?? 'Admin Dashboard') ?> | Lex Counsel
</title>

<!-- Google Fonts -->

<link rel="preconnect" href="https://fonts.googleapis.com">

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=Poppins:wght@300;400;500;600&display=swap"
    rel="stylesheet"
>

<!-- Font Awesome -->

<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
>


<style>

    /* =====================================================
       GLOBAL
    ====================================================== */

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background: #F8F9FA;
        color: #1E293B;
        font-family: "Poppins", sans-serif;
        min-height: 100vh;
    }

    a {
        text-decoration: none;
    }


    /* =====================================================
       SIDEBAR
    ====================================================== */

    .sidebar {
        position: fixed;
        top: 0;
        left: 0;

        width: 250px;
        height: 100vh;

        background: #0B1F3A;

        padding: 30px 18px;

        z-index: 1000;
    }


    /* BRAND */

    .brand {
        font-family: "Playfair Display", serif;

        font-size: 28px;
        font-weight: 600;

        color: #FFFFFF;

        text-align: center;

        margin-bottom: 45px;
    }

    .brand span {
        color: #C9A227;
    }


    /* MENU TITLE */

    .menu-title {
        color: #94A3B8;

        font-size: 11px;
        font-weight: 600;

        letter-spacing: 1.5px;

        padding: 0 15px;

        margin-bottom: 12px;
    }


    /* SIDEBAR LINKS */

    .sidebar a {
        display: flex;

        align-items: center;

        gap: 13px;

        color: #CBD5E1;

        padding: 13px 15px;

        margin-bottom: 7px;

        border-radius: 7px;

        font-size: 14px;
        font-weight: 500;

        transition: all 0.2s ease;
    }


    .sidebar a i {
        width: 20px;

        text-align: center;

        font-size: 16px;
    }


    .sidebar a:hover {
        background: rgba(255, 255, 255, 0.08);

        color: #FFFFFF;
    }


    .sidebar a.active {
        background: #C9A227;

        color: #0B1F3A;

        font-weight: 600;
    }


    /* LOGOUT */

    .sidebar a.logout-link {
        color: #FFFFFF;

        background: #B91C1C;

        margin-top: 30px;
    }

    .sidebar a.logout-link:hover {
        background: #991B1B;

        color: #FFFFFF;
    }


    /* =====================================================
       MAIN CONTENT
    ====================================================== */

    .main {
        margin-left: 250px;

        width: calc(100% - 250px);

        min-height: calc(100vh - 65px);

        padding: 35px;
    }


    /* =====================================================
       ALERTS
    ====================================================== */

    .alert-success,
    .alert-error {
        padding: 13px 18px;

        border-radius: 7px;

        margin-bottom: 20px;

        font-size: 13px;

        font-weight: 500;
    }


    .alert-success {
        background: #ECFDF5;

        color: #047857;

        border: 1px solid #A7F3D0;
    }


    .alert-error {
        background: #FEF2F2;

        color: #B91C1C;

        border: 1px solid #FECACA;
    }


    /* =====================================================
       TOP BAR
    ====================================================== */

    .topbar {
        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 20px;

        margin-bottom: 30px;
    }


    .topbar h1 {
        font-family: "Playfair Display", serif;

        font-size: 36px;

        font-weight: 600;

        color: #0B1F3A;

        margin-bottom: 5px;
    }


    .topbar p {
        color: #64748B;

        font-size: 13px;
    }


    /* VIEW WEBSITE BUTTON */

    .view-site {
        display: inline-flex;

        align-items: center;

        gap: 8px;

        background: #C9A227;

        color: #0B1F3A;

        padding: 11px 18px;

        border-radius: 6px;

        font-size: 13px;

        font-weight: 600;

        transition: all 0.2s ease;
    }


    .view-site:hover {
        background: #B38F1D;

        transform: translateY(-1px);
    }


    /* =====================================================
       STATISTICS
    ====================================================== */

    .stats {
        display: grid;

        grid-template-columns: repeat(4, 1fr);

        gap: 18px;

        margin-bottom: 30px;
    }


    .stat-card {
        background: #FFFFFF;

        border: 1px solid #E2E8F0;

        border-radius: 8px;

        padding: 22px;

        display: flex;

        align-items: center;

        gap: 16px;

        min-height: 110px;

        transition: all 0.2s ease;
    }


    .stat-card:hover {
        border-color: #C9A227;

        transform: translateY(-2px);

        box-shadow: 0 6px 20px rgba(11, 31, 58, 0.07);
    }


    /* CLICKABLE STAT CARD */

    a.stat-card {
        color: inherit;
    }


    a.stat-card:hover {
        color: inherit;
    }


    /* STAT ICON */

    .stat-icon {
        width: 48px;

        height: 48px;

        min-width: 48px;

        border-radius: 50%;

        background: #F8F3E3;

        color: #C9A227;

        display: flex;

        align-items: center;

        justify-content: center;

        font-size: 19px;
    }


    .stat-content {
        display: flex;

        flex-direction: column;

        gap: 4px;
    }


    .stat-content span {
        color: #64748B;

        font-size: 10px;

        font-weight: 600;

        letter-spacing: 0.7px;
    }


    .stat-content strong {
        color: #0B1F3A;

        font-size: 28px;

        line-height: 1;

        font-weight: 600;
    }


    /* =====================================================
       CONTACT PANEL
    ====================================================== */

    .panel {
        background: #FFFFFF;

        border: 1px solid #E2E8F0;

        border-radius: 8px;

        overflow: hidden;
    }


    .panel-header {
        padding: 22px 24px;

        border-bottom: 1px solid #E2E8F0;

        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 20px;
    }


    .panel-header h2 {
        font-family: "Playfair Display", serif;

        color: #0B1F3A;

        font-size: 24px;

        font-weight: 600;

        white-space: nowrap;
    }


    /* =====================================================
       SEARCH FORM
    ====================================================== */

    .search-form {
        display: flex;

        align-items: center;

        gap: 8px;

        flex: 1;

        justify-content: flex-end;
    }


    .search-input,
    .status-filter {
        height: 40px;

        border: 1px solid #CBD5E1;

        border-radius: 5px;

        background: #FFFFFF;

        color: #1E293B;

        font-family: "Poppins", sans-serif;

        font-size: 12px;

        outline: none;

        transition: border-color 0.2s ease;
    }


    .search-input {
        width: 250px;

        padding: 0 12px;
    }


    .status-filter {
        width: 125px;

        padding: 0 8px;
    }


    .search-input:focus,
    .status-filter:focus {
        border-color: #C9A227;
    }


    .search-button {
        height: 40px;

        padding: 0 15px;

        border: none;

        border-radius: 5px;

        background: #0B1F3A;

        color: #FFFFFF;

        font-family: "Poppins", sans-serif;

        font-size: 12px;

        font-weight: 500;

        cursor: pointer;

        display: inline-flex;

        align-items: center;

        justify-content: center;

        gap: 7px;
    }


    .search-button:hover {
        background: #172F4D;
    }


    .reset-button {
        height: 40px;

        padding: 0 14px;

        border-radius: 5px;

        background: #F1F5F9;

        color: #475569;

        font-size: 12px;

        display: inline-flex;

        align-items: center;

        justify-content: center;
    }


    .reset-button:hover {
        background: #E2E8F0;
    }


    /* =====================================================
       TABLE WRAPPER
    ====================================================== */

    .table-wrapper {
        width: 100%;

        overflow-x: auto;

        -webkit-overflow-scrolling: touch;
    }


    table {
        width: 100%;

        min-width: 950px;

        border-collapse: collapse;
    }


    thead {
        background: #F8F9FA;
    }


    th {
        padding: 14px 18px;

        text-align: left;

        color: #64748B;

        font-size: 10px;

        font-weight: 600;

        letter-spacing: 0.7px;

        border-bottom: 1px solid #E2E8F0;

        white-space: nowrap;
    }


    td {
        padding: 16px 18px;

        color: #334155;

        font-size: 12px;

        border-bottom: 1px solid #F1F5F9;

        vertical-align: middle;
    }


    tbody tr:hover {
        background: #FCFCFD;
    }


    tbody tr:last-child td {
        border-bottom: none;
    }


    /* =====================================================
       STATUS SELECT
    ====================================================== */

    .status-select {
        min-width: 105px;

        padding: 7px 9px;

        border: 1px solid #CBD5E1;

        border-radius: 5px;

        background: #FFFFFF;

        color: #334155;

        font-family: "Poppins", sans-serif;

        font-size: 11px;

        outline: none;

        cursor: pointer;
    }


    .status-select:focus {
        border-color: #C9A227;
    }


    /* =====================================================
       ACTION LINKS
    ====================================================== */

    .view-link {
        color: #0B1F3A;

        font-size: 11px;

        font-weight: 600;

        white-space: nowrap;
    }


    .view-link:hover {
        color: #C9A227;
    }


    .delete-link {
        color: #B91C1C;

        font-size: 11px;

        font-weight: 500;

        white-space: nowrap;
    }


    .delete-link:hover {
        color: #991B1B;
    }


    /* =====================================================
       EMPTY STATE
    ====================================================== */

    .empty {
        min-height: 280px;

        display: flex;

        flex-direction: column;

        align-items: center;

        justify-content: center;

        gap: 8px;

        color: #64748B;

        text-align: center;
    }


    .empty i {
        font-size: 40px;

        color: #C9A227;

        margin-bottom: 8px;
    }


    .empty strong {
        color: #0B1F3A;

        font-family: "Playfair Display", serif;

        font-size: 20px;

        font-weight: 600;
    }


    .empty span {
        font-size: 12px;

        color: #94A3B8;
    }


    /* =====================================================
       FOOTER
    ====================================================== */

    footer {
        margin-left: 250px;

        padding: 20px 35px;

        color: #94A3B8;

        font-size: 12px;

        text-align: center;
    }


    /* =====================================================
       TABLET
    ====================================================== */

    @media (max-width: 1100px) {

        .stats {
            grid-template-columns: repeat(2, 1fr);
        }

        .panel-header {
            align-items: flex-start;

            flex-direction: column;
        }

        .search-form {
            width: 100%;

            justify-content: flex-start;
        }

    }


    /* =====================================================
       MOBILE
    ====================================================== */

    @media (max-width: 800px) {

        .sidebar {
            width: 200px;
        }

        .main {
            margin-left: 200px;

            width: calc(100% - 200px);

            padding: 20px;
        }

        footer {
            margin-left: 200px;
        }

        .topbar {
            align-items: flex-start;

            flex-direction: column;

            gap: 15px;
        }

        .topbar h1 {
            font-size: 30px;
        }

        .search-form {
            flex-wrap: wrap;
        }

    }


    /* =====================================================
       SMALL MOBILE
    ====================================================== */

    @media (max-width: 600px) {

        .sidebar {
            width: 70px;

            padding: 20px 10px;
        }


        .brand {
            font-size: 0;

            text-align: center;

            margin-bottom: 35px;
        }


        .brand::before {
            content: "LC";

            font-family: "Playfair Display", serif;

            font-size: 22px;

            color: #C9A227;
        }


        .brand span {
            display: none;
        }


        .menu-title {
            display: none;
        }


        .sidebar a {
            justify-content: center;

            text-align: center;

            padding: 12px 5px;

            font-size: 0;
        }


        .sidebar a i {
            font-size: 17px;
        }


        .main {
            margin-left: 70px;

            width: calc(100% - 70px);

            padding: 15px;
        }


        footer {
            margin-left: 70px;

            padding: 15px;

            font-size: 11px;
        }


        .topbar {
            margin-bottom: 25px;
        }


        .topbar h1 {
            font-size: 26px;
        }


        .topbar p {
            font-size: 12px;
        }


        .view-site {
            padding: 9px 14px;

            font-size: 12px;
        }


        .stats {
            grid-template-columns: repeat(2, 1fr);

            gap: 10px;

            margin-bottom: 20px;
        }


        .stat-card {
            padding: 16px 10px;

            gap: 9px;

            min-height: 95px;
        }


        .stat-icon {
            width: 38px;

            height: 38px;

            min-width: 38px;

            font-size: 15px;
        }


        .stat-content span {
            font-size: 8px;

            letter-spacing: 0.3px;
        }


        .stat-content strong {
            font-size: 23px;
        }


        .panel {
            border-radius: 7px;
        }


        .panel-header {
            padding: 17px 15px;
        }


        .panel-header h2 {
            font-size: 21px;
        }


        .search-form {
            flex-direction: column;

            align-items: stretch;

            width: 100%;
        }


        .search-input,
        .status-filter,
        .search-button,
        .reset-button {
            width: 100%;

            min-width: 100%;
        }


        .table-wrapper {
            width: 100%;

            overflow-x: auto;
        }


        table {
            min-width: 950px;
        }

    }

</style>
```

</head>

<body>

```
<!-- =========================================================
     SIDEBAR
========================================================== -->

<aside class="sidebar">

    <div class="brand">
        Lex <span>Counsel</span>
    </div>

    <div class="menu-title">
        ADMIN PANEL
    </div>


    <!-- Dashboard -->

    <a
        href="<?= base_url('admin') ?>"
        class="active"
    >

        <i class="fa-solid fa-gauge-high"></i>

        <span>
            Dashboard
        </span>

    </a>


    <!-- Consultations -->

    <a href="<?= base_url('admin/consultations') ?>">

        <i class="fa-solid fa-calendar-check"></i>

        <span>
            Consultations
        </span>

    </a>


    <!-- View Website -->

    <a href="<?= base_url('/') ?>">

        <i class="fa-solid fa-globe"></i>

        <span>
            View Website
        </span>

    </a>


    <!-- Logout -->

    <a
        href="<?= base_url('admin/logout') ?>"
        class="logout-link"
        onclick="return confirm('Are you sure you want to logout?');"
    >

        <i class="fa-solid fa-right-from-bracket"></i>

        <span>
            Logout
        </span>

    </a>

</aside>



<!-- =========================================================
     MAIN CONTENT
========================================================== -->

<main class="main">


    <!-- FLASH SUCCESS MESSAGE -->

    <?php if (session()->getFlashdata('success')): ?>

        <div class="alert-success">

            <?= esc(session()->getFlashdata('success')) ?>

        </div>

    <?php endif; ?>


    <!-- FLASH ERROR MESSAGE -->

    <?php if (session()->getFlashdata('error')): ?>

        <div class="alert-error">

            <?= esc(session()->getFlashdata('error')) ?>

        </div>

    <?php endif; ?>


    <!-- TOP BAR -->

    <div class="topbar">

        <div>

            <h1>
                Admin Dashboard
            </h1>

            <p>
                Manage your Lex Counsel website.
            </p>

        </div>


        <a
            href="<?= base_url('/') ?>"
            class="view-site"
        >

            <i class="fa-solid fa-arrow-up-right-from-square"></i>

            View Website

        </a>

    </div>



    <!-- =====================================================
         STATISTICS - 5 CARDS
    ====================================================== -->

    <div class="stats">


        <!-- TOTAL MESSAGES -->

        <div class="stat-card">

            <div class="stat-icon">

                <i class="fa-regular fa-envelope"></i>

            </div>

            <div class="stat-content">

                <span>
                    TOTAL MESSAGES
                </span>

                <strong>
                    <?= $contactsCount ?? count($contacts) ?>
                </strong>

            </div>

        </div>



        <!-- NEW MESSAGES -->

        <div class="stat-card">

            <div class="stat-icon">

                <i class="fa-regular fa-envelope"></i>

            </div>

            <div class="stat-content">

                <span>
                    NEW MESSAGES
                </span>

                <strong>

                    <?= count(array_filter($contacts, function ($contact) {

                        return ($contact['status'] ?? 'new') === 'new';

                    })) ?>

                </strong>

            </div>

        </div>



        <!-- REPLIED -->

        <div class="stat-card">

            <div class="stat-icon">

                <i class="fa-regular fa-paper-plane"></i>

            </div>

            <div class="stat-content">

                <span>
                    REPLIED
                </span>

                <strong>

                    <?= count(array_filter($contacts, function ($contact) {

                        return ($contact['status'] ?? '') === 'replied';

                    })) ?>

                </strong>

            </div>

        </div>



        <!-- CLOSED -->

        <div class="stat-card">

            <div class="stat-icon">

                <i class="fa-solid fa-check"></i>

            </div>

            <div class="stat-content">

                <span>
                    CLOSED
                </span>

                <strong>

                    <?= count(array_filter($contacts, function ($contact) {

                        return ($contact['status'] ?? '') === 'closed';

                    })) ?>

                </strong>

            </div>

        </div>



        <!-- CONSULTATIONS -->

        <a
            href="<?= base_url('admin/consultations') ?>"
            class="stat-card"
        >

            <div class="stat-icon">

                <i class="fa-solid fa-calendar-check"></i>

            </div>

            <div class="stat-content">

                <span>
                    CONSULTATIONS
                </span>

                <strong>
                    <?= $consultationsCount ?? 0 ?>
                </strong>

            </div>

        </a>


    </div>



    <!-- =====================================================
         CONTACT MESSAGES PANEL
    ====================================================== -->

    <div class="panel">


        <div class="panel-header">

            <h2>
                Contact Messages
            </h2>


            <form
                method="get"
                action="<?= base_url('admin') ?>"
                class="search-form"
            >

                <input
                    type="text"
                    name="search"
                    class="search-input"
                    value="<?= esc($search ?? '') ?>"
                    placeholder="Search name, email or subject..."
                >


                <select
                    name="status"
                    class="status-filter"
                >

                    <option value="">
                        All Status
                    </option>

                    <option
                        value="new"
                        <?= ($status ?? '') === 'new' ? 'selected' : '' ?>
                    >
                        New
                    </option>

                    <option
                        value="read"
                        <?= ($status ?? '') === 'read' ? 'selected' : '' ?>
                    >
                        Read
                    </option>

                    <option
                        value="replied"
                        <?= ($status ?? '') === 'replied' ? 'selected' : '' ?>
                    >
                        Replied
                    </option>

                    <option
                        value="closed"
                        <?= ($status ?? '') === 'closed' ? 'selected' : '' ?>
                    >
                        Closed
                    </option>

                </select>


                <button
                    type="submit"
                    class="search-button"
                >

                    <i class="fa-solid fa-magnifying-glass"></i>

                    Search

                </button>


                <a
                    href="<?= base_url('admin') ?>"
                    class="reset-button"
                >

                    Reset

                </a>

            </form>

        </div>



        <!-- CONTACT TABLE -->

        <div class="table-wrapper">

            <?php if (!empty($contacts)): ?>

                <table>

                    <thead>

                        <tr>

                            <th>
                                NAME
                            </th>

                            <th>
                                EMAIL
                            </th>

                            <th>
                                SUBJECT
                            </th>

                            <th>
                                STATUS
                            </th>

                            <th>
                                DATE
                            </th>

                            <th>
                                ACTION
                            </th>

                            <th>
                                DELETE
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        <?php foreach ($contacts as $contact): ?>

                            <tr>

                                <td>
                                    <?= esc($contact['name'] ?? '') ?>
                                </td>


                                <td>
                                    <?= esc($contact['email'] ?? '') ?>
                                </td>


                                <td>
                                    <?= esc($contact['subject'] ?? '') ?>
                                </td>


                                <td>

                                    <form
                                        action="<?= base_url('admin/contact/status/' . $contact['id']) ?>"
                                        method="post"
                                    >

                                        <?= csrf_field() ?>

                                        <select
                                            name="status"
                                            class="status-select"
                                            onchange="this.form.submit()"
                                        >

                                            <option
                                                value="new"
                                                <?= ($contact['status'] ?? 'new') === 'new' ? 'selected' : '' ?>
                                            >
                                                New
                                            </option>

                                            <option
                                                value="read"
                                                <?= ($contact['status'] ?? '') === 'read' ? 'selected' : '' ?>
                                            >
                                                Read
                                            </option>

                                            <option
                                                value="replied"
                                                <?= ($contact['status'] ?? '') === 'replied' ? 'selected' : '' ?>
                                            >
                                                Replied
                                            </option>

                                            <option
                                                value="closed"
                                                <?= ($contact['status'] ?? '') === 'closed' ? 'selected' : '' ?>
                                            >
                                                Closed
                                            </option>

                                        </select>

                                    </form>

                                </td>


                                <td>
                                    <?= esc($contact['created_at'] ?? '') ?>
                                </td>


                                <td>

                                    <a
                                        href="<?= base_url('admin/contact/' . $contact['id']) ?>"
                                        class="view-link"
                                    >

                                        <i class="fa-regular fa-eye"></i>

                                        View →

                                    </a>

                                </td>


                                <td>

                                    <a
                                        href="<?= base_url('admin/contact/delete/' . $contact['id']) ?>"
                                        class="delete-link"
                                        onclick="return confirmDelete(this);"
                                    >

                                        <i class="fa-regular fa-trash-can"></i>

                                        Delete

                                    </a>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>


            <?php else: ?>

                <div class="empty">

                    <i class="fa-regular fa-envelope-open"></i>

                    <strong>
                        No Contact Messages
                    </strong>

                    <span>
                        No contact messages were found.
                    </span>

                </div>

            <?php endif; ?>

        </div>

    </div>


</main>



<!-- DELETE CONFIRMATION -->

<script>

    function confirmDelete(link) {

        const confirmed = confirm(
            "Are you sure you want to delete this contact message?\n\nThis action cannot be undone."
        );

        if (confirmed) {

            window.location.href = link.href;

        }

        return false;
    }

</script>



<!-- AUTO HIDE FLASH MESSAGES -->

<script>

    setTimeout(function () {

        const messages = document.querySelectorAll(
            '.alert-success, .alert-error'
        );

        messages.forEach(function (message) {

            message.style.transition =
                'opacity 0.5s ease';

            message.style.opacity = '0';

            setTimeout(function () {

                message.remove();

            }, 500);

        });

    }, 5000);

</script>



<!-- FOOTER -->

<footer>

    © <?= date('Y') ?> Lex Counsel. All rights reserved.

</footer>

</body>

</html>
