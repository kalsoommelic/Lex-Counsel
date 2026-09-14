<?php

namespace App\Controllers;

use App\Models\Contact;
use App\Models\User;
use App\Models\Attorney;
use App\Models\PracticeArea;
use App\Models\Post;
use App\Models\Category;
use App\Models\Consultation;

class Admin extends BaseController
{
    /**
     * Admin Login
     */
    public function login()
    {
        if (session()->get('is_admin_logged_in') === true) {
            return redirect()->to(base_url('admin'));
        }

        if (strtolower($this->request->getMethod()) !== 'post') {
            return view('auth/login');
        }

        $email = trim((string) $this->request->getPost('email'));
        $password = (string) $this->request->getPost('password');

        if ($email === '' || $password === '') {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Please enter your email and password.');
        }

        $userModel = new User();

        $user = $userModel
            ->where('email', $email)
            ->first();

        if (
            !$user ||
            $user['role'] !== 'admin' ||
            (int) $user['status'] !== 1 ||
            !password_verify($password, $user['password'])
        ) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Invalid email or password.');
        }

        session()->regenerate();

        session()->set([
            'is_admin_logged_in' => true,
            'admin_id'            => $user['id'],
            'admin_name'          => $user['name'],
            'admin_email'         => $user['email'],
            'admin_role'          => $user['role'],
        ]);

        return redirect()->to(base_url('admin'));
    }


    /**
     * Admin Logout
     */
    public function logout()
    {
        session()->remove([
            'is_admin_logged_in',
            'admin_id',
            'admin_name',
            'admin_email',
            'admin_role',
        ]);

        return redirect()
            ->to(base_url('admin/login'))
            ->with('success', 'You have been logged out successfully.');
    }


    /**
     * Admin Dashboard
     */
    public function index()
    {
        if (session()->get('is_admin_logged_in') !== true) {
            return redirect()->to(base_url('admin/login'));
        }

        /*
         * Contact messages
         */
        $contactModel = new Contact();

        $search = trim((string) $this->request->getGet('search'));
        $status = trim((string) $this->request->getGet('status'));

        $builder = $contactModel;

        if ($search !== '') {
            $builder = $builder
                ->groupStart()
                ->like('name', $search)
                ->orLike('email', $search)
                ->orLike('subject', $search)
                ->orLike('message', $search)
                ->groupEnd();
        }

        if ($status !== '') {
            $builder = $builder->where('status', $status);
        }

        $contacts = $builder
            ->orderBy('created_at', 'DESC')
            ->findAll();


        /*
         * Dashboard counts
         */
        $attorneyModel = new Attorney();
        $practiceAreaModel = new PracticeArea();
        $postModel = new Post();
        $consultationModel = new Consultation();

        $attorneysCount = $attorneyModel->countAllResults();

        $practiceAreasCount = $practiceAreaModel->countAllResults();

        $postsCount = $postModel->countAllResults();

        $contactsCount = $contactModel->countAllResults();

        $consultationsCount = $consultationModel->countAllResults();

        $pendingConsultationsCount = $consultationModel
            ->where('status', 'pending')
            ->countAllResults();


        /*
         * Dashboard view
         */
        return view('dashboard/dashboard', [

            'contacts' => $contacts,

            'search'   => $search,

            'status'   => $status,

            'attorneysCount' => $attorneysCount,

            'practiceAreasCount' => $practiceAreasCount,

            'postsCount' => $postsCount,

            'contactsCount' => $contactsCount,

            'consultationsCount' => $consultationsCount,

            'pendingConsultationsCount' => $pendingConsultationsCount,

        ]);
    }


    /**
     * View Contact Message
     */
    public function viewContact($id)
    {
        if (session()->get('is_admin_logged_in') !== true) {
            return redirect()->to(base_url('admin/login'));
        }

        $contactModel = new Contact();

        $contact = $contactModel->find($id);

        if (!$contact) {
            return redirect()
                ->to(base_url('admin'))
                ->with('error', 'Contact message not found.');
        }

        return view('dashboard/contact_view', [
            'contact' => $contact,
        ]);
    }


    /**
     * Delete Contact Message
     */
    public function deleteContact($id)
    {
        if (session()->get('is_admin_logged_in') !== true) {
            return redirect()->to(base_url('admin/login'));
        }

        $contactModel = new Contact();

        $contact = $contactModel->find($id);

        if (!$contact) {
            return redirect()
                ->to(base_url('admin'))
                ->with('error', 'Contact message not found.');
        }

        $contactModel->delete($id);

        return redirect()
            ->to(base_url('admin'))
            ->with('success', 'Contact message deleted successfully.');
    }


    /**
     * Update Contact Status
     */
    public function updateStatus($id)
    {
        if (session()->get('is_admin_logged_in') !== true) {
            return redirect()->to(base_url('admin/login'));
        }

        $newStatus = trim((string) $this->request->getPost('status'));

        $allowedStatuses = [
            'new',
            'read',
            'replied',
            'closed',
        ];

        if (!in_array($newStatus, $allowedStatuses, true)) {
            return redirect()
                ->back()
                ->with('error', 'Invalid status selected.');
        }

        $contactModel = new Contact();

        $contact = $contactModel->find($id);

        if (!$contact) {
            return redirect()
                ->to(base_url('admin'))
                ->with('error', 'Contact message not found.');
        }

        $contactModel->update($id, [
            'status' => $newStatus,
        ]);

        return redirect()
            ->back()
            ->with('success', 'Message status updated successfully.');
    }


    /**
     * Change Password
     */
    public function changePassword()
    {
        if (session()->get('is_admin_logged_in') !== true) {
            return redirect()->to(base_url('admin/login'));
        }

        if (strtolower($this->request->getMethod()) !== 'post') {
            return view('dashboard/change_password', [
                'title' => 'Change Password',
            ]);
        }

        $currentPassword = (string) $this->request->getPost('current_password');
        $newPassword = (string) $this->request->getPost('new_password');
        $confirmPassword = (string) $this->request->getPost('confirm_password');

        if (
            $currentPassword === '' ||
            $newPassword === '' ||
            $confirmPassword === ''
        ) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Please fill in all password fields.');
        }

        if (strlen($newPassword) < 8) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'New password must be at least 8 characters long.');
        }

        if ($newPassword !== $confirmPassword) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'New password and confirm password do not match.');
        }

        $userModel = new User();

        $user = $userModel->find(session()->get('admin_id'));

        if (!$user) {
            session()->destroy();

            return redirect()
                ->to(base_url('admin/login'))
                ->with('error', 'Admin account not found.');
        }

        if (!password_verify($currentPassword, $user['password'])) {
            return redirect()
                ->back()
                ->with('error', 'Current password is incorrect.');
        }

        if (password_verify($newPassword, $user['password'])) {
            return redirect()
                ->back()
                ->with('error', 'New password must be different from your current password.');
        }

        $hashedPassword = password_hash(
            $newPassword,
            PASSWORD_DEFAULT
        );

        $userModel->update($user['id'], [
            'password' => $hashedPassword,
        ]);

        return redirect()
            ->to(base_url('admin/change-password'))
            ->with('success', 'Your password has been changed successfully.');
    }


    /**
     * Forgot Password
     */
    public function forgotPassword()
    {
        if (session()->get('is_admin_logged_in') === true) {
            return redirect()->to(base_url('admin'));
        }

        if (strtolower($this->request->getMethod()) !== 'post') {
            return view('auth/forgot_password');
        }

        $email = trim((string) $this->request->getPost('email'));

        if ($email === '') {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Please enter your email address.');
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Please enter a valid email address.');
        }

        $userModel = new User();

        $user = $userModel
            ->where('email', $email)
            ->where('role', 'admin')
            ->where('status', 1)
            ->first();

        if (!$user) {
            return redirect()
                ->to(base_url('admin/forgot-password'))
                ->with(
                    'success',
                    'If an account exists with this email, password reset instructions have been sent.'
                );
        }

        $resetToken = bin2hex(random_bytes(32));

        $resetExpiresAt = date(
            'Y-m-d H:i:s',
            time() + (30 * 60)
        );

        $userModel->update($user['id'], [
            'reset_token'      => $resetToken,
            'reset_expires_at' => $resetExpiresAt,
        ]);

        session()->set([
            'password_reset_email' => $user['email'],
            'password_reset_token' => $resetToken,
        ]);

        return redirect()
            ->to(base_url('admin/forgot-password'))
            ->with(
                'success',
                'Password reset request created successfully. The reset link will be available after email setup.'
            );
    }


    /**
     * Reset Password
     */
    public function resetPassword($token = null)
    {
        if ($token === null || $token === '') {
            return redirect()
                ->to(base_url('admin/forgot-password'))
                ->with('error', 'Invalid password reset link.');
        }

        $userModel = new User();

        $user = $userModel
            ->where('reset_token', $token)
            ->where('role', 'admin')
            ->where('status', 1)
            ->first();

        if (!$user) {
            return redirect()
                ->to(base_url('admin/forgot-password'))
                ->with(
                    'error',
                    'This password reset link is invalid or has already been used.'
                );
        }

        if (
            empty($user['reset_expires_at']) ||
            strtotime($user['reset_expires_at']) < time()
        ) {
            $userModel->update($user['id'], [
                'reset_token'      => null,
                'reset_expires_at' => null,
            ]);

            return redirect()
                ->to(base_url('admin/forgot-password'))
                ->with(
                    'error',
                    'This password reset link has expired. Please request a new one.'
                );
        }

        if (strtolower($this->request->getMethod()) !== 'post') {
            return view('auth/reset_password', [
                'token' => $token,
            ]);
        }

        $newPassword = (string) $this->request->getPost('new_password');
        $confirmPassword = (string) $this->request->getPost('confirm_password');

        if ($newPassword === '' || $confirmPassword === '') {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Please fill in both password fields.');
        }

        if (strlen($newPassword) < 8) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Password must be at least 8 characters long.');
        }

        if ($newPassword !== $confirmPassword) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'New password and confirm password do not match.');
        }

        if (password_verify($newPassword, $user['password'])) {
            return redirect()
                ->back()
                ->with(
                    'error',
                    'New password must be different from your previous password.'
                );
        }

        $hashedPassword = password_hash(
            $newPassword,
            PASSWORD_DEFAULT
        );

        $userModel->update($user['id'], [
            'password'         => $hashedPassword,
            'reset_token'      => null,
            'reset_expires_at' => null,
        ]);

        session()->remove([
            'password_reset_email',
            'password_reset_token',
        ]);

        return redirect()
            ->to(base_url('admin/login'))
            ->with(
                'success',
                'Your password has been reset successfully. You can now log in with your new password.'
            );
    }
/**
 * Attorneys List
 */
public function attorneys()
{
    if (session()->get('is_admin_logged_in') !== true) {
        return redirect()->to(base_url('admin/login'));
    }

    $attorneyModel = new Attorney();

    $attorneys = $attorneyModel
        ->orderBy('id', 'DESC')
        ->findAll();

    return view('dashboard/attorneys/index', [
        'attorneys' => $attorneys,
    ]);
}


/**
 * Add Attorney
 */
public function addAttorney()
{
    if (session()->get('is_admin_logged_in') !== true) {
        return redirect()->to(base_url('admin/login'));
    }

    if (strtolower($this->request->getMethod()) !== 'post') {
        return view('dashboard/attorneys/add');
    }

    $rules = [
        'name'           => 'required|min_length[2]|max_length[150]',
        'designation'   => 'required|max_length[150]',
        'specialization'=> 'required|max_length[255]',
        'bio'            => 'required|min_length[10]',
        'email'         => 'permit_empty|valid_email|max_length[150]',
        'phone'         => 'permit_empty|max_length[50]',
        'linkedin'      => 'permit_empty|max_length[255]',
    ];

    if (!$this->validate($rules)) {
        return redirect()
            ->back()
            ->withInput()
            ->with('errors', $this->validator->getErrors());
    }

    $attorneyModel = new Attorney();

    $name = trim((string) $this->request->getPost('name'));

    $slug = url_title($name, '-', true);

    $existing = $attorneyModel
        ->where('slug', $slug)
        ->first();

    if ($existing) {
        $slug .= '-' . time();
    }

    $imageName = null;

    $image = $this->request->getFile('image');

    if ($image && $image->isValid() && !$image->hasMoved()) {
        $uploadPath = FCPATH . 'uploads/attorneys';

        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        $imageName = $image->getRandomName();

        $image->move($uploadPath, $imageName);
    }

    $attorneyModel->insert([
        'name'           => $name,
        'slug'           => $slug,
        'designation'    => trim((string) $this->request->getPost('designation')),
        'specialization' => trim((string) $this->request->getPost('specialization')),
        'bio'            => trim((string) $this->request->getPost('bio')),
        'image'          => $imageName,
        'email'          => trim((string) $this->request->getPost('email')),
        'phone'          => trim((string) $this->request->getPost('phone')),
        'linkedin'       => trim((string) $this->request->getPost('linkedin')),
        'status'         => 1,
    ]);

    return redirect()
        ->to(base_url('admin/attorneys'))
        ->with('success', 'Attorney added successfully.');
}


/**
 * Edit Attorney
 */
public function editAttorney($id)
{
    if (session()->get('is_admin_logged_in') !== true) {
        return redirect()->to(base_url('admin/login'));
    }

    $attorneyModel = new Attorney();

    $attorney = $attorneyModel->find($id);

    if (!$attorney) {
        return redirect()
            ->to(base_url('admin/attorneys'))
            ->with('error', 'Attorney not found.');
    }

    if (strtolower($this->request->getMethod()) !== 'post') {
        return view('dashboard/attorneys/edit', [
            'attorney' => $attorney,
        ]);
    }

    $rules = [
        'name'            => 'required|min_length[2]|max_length[150]',
        'designation'     => 'required|max_length[150]',
        'specialization' => 'required|max_length[255]',
        'bio'             => 'required|min_length[10]',
        'email'           => 'permit_empty|valid_email|max_length[150]',
        'phone'           => 'permit_empty|max_length[50]',
        'linkedin'        => 'permit_empty|max_length[255]',
    ];

    if (!$this->validate($rules)) {
        return redirect()
            ->back()
            ->withInput()
            ->with('errors', $this->validator->getErrors());
    }

    $name = trim((string) $this->request->getPost('name'));

    $slug = url_title($name, '-', true);

    $existing = $attorneyModel
        ->where('slug', $slug)
        ->where('id !=', $id)
        ->first();

    if ($existing) {
        $slug .= '-' . time();
    }

    $data = [
        'name'           => $name,
        'slug'           => $slug,
        'designation'    => trim((string) $this->request->getPost('designation')),
        'specialization' => trim((string) $this->request->getPost('specialization')),
        'bio'            => trim((string) $this->request->getPost('bio')),
        'email'          => trim((string) $this->request->getPost('email')),
        'phone'          => trim((string) $this->request->getPost('phone')),
        'linkedin'       => trim((string) $this->request->getPost('linkedin')),
        'status'         => $this->request->getPost('status') ? 1 : 0,
    ];

    $image = $this->request->getFile('image');

    if ($image && $image->isValid() && !$image->hasMoved()) {
        $uploadPath = FCPATH . 'uploads/attorneys';

        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        if (!empty($attorney['image'])) {
            $oldImage = $uploadPath . DIRECTORY_SEPARATOR . $attorney['image'];

            if (is_file($oldImage)) {
                unlink($oldImage);
            }
        }

        $imageName = $image->getRandomName();

        $image->move($uploadPath, $imageName);

        $data['image'] = $imageName;
    }

    $attorneyModel->update($id, $data);

    return redirect()
        ->to(base_url('admin/attorneys'))
        ->with('success', 'Attorney updated successfully.');
}


/**
 * Delete Attorney
 */
public function deleteAttorney($id)
{
    if (session()->get('is_admin_logged_in') !== true) {
        return redirect()->to(base_url('admin/login'));
    }

    $attorneyModel = new Attorney();

    $attorney = $attorneyModel->find($id);

    if (!$attorney) {
        return redirect()
            ->to(base_url('admin/attorneys'))
            ->with('error', 'Attorney not found.');
    }

    if (!empty($attorney['image'])) {
        $imagePath = FCPATH . 'uploads/attorneys' . DIRECTORY_SEPARATOR . $attorney['image'];

        if (is_file($imagePath)) {
            unlink($imagePath);
        }
    }

    $attorneyModel->delete($id);

    return redirect()
        ->to(base_url('admin/attorneys'))
        ->with('success', 'Attorney deleted successfully.');
}


/**
 * Practice Areas List
 */
public function practiceAreas()
{
    if (session()->get('is_admin_logged_in') !== true) {
        return redirect()->to(base_url('admin/login'));
    }

    $practiceAreaModel = new PracticeArea();

    $practiceAreas = $practiceAreaModel
        ->orderBy('id', 'DESC')
        ->findAll();

    return view('dashboard/practice_areas/index', [
        'practiceAreas' => $practiceAreas,
    ]);
}


/**
 * Add Practice Area
 */
public function addPracticeArea()
{
    if (session()->get('is_admin_logged_in') !== true) {
        return redirect()->to(base_url('admin/login'));
    }

    if (strtolower($this->request->getMethod()) !== 'post') {
        return view('dashboard/practice_areas/add');
    }

    $rules = [
        'name'             => 'required|min_length[2]|max_length[150]',
        'short_description'=> 'permit_empty|max_length[500]',
        'description'      => 'required|min_length[10]',
        'icon'             => 'permit_empty|max_length[100]',
    ];

    if (!$this->validate($rules)) {
        return redirect()
            ->back()
            ->withInput()
            ->with('errors', $this->validator->getErrors());
    }

    $practiceAreaModel = new PracticeArea();

    $name = trim((string) $this->request->getPost('name'));

    $slug = url_title($name, '-', true);

    $existing = $practiceAreaModel
        ->where('slug', $slug)
        ->first();

    if ($existing) {
        $slug .= '-' . time();
    }

    $imageName = null;

    $image = $this->request->getFile('image');

    if ($image && $image->isValid() && !$image->hasMoved()) {
        $uploadPath = FCPATH . 'uploads/practice-areas';

        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        $imageName = $image->getRandomName();

        $image->move($uploadPath, $imageName);
    }

    $practiceAreaModel->insert([
        'name'              => $name,
        'slug'              => $slug,
        'short_description' => trim((string) $this->request->getPost('short_description')),
        'description'       => trim((string) $this->request->getPost('description')),
        'icon'              => trim((string) $this->request->getPost('icon')),
        'image'             => $imageName,
        'status'            => 1,
    ]);

    return redirect()
        ->to(base_url('admin/practice-areas'))
        ->with('success', 'Practice area added successfully.');
}


/**
 * Edit Practice Area
 */
public function editPracticeArea($id)
{
    if (session()->get('is_admin_logged_in') !== true) {
        return redirect()->to(base_url('admin/login'));
    }

    $practiceAreaModel = new PracticeArea();

    $practiceArea = $practiceAreaModel->find($id);

    if (!$practiceArea) {
        return redirect()
            ->to(base_url('admin/practice-areas'))
            ->with('error', 'Practice area not found.');
    }

    if (strtolower($this->request->getMethod()) !== 'post') {
        return view('dashboard/practice_areas/edit', [
            'practiceArea' => $practiceArea,
        ]);
    }

    $rules = [
        'name'              => 'required|min_length[2]|max_length[150]',
        'short_description' => 'permit_empty|max_length[500]',
        'description'       => 'required|min_length[10]',
        'icon'              => 'permit_empty|max_length[100]',
    ];

    if (!$this->validate($rules)) {
        return redirect()
            ->back()
            ->withInput()
            ->with('errors', $this->validator->getErrors());
    }

    $name = trim((string) $this->request->getPost('name'));

    $slug = url_title($name, '-', true);

    $existing = $practiceAreaModel
        ->where('slug', $slug)
        ->where('id !=', $id)
        ->first();

    if ($existing) {
        $slug .= '-' . time();
    }

    $data = [
        'name'              => $name,
        'slug'              => $slug,
        'short_description' => trim((string) $this->request->getPost('short_description')),
        'description'       => trim((string) $this->request->getPost('description')),
        'icon'              => trim((string) $this->request->getPost('icon')),
        'status'            => $this->request->getPost('status') ? 1 : 0,
    ];

    $image = $this->request->getFile('image');

    if ($image && $image->isValid() && !$image->hasMoved()) {
        $uploadPath = FCPATH . 'uploads/practice-areas';

        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        if (!empty($practiceArea['image'])) {
            $oldImage = $uploadPath . DIRECTORY_SEPARATOR . $practiceArea['image'];

            if (is_file($oldImage)) {
                unlink($oldImage);
            }
        }

        $imageName = $image->getRandomName();

        $image->move($uploadPath, $imageName);

        $data['image'] = $imageName;
    }

    $practiceAreaModel->update($id, $data);

    return redirect()
        ->to(base_url('admin/practice-areas'))
        ->with('success', 'Practice area updated successfully.');
}


/**
 * Delete Practice Area
 */
public function deletePracticeArea($id)
{
    if (session()->get('is_admin_logged_in') !== true) {
        return redirect()->to(base_url('admin/login'));
    }

    $practiceAreaModel = new PracticeArea();

    $practiceArea = $practiceAreaModel->find($id);

    if (!$practiceArea) {
        return redirect()
            ->to(base_url('admin/practice-areas'))
            ->with('error', 'Practice area not found.');
    }

    if (!empty($practiceArea['image'])) {
        $imagePath = FCPATH . 'uploads/practice-areas' . DIRECTORY_SEPARATOR . $practiceArea['image'];

        if (is_file($imagePath)) {
            unlink($imagePath);
        }
    }

    $practiceAreaModel->delete($id);

    return redirect()
        ->to(base_url('admin/practice-areas'))
        ->with('success', 'Practice area deleted successfully.');
}
/**
 * Blog Posts List
 */
public function posts()
{
    if (session()->get('is_admin_logged_in') !== true) {
        return redirect()->to(base_url('admin/login'));
    }

    $postModel = new Post();

    $posts = $postModel
        ->select('posts.*, categories.name as category_name')
        ->join('categories', 'categories.id = posts.category_id', 'left')
        ->orderBy('posts.id', 'DESC')
        ->findAll();

    return view('dashboard/posts/index', [
        'posts' => $posts,
    ]);
}


/**
 * Add Blog Post
 */
public function addPost()
{
    if (session()->get('is_admin_logged_in') !== true) {
        return redirect()->to(base_url('admin/login'));
    }

    $categoryModel = new Category();

    $categories = $categoryModel
        ->where('status', 1)
        ->orderBy('name', 'ASC')
        ->findAll();

    if (strtolower($this->request->getMethod()) !== 'post') {
        return view('dashboard/posts/add', [
            'categories' => $categories,
        ]);
    }

    $rules = [
        'category_id' => 'required|is_natural_no_zero',
        'title'      => 'required|min_length[3]|max_length[255]',
        'excerpt'    => 'permit_empty|max_length[2000]',
        'content'    => 'required|min_length[10]',
        'status'     => 'required|in_list[draft,published]',
    ];

    if (!$this->validate($rules)) {
        return redirect()
            ->back()
            ->withInput()
            ->with('errors', $this->validator->getErrors());
    }

    $postModel = new Post();

    $title = trim((string) $this->request->getPost('title'));

    $slug = url_title($title, '-', true);

    $existing = $postModel
        ->where('slug', $slug)
        ->first();

    if ($existing) {
        $slug .= '-' . time();
    }

    $featuredImage = null;

    $image = $this->request->getFile('featured_image');

    if ($image && $image->isValid() && !$image->hasMoved()) {
        $uploadPath = FCPATH . 'uploads/posts';

        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        $featuredImage = $image->getRandomName();

        $image->move($uploadPath, $featuredImage);
    }

    $status = $this->request->getPost('status');

    $publishedAt = null;

    if ($status === 'published') {
        $publishedAt = date('Y-m-d H:i:s');
    }

    $postModel->insert([
        'category_id'    => (int) $this->request->getPost('category_id'),
        'author_id'      => session()->get('admin_id'),
        'title'          => $title,
        'slug'           => $slug,
        'excerpt'        => trim((string) $this->request->getPost('excerpt')),
        'content'        => trim((string) $this->request->getPost('content')),
        'featured_image' => $featuredImage,
        'status'         => $status,
        'published_at'   => $publishedAt,
        'views'          => 0,
    ]);

    return redirect()
        ->to(base_url('admin/posts'))
        ->with('success', 'Blog post added successfully.');
}


/**
 * Edit Blog Post
 */
public function editPost($id)
{
    if (session()->get('is_admin_logged_in') !== true) {
        return redirect()->to(base_url('admin/login'));
    }

    $postModel = new Post();

    $post = $postModel->find($id);

    if (!$post) {
        return redirect()
            ->to(base_url('admin/posts'))
            ->with('error', 'Blog post not found.');
    }

    $categoryModel = new Category();

    $categories = $categoryModel
        ->where('status', 1)
        ->orderBy('name', 'ASC')
        ->findAll();

    if (strtolower($this->request->getMethod()) !== 'post') {
        return view('dashboard/posts/edit', [
            'post'       => $post,
            'categories' => $categories,
        ]);
    }

    $rules = [
        'category_id' => 'required|is_natural_no_zero',
        'title'      => 'required|min_length[3]|max_length[255]',
        'excerpt'    => 'permit_empty|max_length[2000]',
        'content'    => 'required|min_length[10]',
        'status'     => 'required|in_list[draft,published]',
    ];

    if (!$this->validate($rules)) {
        return redirect()
            ->back()
            ->withInput()
            ->with('errors', $this->validator->getErrors());
    }

    $title = trim((string) $this->request->getPost('title'));

    $slug = url_title($title, '-', true);

    $existing = $postModel
        ->where('slug', $slug)
        ->where('id !=', $id)
        ->first();

    if ($existing) {
        $slug .= '-' . time();
    }

    $status = $this->request->getPost('status');

    $publishedAt = $post['published_at'];

    if ($status === 'published' && empty($publishedAt)) {
        $publishedAt = date('Y-m-d H:i:s');
    }

    if ($status === 'draft') {
        $publishedAt = null;
    }

    $data = [
        'category_id' => (int) $this->request->getPost('category_id'),
        'title'       => $title,
        'slug'        => $slug,
        'excerpt'     => trim((string) $this->request->getPost('excerpt')),
        'content'     => trim((string) $this->request->getPost('content')),
        'status'      => $status,
        'published_at'=> $publishedAt,
    ];

    $image = $this->request->getFile('featured_image');

    if ($image && $image->isValid() && !$image->hasMoved()) {
        $uploadPath = FCPATH . 'uploads/posts';

        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        if (!empty($post['featured_image'])) {
            $oldImage = $uploadPath . DIRECTORY_SEPARATOR . $post['featured_image'];

            if (is_file($oldImage)) {
                unlink($oldImage);
            }
        }

        $imageName = $image->getRandomName();

        $image->move($uploadPath, $imageName);

        $data['featured_image'] = $imageName;
    }

    $postModel->update($id, $data);

    return redirect()
        ->to(base_url('admin/posts'))
        ->with('success', 'Blog post updated successfully.');
}


/**
 * Delete Blog Post
 */
public function deletePost($id)
{
    if (session()->get('is_admin_logged_in') !== true) {
        return redirect()->to(base_url('admin/login'));
    }

    $postModel = new Post();

    $post = $postModel->find($id);

    if (!$post) {
        return redirect()
            ->to(base_url('admin/posts'))
            ->with('error', 'Blog post not found.');
    }

    if (!empty($post['featured_image'])) {
        $imagePath = FCPATH . 'uploads/posts' . DIRECTORY_SEPARATOR . $post['featured_image'];

        if (is_file($imagePath)) {
            unlink($imagePath);
        }
    }

    $postModel->delete($id);

    return redirect()
        ->to(base_url('admin/posts'))
        ->with('success', 'Blog post deleted successfully.');
}


/**
 * Consultation Requests List
 */
public function consultations()
{
    if (session()->get('is_admin_logged_in') !== true) {
        return redirect()->to(base_url('admin/login'));
    }

    $consultationModel = new Consultation();

    $search = trim((string) $this->request->getGet('search'));
    $status = trim((string) $this->request->getGet('status'));

    $builder = $consultationModel;

    if ($search !== '') {
        $builder = $builder
            ->groupStart()
            ->like('name', $search)
            ->orLike('email', $search)
            ->orLike('phone', $search)
            ->orLike('case_type', $search)
            ->orLike('message', $search)
            ->groupEnd();
    }

    if ($status !== '') {
        $builder = $builder->where('status', $status);
    }

    $consultations = $builder
        ->orderBy('created_at', 'DESC')
        ->findAll();

    return view('dashboard/consultations/index', [
        'consultations' => $consultations,
        'search'        => $search,
        'status'        => $status,
    ]);
}


/**
 * View Consultation
 */
public function viewConsultation($id)
{
    if (session()->get('is_admin_logged_in') !== true) {
        return redirect()->to(base_url('admin/login'));
    }

    $consultationModel = new Consultation();

    $consultation = $consultationModel->find($id);

    if (!$consultation) {
        return redirect()
            ->to(base_url('admin/consultations'))
            ->with('error', 'Consultation request not found.');
    }

    return view('dashboard/view_consultation', [
        'consultation' => $consultation,
    ]);
}


/**
 * Update Consultation Status
 */
public function updateConsultationStatus($id)
{
    if (session()->get('is_admin_logged_in') !== true) {
        return redirect()->to(base_url('admin/login'));
    }

    $newStatus = trim((string) $this->request->getPost('status'));

    $allowedStatuses = [
        'pending',
        'approved',
        'rejected',
        'completed',
    ];

    if (!in_array($newStatus, $allowedStatuses, true)) {
        return redirect()
            ->back()
            ->with('error', 'Invalid consultation status selected.');
    }

    $consultationModel = new Consultation();

    $consultation = $consultationModel->find($id);

    if (!$consultation) {
        return redirect()
            ->to(base_url('admin/consultations'))
            ->with('error', 'Consultation request not found.');
    }

    $consultationModel->update($id, [
        'status' => $newStatus,
    ]);

    return redirect()
        ->back()
        ->with('success', 'Consultation status updated successfully.');
}


/**
 * Delete Consultation
 */
public function deleteConsultation($id)
{
    if (session()->get('is_admin_logged_in') !== true) {
        return redirect()->to(base_url('admin/login'));
    }

    $consultationModel = new Consultation();

    $consultation = $consultationModel->find($id);

    if (!$consultation) {
        return redirect()
            ->to(base_url('admin/consultations'))
            ->with('error', 'Consultation request not found.');
    }

    $consultationModel->delete($id);

    return redirect()
        ->to(base_url('admin/consultations'))
        ->with('success', 'Consultation request deleted successfully.');
}

}
