<?php

/**
 * Class Post
 */
class Post
{
    /**
     * Title of post
     *
     * @var string
     */
    protected $title;

    protected $metaD;

    protected $metaK;

    protected $date;

    protected $shortDescription;

    protected $description;

    protected $author;

    protected $category;

    public function __construct()
    {
        $db = mysql_connect("localhost","root","root");
        mysql_select_db("pinielle_lesson",$db);
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setMetaD($metaD)
    {
        $this->metaD = $metaD;
    }

    public function setMetaK($metaK)
    {
        $this->metaK = $metaK;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function setShortDescription($shortDescription)
    {
        $this->shortDescription = $shortDescription;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function getAllCategories()
    {
        return mysql_query("SELECT title,id FROM categories");
    }

    public function setData($data)
    {
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                $this->{$key} = $value;
            }
        }
    }

    public function save()
    {
        $result = mysql_query ("
            INSERT INTO data (title, meta_d, meta_k, date, description,text,author,cat)
            VALUES (
               '$this->title',
               '$this->metaD',
               '$this->metaK',
               '$this->date',
               '$this->shortDescription',
               '$this->description',
               '$this->author',
               '$$this->category')"
        );

        return $result;
    }




}
