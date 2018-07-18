<?php

namespace common\components\parser;


class NewsOneParser implements ParserInterface
{
    /**
     * @var string
     */
    protected $imagePath = 'https://news-one.local/image/news/';

    /**
     * @var int
     */
    protected $sourceId = 1;


    const NEWS_COUNT = 1;
    const NEWS_JSON_STRING = 'https://news-one.local/api/news/getLastNews';
    const CATEGORIES_NEWS_JSON = 'https://news-one.local/api/news/getCategry/';

    /**
     * start parser
     * @return array
     */
    public function parser()
    {
        return $this->getNews();
    }

    /**
     * get parsed news array
     * @return array
     */
    protected function getNews()
    {
        $newsJson = file_get_contents(self::NEWS_JSON_STRING.self::NEWS_COUNT);
        $news = json_decode($newsJson, true);
        return $this->prepareNewsArray($news);
    }

    /**
     * preparing news array
     * @param $news array
     * @return array
     */
    protected function prepareNewsArray($news)
    {
        $categories = $this->getCategories();
        $preparedNewsArray = [];
        if ($news) {
            foreach ($news as $key => $post) {
                $item = [];
                $item['category_name'] = $categories[$post['id_tategory']];
                $item['title'] = $post['title'];
                $item['prev_text'] = $post['descriptions'];
                $item['body'] = $post['text'];
                $item['image'] = $post['image_main'];

                $preparedNewsArray[$key] = $item;
            }
        }


        return $preparedNewsArray;
    }

    /**
     * get parsed news categories
     * @return array
     */
    protected function getCategories()
    {
        $json = file_get_contents(self::CATEGORIES_NEWS_JSON);
        $categories = json_decode($json, true);
        return $this->prepareCategoriesArray($categories);
    }

    /**
     * preparing categories array
     * @param $categories array
     * @return array
     */
    protected function prepareCategoriesArray($categories)
    {
        $preparedArray = [];
        foreach($categories as $category) {
            $preparedArray[$category['id']] = $category['title'];
        }
        return $preparedArray;
    }

    /**
     * getter imagePath
     * @return string
     */
    public function getImagePath()
    {
        return $this->imagePath;
    }

    /**
     * getter sourceId
     * @return int
     */
    public function getSourceId()
    {
        return $this->sourceId;
    }
}