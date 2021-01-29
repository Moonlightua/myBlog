<?php


namespace app\models;


class ArticlesPerPage
{


    public function getArticles(int $articlesPerPage, Blog $model): array
    {

        $page = $this->getPage();

        $offset = ($page - 1) * $articlesPerPage;

        $renderArticle = $model->articlePerPage('articles', $offset, $articlesPerPage);

        return $renderArticle;
    }

    public function totalPages(Blog $model, $articlesPerPage)
    {
        $count = $model->articlesCount('articles');
        $totalPages = ceil($count[0][0] / $articlesPerPage);

        return $totalPages;
    }

    public function getPage(): int
    {
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }

        return $page;
    }

}