<?php

namespace App\Controllers;

use App\Models\Contact;
use App\Models\Post;
use App\Models\Category;
use App\Models\PracticeArea;
use App\Models\Attorney;
use App\Models\Consultation;

class Home extends BaseController
{
public function index()
{
    $practiceAreaModel = new PracticeArea();
    $attorneyModel = new Attorney();
    $postModel = new Post();

    $practiceAreas = $practiceAreaModel
        ->where('status', 1)
        ->orderBy('name', 'ASC')
        ->findAll();

    $attorneys = $attorneyModel
        ->where('status', 1)
        ->orderBy('name', 'ASC')
        ->findAll();

    $latestPosts = $postModel
        ->select('posts.*, categories.name AS category_name')
        ->join(
            'categories',
            'categories.id = posts.category_id',
            'left'
        )
        ->where('posts.status', 'published')
        ->orderBy('posts.published_at', 'DESC')
        ->findAll(3);

    return view('pages/home', [
        'practiceAreas' => $practiceAreas,
        'attorneys'     => $attorneys,
        'latestPosts'   => $latestPosts,
    ]);
}
    public function about()
    {
        return view('pages/about');
    }

    public function practiceAreas()
    {
        $practiceAreaModel = new PracticeArea();

        $practiceAreas = $practiceAreaModel
            ->where('status', 1)
            ->orderBy('name', 'ASC')
            ->findAll();

        return view('pages/practice_areas', [
            'practiceAreas' => $practiceAreas,
        ]);
    }

    public function practiceAreaDetail($slug)
    {
        $practiceAreaModel = new PracticeArea();

        $practiceArea = $practiceAreaModel
            ->where('slug', $slug)
            ->where('status', 1)
            ->first();

        if (!$practiceArea) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Practice area not found.'
            );
        }

        return view('pages/practice_area_detail', [
            'practiceArea' => $practiceArea,
        ]);
    }

    public function attorneys()
    {
        $attorneyModel = new Attorney();

        $attorneys = $attorneyModel
            ->where('status', 1)
            ->orderBy('name', 'ASC')
            ->findAll();

        return view('pages/attorneys', [
            'attorneys' => $attorneys,
        ]);
    }

    public function attorneyDetail($slug)
    {
        $attorneyModel = new Attorney();

        $attorney = $attorneyModel
            ->where('slug', $slug)
            ->where('status', 1)
            ->first();

        if (!$attorney) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Attorney not found.'
            );
        }

        return view('pages/attorney_detail', [
            'attorney' => $attorney,
        ]);
    }

    public function blog()
    {
        $postModel = new Post();
        $categoryModel = new Category();

        $posts = $postModel
            ->select('posts.*, categories.name AS category_name')
            ->join(
                'categories',
                'categories.id = posts.category_id',
                'left'
            )
            ->where('posts.status', 'published')
            ->orderBy('posts.published_at', 'DESC')
            ->findAll();

        $categories = $categoryModel
            ->where('status', 1)
            ->orderBy('name', 'ASC')
            ->findAll();

        return view('pages/blog', [
            'posts' => $posts,
            'categories' => $categories,
        ]);
    }

    public function blogDetail($slug)
    {
        $postModel = new Post();

        $post = $postModel
            ->select('posts.*, categories.name AS category_name')
            ->join(
                'categories',
                'categories.id = posts.category_id',
                'left'
            )
            ->where('posts.slug', $slug)
            ->where('posts.status', 'published')
            ->first();

        if (!$post) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Blog post not found.'
            );
        }

        $postModel->update($post['id'], [
            'views' => ((int) $post['views']) + 1
        ]);

        $post['views'] = ((int) $post['views']) + 1;

        return view('pages/blog_detail', [
            'post' => $post,
        ]);
    }

    public function contact()
    {
        return view('pages/contact');
    }

    public function consultation()
    {
        return view('pages/consultation');
    }

    public function submitConsultation()
    {
        $rules = [
            'name' => 'required|min_length[2]|max_length[150]',
            'email' => 'required|valid_email|max_length[150]',
            'phone' => 'required|min_length[5]|max_length[50]',
            'practice_area' => 'required|max_length[150]',
            'preferred_date' => 'permit_empty|valid_date',
            'message' => 'required|min_length[10]|max_length[5000]',
        ];

        if (!$this->validate($rules)) {
            return redirect()
                ->to(base_url('consultation'))
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $consultationModel = new Consultation();

        $consultationModel->insert([
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'case_type' => $this->request->getPost('practice_area'),
            'preferred_date' => $this->request->getPost('preferred_date') ?: null,
            'preferred_time' => null,
            'message' => $this->request->getPost('message'),
            'status' => 'pending',
        ]);

        return redirect()
            ->to(base_url('consultation'))
            ->with(
                'success',
                'Your consultation request has been submitted successfully. We will contact you soon.'
            );
    }

    public function submitContact()
    {
        $rules = [
            'name' => 'required|min_length[2]|max_length[100]',
            'email' => 'required|valid_email|max_length[150]',
            'phone' => 'permit_empty|max_length[30]',
            'subject' => 'required|min_length[3]|max_length[200]',
            'message' => 'required|min_length[10]|max_length[5000]',
        ];

        if (!$this->validate($rules)) {
            return redirect()
                ->to(base_url('contact'))
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $contactModel = new Contact();

        $contactModel->insert([
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'subject' => $this->request->getPost('subject'),
            'message' => $this->request->getPost('message'),
            'status' => 'new',
        ]);

        return redirect()
            ->to(base_url('contact'))
            ->with(
                'success',
                'Thank you! Your message has been submitted successfully.'
            );
    }
}