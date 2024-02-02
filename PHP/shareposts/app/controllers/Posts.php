<?php

class Posts extends Controller
{
    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('/users/login');
        }

        $this->postModel = $this->model('Post');
        $this->userModel = $this->model('User');
    }

    public function index()
    {
        //Get Posts
        $posts = $this->postModel->getPosts();

        $data = ['posts' => $posts];

        $this->view('posts/index', $data);
    }

    public function search()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $searchData = isset($_GET['search']) ? trim($_GET['search']) : '';
            if (!empty($_GET['search'])) {
                $_SESSION['search_state'] = ['search' => $searchData, 'search_results' => $this->postModel->getPostsByTitle($searchData)];
                if (!is_bool($_SESSION['search_state']['search_results'])) {
                    // Load the search view with the data
                    $data = ['search' => $searchData, 'posts' => $_SESSION['search_state']['search_results']];
                    $this->view('/posts/search', $data);
                } else {
                    flash('post_message', 'No results for this search.(' . $searchData . ') Please try again');
                    redirect('/posts');
                }
            } else {
                flash('post_message', 'Please insert something to search for');
                redirect('/posts');
            }
        } else {
            // If no search was performed, clear the search state
            unset($_SESSION['search_state']);

            //No search criteria provided
            flash('info', 'No search criteria provided');

            // Redirect to the index page
            redirect(URLROOT);
            exit();
        }
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = ['title' => trim($_POST['title']), 'body' => trim($_POST['body']), 'user_id' => $_SESSION['user_id'], 'title_error' => '', 'body_error' => ''];

            //Validate the title
            if (empty($data['title'])) {
                $data['title_error'] = 'Please enter title';
            } elseif (empty($data['body'])) {
                $data['body_error'] = 'You can`t submit a post without body';
            }

            //Make sure no errors
            if (empty($data['title_error']) && empty($data['body_error'])) {
                if ($this->postModel->addPost($data)) {
                    flash('post_message', 'Post added');
                    redirect('/posts');
                } else {
                    die('Something went wrong!');
                }
            } else {
                //Load the view with errors
                $this->view('/posts/add', $data);
            }
        } else {
            $data = ['title' => '', 'body' => ''];
            $this->view('posts/add', $data);
        }
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = ['id' => $id, 'title' => trim($_POST['title']), 'body' => trim($_POST['body']), 'user_id' => $_SESSION['user_id'], 'title_error' => '', 'body_error' => ''];

            //Validate the title
            if (empty($data['title'])) {
                $data['title_error'] = 'Please enter title';
            } elseif (empty($data['body'])) {
                $data['body_error'] = 'You can`t submit a post without body';
            }

            //Make sure no errors
            if (empty($data['title_error']) && empty($data['body_error'])) {
                if ($this->postModel->updatePost($data)) {
                    flash('post_message', 'Post updated');
                    redirect('/posts');
                } else {
                    die('Something went wrong!');
                }
            } else {
                //Load the view with errors
                $this->view('/posts/edit', $data);
            }
        } else {
            //Get existing post from model
            $post = $this->postModel->getPostById($id);

            //Check for owner
            if ($post->user_id != $_SESSION['user_id']) {
                redirect('/posts');
            }

            $data = ['id' => $id, 'title' => $post->title, 'body' => $post->body];
            $this->view('posts/edit', $data);
        }
    }

    public function show($id)
    {
        $post = $this->postModel->getPostById($id);
        $user = $this->userModel->getUserById($post->user_id);

        $data = ['post' => $post, 'user' => $user];

        $this->view('/posts/show', $data);
    }

    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $post = $this->postModel->getPostById($id);

            //Check for owner
            if ($post->user_id != $_SESSION['user_id']) {
                redirect('/posts');
            }

            //Delete the post
            if ($this->postModel->deletePost($id)) {
                flash('post_message', 'Post removed');
                redirect('/posts');
            } else {
                die('Something went wrong!');
            }
        } else {
            redirect('/posts');
        }
    }
}
