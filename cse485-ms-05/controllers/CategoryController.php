<?php

declare(strict_types=1);

require_once __DIR__ . '/../models/CategoryModel.php';

class CategoryController
{
    private CategoryModel $model;

    public function __construct()
    {
        $this->model = new CategoryModel();
    }

    public function index(): void
    {
        $categories = $this->model->all();

        require __DIR__ . '/../views/category/index.php';
    }

    public function create(): void
    {
        $name = '';
        $description = '';
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name'] ?? '');
            $description = trim($_POST['description'] ?? '');

            if (strlen($name) < 2 || strlen($name) > 100) {
                $error = 'Ten danh muc phai tu 2 den 100 ky tu.';
            } else {
                try {
                    $this->model->create(
                        $name,
                        $description !== '' ? $description : null
                    );

                    $_SESSION['flash'] = 'Them danh muc thanh cong.';

                    header(
                        'Location: index.php?controller=category&action=index'
                    );
                    exit;
                } catch (PDOException $e) {
                    $error = 'Ten danh muc da ton tai.';
                }
            }
        }

        require __DIR__ . '/../views/category/create.php';
    }

    public function edit(): void
    {
        $id = (int) ($_GET['id'] ?? 0);
        $category = $this->model->find($id);

        if (!$category) {
            http_response_code(404);
            exit('Khong tim thay danh muc.');
        }

        $name = $category['name'];
        $description = (string) ($category['description'] ?? '');
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name'] ?? '');
            $description = trim($_POST['description'] ?? '');

            if (strlen($name) < 2 || strlen($name) > 100) {
                $error = 'Ten danh muc phai tu 2 den 100 ky tu.';
            } else {
                try {
                    $this->model->update(
                        $id,
                        $name,
                        $description !== '' ? $description : null
                    );

                    $_SESSION['flash'] = 'Cap nhat danh muc thanh cong.';

                    header(
                        'Location: index.php?controller=category&action=index'
                    );
                    exit;
                } catch (PDOException $e) {
                    $error = 'Ten danh muc da ton tai.';
                }
            }
        }

        require __DIR__ . '/../views/category/edit.php';
    }

    public function delete(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            exit('Method not allowed');
        }

        $id = (int) ($_POST['id'] ?? 0);

        if ($id > 0) {
            $this->model->delete($id);
            $_SESSION['flash'] = 'Xoa danh muc thanh cong.';
        }

        header(
            'Location: index.php?controller=category&action=index'
        );
        exit;
    }
}
