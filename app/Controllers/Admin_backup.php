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
    public function login()
    {
        // Agar admin already logged in hai
        if (session()->get('is_admin_logged_in') === true) {
            return redirect()->to(base_url('admin'));
        }

        // GET request par login page show karein
        if (strtolower($this->request->getMethod()) !== 'post') {
            return view('auth/login');
        }

        $email = trim((string) $this->request->getPost('email'));
        $password = (string) $this->request->getPost('password');

        // Empty fields check
        if ($email === '' || $password === '') {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Please enter your email and password.');
        }

        $userModel = new User();

        // Email se user find karein
        $user = $userModel
            ->where('email', $email)
            ->first();

        // User/admin verification
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

        // Session regenerate for security
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

    ()
    {
        /public function index/ Login check
        if (session()->get('is_admin_logged_in') !== true) {
            return redirect()->to(base_url('admin/login'));
        }

        $contactModel = new Contact();

        $search = trim((string) $this->request->getGet('search'));
        $status = trim((string) $this->request->getGet('status'));

        $builder = $contactModel;

        // Search
        if ($search !== '') {
            $builder = $builder
                ->groupStart()
                ->like('name', $search)
                ->orLike('email', $search)
                ->orLike('subject', $search)
                ->orLike('message', $search)
                ->groupEnd();
        }

        // Status filter
        if ($status !== '') {
            $builder = $builder->where('status', $status);
        }

        $contacts = $builder
            ->orderBy('created_at', 'DESC')
            ->findAll();

        dashboard', [
            'contacts' => $contacts,
            'search'   => $search,
            'status'   => $status,
        ]);
    }

    public function viewContact($id)
    {
        // Login check
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

        o(base_url('admin/login'));
        }return view('dashboareturn view('dashboard/rd/view_contact', [
            'contact' => $contact,
        ]);
    }

    public function deleteContact($id)
    {
        // Login check
        if (session()->get('is_admin_logged_in') !== true) {
            return redirect()->t

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

    public function updateStatus($id)
    {
        // Login check
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

    public function changePassword()
    {
        // Login check
        if (session()->get('is_admin_logged_in') !== true) {
            return redirect()->to(base_url('admin/login'));
        }

        // GET request par page show karein
        if (strtolower($this->request->getMethod()) !== 'post') {
            return view('dashboard/change_password', [
                'title' => 'Change Password',
            ]);
        }

        $currentPassword = (string) $this->request->getPost('current_password');
        $newPassword = (string) $this->request->getPost('new_password');
        $confirmPassword = (string) $this->request->getPost('confirm_password');

        // Check empty fields
        if ($currentPassword === '' || $newPassword === '' || $confirmPassword === '') {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Please fill in all password fields.');
        }

        // Check new password length
        if (strlen($newPassword) < 8) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'New password must be at least 8 characters long.');
        }

        // Check password confirmation
        if ($newPassword !== $confirmPassword) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'New password and confirm password do not match.');
        }

        // Get logged-in admin
        $userModel = new User();

        $user = $userModel->find(session()->get('admin_id'));

        if (!$user) {
            session()->destroy();

            return redirect()
                ->to(base_url('admin/login'))
                ->with('error', 'Admin account not found.');
        }

        // Verify current password
        if (!password_verify($currentPassword, $user['password'])) {
            return redirect()
                ->back()
                ->with('error', 'Current password is incorrect.');
        }

        // Prevent using same password
        if (password_verify($newPassword, $user['password'])) {
            return redirect()
                ->back()
                ->with('error', 'New password must be different from your current password.');
        }

        // Hash new password
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // Update password
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
        // Agar admin already logged in hai
        if (session()->get('is_admin_logged_in') === true) {
            return redirect()->to(base_url('admin'));
        }

        // GET request par forgot password page show karein
        if (strtolower($this->request->getMethod()) !== 'post') {
            return view('auth/forgot_password');
        }

        $email = trim((string) $this->request->getPost('email'));

        // Empty email
        if ($email === '') {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Please enter your email address.');
        }

        // Basic email validation
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Please enter a valid email address.');
        }

        $userModel = new User();

        // Admin user find karein
        $user = $userModel
            ->where('email', $email)
            ->where('role', 'admin')
            ->where('status', 1)
            ->first();

        /*
         * Security:
         * Agar email database mein nahi hai tab bhi
         * same generic message show hoga.
         */
        if (!$user) {
            return redirect()
                ->to(base_url('admin/forgot-password'))
                ->with(
                    'success',
                    'If an account exists with this email, password reset instructions have been sent.'
                );
        }

        // Secure random token
        $resetToken = bin2hex(random_bytes(32));

        // Token expiry: 30 minutes
        $resetExpiresAt = date('Y-m-d H:i:s', time() + (30 * 60));

        // Token database mein save karein
        $userModel->update($user['id'], [
            'reset_token'      => $resetToken,
            'reset_expires_at' => $resetExpiresAt,
        ]);

        /*
         * Abhi hum email sending next step mein add karenge.
         *
         * Development/testing ke liye token session mein temporarily
         * save kar rahe hain.
         */
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
    public function resetPassword($token = null)
{
    // Token missing ho
    if ($token === null || $token === '') {
        return redirect()
            ->to(base_url('admin/forgot-password'))
            ->with('error', 'Invalid password reset link.');
    }

    $userModel = new User();

    // Token ke through admin find karein
    $user = $userModel
        ->where('reset_token', $token)
        ->where('role', 'admin')
        ->where('status', 1)
        ->first();

    // User/token nahi mila
    if (!$user) {
        return redirect()
            ->to(base_url('admin/forgot-password'))
            ->with('error', 'This password reset link is invalid or has already been used.');
    }

    // Expiry check
    if (
        empty($user['reset_expires_at']) ||
        strtotime($user['reset_expires_at']) < time()
    ) {
        // Expired token ko clear karein
        $userModel->update($user['id'], [
            'reset_token'      => null,
            'reset_expires_at' => null,
        ]);

        return redirect()
            ->to(base_url('admin/forgot-password'))
            ->with('error', 'This password reset link has expired. Please request a new one.');
    }

    // GET request par reset password page show karein
    if (strtolower($this->request->getMethod()) !== 'post') {
        return view('auth/reset_password', [
            'token' => $token,
        ]);
    }

    $newPassword = (string) $this->request->getPost('new_password');
    $confirmPassword = (string) $this->request->getPost('confirm_password');

    // Empty fields
    if ($newPassword === '' || $confirmPassword === '') {
        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Please fill in both password fields.');
    }

    // Password length
    if (strlen($newPassword) < 8) {
        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Password must be at least 8 characters long.');
    }

    // Password confirmation
    if ($newPassword !== $confirmPassword) {
        return redirect()
            ->back()
            ->with('error', 'New password and confirm password do not match.');
    }

    // New password current password jaisa na ho
    if (password_verify($newPassword, $user['password'])) {
        return redirect()
            ->back()
            ->with('error', 'New password must be different from your previous password.');
    }

    // New password hash
    $hashedPassword = password_hash(
        $newPassword,
        PASSWORD_DEFAULT
    );

    // Password update + reset token clear
    $userModel->update($user['id'], [
        'password'         => $hashedPassword,
        'reset_token'      => null,
        'reset_expires_at' => null,
    ]);

    // Old reset session data bhi clear
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

        $search = trim((string) $this->request->getGet('search'));
        $status = trim((string) $this->request->getGet('status'));

        $builder = $attorneyModel;

        if ($search !== '') {
            $builder = $builder
                ->groupStart()
                ->like('name', $search)
                ->orLike('designation', $search)
                ->orLike('specialization', $search)
                ->orLike('email', $search)
                ->groupEnd();
        }

        if ($status !== '') {
            $builder = $builder->where('status', $status);
        }

        $attorneys = $builder
            ->orderBy('id', 'DESC')
            ->findAll();

        return view('dashboard/attorneys/index', [
            'attorneys' => $attorneys,
            'search'    => $search,
            'status'    => $status,
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
            return view('dashboard/add_attorney', [
                'title' => 'Add Attorney',
            ]);
        }

        $name = trim((string) $this->request->getPost('name'));
        $designation = trim((string) $this->request->getPost('designation'));
        $specialization = trim((string) $this->request->getPost('specialization'));
        $bio = trim((string) $this->request->getPost('bio'));
        $email = trim((string) $this->request->getPost('email'));
        $phone = trim((string) $this->request->getPost('phone'));
        $linkedin = trim((string) $this->request->getPost('linkedin'));
        $status = (int) $this->request->getPost('status');

        if ($name === '') {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Attorney name is required.');
        }

        if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Please enter a valid email address.');
        }

        if (!in_array($status, [0, 1], true)) {
            $status = 1;
        }

        // Slug generate karein
        $slug = url_title($name, '-', true);

        $attorneyModel = new Attorney();

        // Duplicate slug handle karein
        $originalSlug = $slug;
        $counter = 1;

        while ($attorneyModel->where('slug', $slug)->first()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        // Image upload
        $imageName = null;

        $image = $this->request->getFile('image');

        if ($image && $image->isValid() && !$image->hasMoved()) {
            $allowedTypes = [
                'image/jpeg',
                'image/png',
                'image/webp',
            ];

            if (!in_array($image->getMimeType(), $allowedTypes, true)) {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with('error', 'Only JPG, PNG and WEBP images are allowed.');
            }

            if ($image->getSize() > 2 * 1024 * 1024) {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with('error', 'Image size must not exceed 2MB.');
            }

            $imageName = $image->getRandomName();

            $image->move(
                FCPATH . 'uploads/attorneys',
                $imageName
            );
        }

        $attorneyModel->insert([
            'name'            => $name,
            'slug'            => $slug,
            'designation'     => $designation !== '' ? $designation : null,
            'specialization'  => $specialization !== '' ? $specialization : null,
            'bio'             => $bio !== '' ? $bio : null,
            'image'           => $imageName,
            'email'           => $email !== '' ? $email : null,
            'phone'           => $phone !== '' ? $phone : null,
            'linkedin'        => $linkedin !== '' ? $linkedin : null,
            'status'          => $status,
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
            return view('dashboard/edit_attorney', [
                'title'    => 'Edit Attorney',
                'attorney' => $attorney,
            ]);
        }

        $name = trim((string) $this->request->getPost('name'));
        $designation = trim((string) $this->request->getPost('designation'));
        $specialization = trim((string) $this->request->getPost('specialization'));
        $bio = trim((string) $this->request->getPost('bio'));
        $email = trim((string) $this->request->getPost('email'));
        $phone = trim((string) $this->request->getPost('phone'));
        $linkedin = trim((string) $this->request->getPost('linkedin'));
        $status = (int) $this->request->getPost('status');

        if ($name === '') {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Attorney name is required.');
        }

        if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Please enter a valid email address.');
        }

        if (!in_array($status, [0, 1], true)) {
            $status = 1;
        }

        // Slug generate karein
        $slug = url_title($name, '-', true);

        // Duplicate slug check
        $originalSlug = $slug;
        $counter = 1;

        while (true) {
            $existing = $attorneyModel
                ->where('slug', $slug)
                ->where('id !=', $id)
                ->first();

            if (!$existing) {
                break;
            }

            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        // Existing image
        $imageName = $attorney['image'];

        // New image upload
        $image = $this->request->getFile('image');

        if ($image && $image->isValid() && !$image->hasMoved()) {
            $allowedTypes = [
                'image/jpeg',
                'image/png',
                'image/webp',
            ];

            if (!in_array($image->getMimeType(), $allowedTypes, true)) {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with('error', 'Only JPG, PNG and WEBP images are allowed.');
            }

            if ($image->getSize() > 2 * 1024 * 1024) {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with('error', 'Image size must not exceed 2MB.');
            }

            $newImageName = $image->getRandomName();

            $image->move(
                FCPATH . 'uploads/attorneys',
                $newImageName
            );

            // Old image delete karein
            if (
                !empty($attorney['image']) &&
                is_file(FCPATH . 'uploads/attorneys/' . $attorney['image'])
            ) {
                unlink(FCPATH . 'uploads/attorneys/' . $attorney['image']);
            }

            $imageName = $newImageName;
        }

        $attorneyModel->update($id, [
            'name'           => $name,
            'slug'           => $slug,
            'designation'    => $designation !== '' ? $designation : null,
            'specialization' => $specialization !== '' ? $specialization : null,
            'bio'            => $bio !== '' ? $bio : null,
            'image'          => $imageName,
            'email'          => $email !== '' ? $email : null,
            'phone'          => $phone !== '' ? $phone : null,
            'linkedin'       => $linkedin !== '' ? $linkedin : null,
            'status'         => $status,
        ]);

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

        // Attorney image delete karein
        if (
            !empty($attorney['image']) &&
            is_file(FCPATH . 'uploads/attorneys/' . $attorney['image'])
        ) {
            unlink(FCPATH . 'uploads/attorneys/' . $attorney['image']);
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

        $search = trim((string) $this->request->getGet('search'));
        $status = trim((string) $this->request->getGet('status'));

        $builder = $practiceAreaModel;

        if ($search !== '') {
            $builder = $builder
                ->groupStart()
                ->like('name', $search)
                ->orLike('short_description', $search)
                ->orLike('description', $search)
                ->groupEnd();
        }

        if ($status !== '') {
            $builder = $builder->where('status', $status);
        }

        $practiceAreas = $builder
            ->orderBy('id', 'DESC')
            ->findAll();

        return view('dashboard/practice_areas/index', [
            'practiceAreas' => $practiceAreas,
            'search'        => $search,
            'status'        => $status,
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
        return view('dashboard/add_practice_area', [
            'title' => 'Add Practice Area',
        ]);
    }

    $name = trim((string) $this->request->getPost('name'));
    $shortDescription = trim((string) $this->request->getPost('short_description'));
    $description = trim((string) $this->request->getPost('description'));
    $icon = trim((string) $this->request->getPost('icon'));
    $status = (int) $this->request->getPost('status');

    if ($name === '') {
        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Practice area name is required.');
    }

    if (!in_array($status, [0, 1], true)) {
        $status = 1;
    }

    $slug = url_title($name, '-', true);

    $practiceAreaModel = new PracticeArea();

    $originalSlug = $slug;
    $counter = 1;

    while ($practiceAreaModel->where('slug', $slug)->first()) {
        $slug = $originalSlug . '-' . $counter;
        $counter++;
    }

    $imageName = null;

    $image = $this->request->getFile('image');

    if ($image && $image->isValid() && !$image->hasMoved()) {

        $allowedTypes = [
            'image/jpeg',
            'image/png',
            'image/webp',
        ];

        if (!in_array($image->getMimeType(), $allowedTypes, true)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Only JPG, PNG and WEBP images are allowed.');
        }

        if ($image->getSize() > 2 * 1024 * 1024) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Image size must not exceed 2MB.');
        }

        $imageName = $image->getRandomName();

        $image->move(
            FCPATH . 'uploads/practice-areas',
            $imageName
        );
    }

    $practiceAreaModel->insert([
        'name'              => $name,
        'slug'              => $slug,
        'short_description' => $shortDescription !== '' ? $shortDescription : null,
        'description'       => $description !== '' ? $description : null,
        'icon'              => $icon !== '' ? $icon : null,
        'image'             => $imageName,
        'status'            => $status,
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
        return view('dashboard/edit_practice_area', [
            'title'        => 'Edit Practice Area',
            'practiceArea' => $practiceArea,
        ]);
    }

    $name = trim((string) $this->request->getPost('name'));
    $shortDescription = trim((string) $this->request->getPost('short_description'));
    $description = trim((string) $this->request->getPost('description'));
    $icon = trim((string) $this->request->getPost('icon'));
    $status = (int) $this->request->getPost('status');

    if ($name === '') {
        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Practice area name is required.');
    }

    if (!in_array($status, [0, 1], true)) {
        $status = 1;
    }

    $slug = url_title($name, '-', true);

    $originalSlug = $slug;
    $counter = 1;

    while (true) {
        $existing = $practiceAreaModel
            ->where('slug', $slug)
            ->where('id !=', $id)
            ->first();

        if (!$existing) {
            break;
        }

        $slug = $originalSlug . '-' . $counter;
        $counter++;
    }

    $imageName = $practiceArea['image'];

    $image = $this->request->getFile('image');

    if ($image && $image->isValid() && !$image->hasMoved()) {

        $allowedTypes = [
            'image/jpeg',
            'image/png',
            'image/webp',
        ];

        if (!in_array($image->getMimeType(), $allowedTypes, true)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Only JPG, PNG and WEBP images are allowed.');
        }

        if ($image->getSize() > 2 * 1024 * 1024) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Image size must not exceed 2MB.');
        }

        $newImageName = $image->getRandomName();

        $image->move(
            FCPATH . 'uploads/practice-areas',
            $newImageName
        );

        if (
            !empty($practiceArea['image']) &&
            is_file(FCPATH . 'uploads/practice-areas/' . $practiceArea['image'])
        ) {
            unlink(FCPATH . 'uploads/practice-areas/' . $practiceArea['image']);
        }

        $imageName = $newImageName;
    }

    $practiceAreaModel->update($id, [
        'name'              => $name,
        'slug'              => $slug,
        'short_description' => $shortDescription !== '' ? $shortDescription : null,
        'description'       => $description !== '' ? $description : null,
        'icon'              => $icon !== '' ? $icon : null,
        'image'             => $imageName,
        'status'            => $status,
    ]);

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

    if (
        !empty($practiceArea['image']) &&
        is_file(FCPATH . 'uploads/practice-areas/' . $practiceArea['image'])
    ) {
        unlink(FCPATH . 'uploads/practice-areas/' . $practiceArea['image']);
    }

    $practiceAreaModel->delete($id);

    return redirect()
        ->to(base_url('admin/practice-areas'))
        ->with('success', 'Practice area deleted successfully.');
}
public function posts()
{
    if (session()->get('is_admin_logged_in') !== true) {
        return redirect()->to(base_url('admin/login'));
    }

    $postModel = new Post();
    $categoryModel = new Category();

    $search = trim((string) $this->request->getGet('search'));
    $status = trim((string) $this->request->getGet('status'));
    $categoryId = trim((string) $this->request->getGet('category'));

    $builder = $postModel
        ->select('posts.*, categories.name AS category_name')
        ->join('categories', 'categories.id = posts.category_id', 'left');

    if ($search !== '') {
        $builder = $builder
            ->groupStart()
            ->like('posts.title', $search)
            ->orLike('posts.excerpt', $search)
            ->groupEnd();
    }

    if ($status !== '') {
        $builder = $builder->where('posts.status', $status);
    }

    if ($categoryId !== '') {
        $builder = $builder->where('posts.category_id', (int) $categoryId);
    }

    $posts = $builder
        ->orderBy('posts.id', 'DESC')
        ->findAll();

    $categories = $categoryModel
        ->where('status', 1)
        ->orderBy('name', 'ASC')
        ->findAll();

    return view('dashboard/posts/index', [
        'posts'      => $posts,
        'categories' => $categories,
        'search'     => $search,
        'status'     => $status,
        'categoryId' => $categoryId,
    ]);
}
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
        return view('dashboard/add_post', [
            'title'      => 'Add Blog Post',
            'categories' => $categories,
        ]);
    }

    $categoryId = (int) $this->request->getPost('category_id');
    $title = trim((string) $this->request->getPost('title'));
    $excerpt = trim((string) $this->request->getPost('excerpt'));
    $content = trim((string) $this->request->getPost('content'));
    $status = trim((string) $this->request->getPost('status'));

    if ($categoryId <= 0) {
        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Please select a category.');
    }

    $category = $categoryModel->find($categoryId);

    if (!$category || (int) $category['status'] !== 1) {
        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Selected category is not available.');
    }

    if ($title === '') {
        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Post title is required.');
    }

    if ($content === '') {
        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Post content is required.');
    }

    if (!in_array($status, ['draft', 'published'], true)) {
        $status = 'draft';
    }

    $slug = url_title($title, '-', true);

    if ($slug === '') {
        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Please enter a valid post title.');
    }

    $postModel = new Post();

    $originalSlug = $slug;
    $counter = 1;

    while ($postModel->where('slug', $slug)->first()) {
        $slug = $originalSlug . '-' . $counter;
        $counter++;
    }

    $imageName = null;

    $image = $this->request->getFile('featured_image');

    if ($image && $image->isValid() && !$image->hasMoved()) {

        $allowedTypes = [
            'image/jpeg',
            'image/png',
            'image/webp',
        ];

        if (!in_array($image->getMimeType(), $allowedTypes, true)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Only JPG, PNG and WEBP images are allowed.');
        }

        if ($image->getSize() > 2 * 1024 * 1024) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Featured image must not exceed 2MB.');
        }

        $uploadPath = FCPATH . 'uploads/posts';

        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        $imageName = $image->getRandomName();

        $image->move($uploadPath, $imageName);
    }

    $authorId = session()->get('admin_id');

    if (!$authorId) {
        $adminEmail = session()->get('admin_email');

        if ($adminEmail) {
            $userModel = new User();
            $admin = $userModel
                ->where('email', $adminEmail)
                ->where('role', 'admin')
                ->first();

            if ($admin) {
                $authorId = $admin['id'];
            }
        }
    }

    $publishedAt = null;

    if ($status === 'published') {
        $publishedAt = date('Y-m-d H:i:s');
    }

    $postModel->insert([
        'category_id'    => $categoryId,
        'author_id'      => $authorId ? (int) $authorId : null,
        'title'          => $title,
        'slug'           => $slug,
        'excerpt'        => $excerpt !== '' ? $excerpt : null,
        'content'        => $content,
        'featured_image' => $imageName,
        'status'         => $status,
        'published_at'   => $publishedAt,
        'views'          => 0,
    ]);

    return redirect()
        ->to(base_url('admin/posts'))
        ->with('success', 'Blog post added successfully.');
}
public function editPost($id)
{
    if (session()->get('is_admin_logged_in') !== true) {
        return redirect()->to(base_url('admin/login'));
    }

    $postModel = new Post();
    $categoryModel = new Category();

    $post = $postModel->find($id);

    if (!$post) {
        return redirect()
            ->to(base_url('admin/posts'))
            ->with('error', 'Blog post not found.');
    }

    $categories = $categoryModel
        ->where('status', 1)
        ->orderBy('name', 'ASC')
        ->findAll();

    if (strtolower($this->request->getMethod()) !== 'post') {
        return view('dashboard/edit_post', [
            'title'      => 'Edit Blog Post',
            'post'       => $post,
            'categories' => $categories,
        ]);
    }

    $categoryId = (int) $this->request->getPost('category_id');
    $title = trim((string) $this->request->getPost('title'));
    $excerpt = trim((string) $this->request->getPost('excerpt'));
    $content = trim((string) $this->request->getPost('content'));
    $status = trim((string) $this->request->getPost('status'));

    if ($categoryId <= 0) {
        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Please select a category.');
    }

    $category = $categoryModel->find($categoryId);

    if (!$category || (int) $category['status'] !== 1) {
        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Selected category is not available.');
    }

    if ($title === '') {
        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Post title is required.');
    }

    if ($content === '') {
        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Post content is required.');
    }

    if (!in_array($status, ['draft', 'published'], true)) {
        $status = 'draft';
    }

    $slug = url_title($title, '-', true);

    if ($slug === '') {
        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Please enter a valid post title.');
    }

    $originalSlug = $slug;
    $counter = 1;

    while (
        $existingPost = $postModel
            ->where('slug', $slug)
            ->where('id !=', $id)
            ->first()
    ) {
        $slug = $originalSlug . '-' . $counter;
        $counter++;
    }

    $imageName = $post['featured_image'] ?? null;

    $image = $this->request->getFile('featured_image');

    if ($image && $image->isValid() && !$image->hasMoved()) {

        $allowedTypes = [
            'image/jpeg',
            'image/png',
            'image/webp',
        ];

        if (!in_array($image->getMimeType(), $allowedTypes, true)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Only JPG, PNG and WEBP images are allowed.');
        }

        if ($image->getSize() > 2 * 1024 * 1024) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Featured image must not exceed 2MB.');
        }

        $uploadPath = FCPATH . 'uploads/posts';

        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        $newImageName = $image->getRandomName();

        $image->move($uploadPath, $newImageName);

        if (
            !empty($post['featured_image']) &&
            file_exists($uploadPath . '/' . $post['featured_image'])
        ) {
            unlink($uploadPath . '/' . $post['featured_image']);
        }

        $imageName = $newImageName;
    }

    $publishedAt = $post['published_at'] ?? null;

    if ($status === 'published' && empty($publishedAt)) {
        $publishedAt = date('Y-m-d H:i:s');
    }

    if ($status === 'draft') {
        $publishedAt = null;
    }

    $postModel->update($id, [
        'category_id'    => $categoryId,
        'title'          => $title,
        'slug'           => $slug,
        'excerpt'        => $excerpt !== '' ? $excerpt : null,
        'content'        => $content,
        'featured_image' => $imageName,
        'status'         => $status,
        'published_at'   => $publishedAt,
    ]);

    return redirect()
        ->to(base_url('admin/posts'))
        ->with('success', 'Blog post updated successfully.');
}
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

        $imagePath = FCPATH . 'uploads/posts/' . $post['featured_image'];

        if (file_exists($imagePath)) {
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