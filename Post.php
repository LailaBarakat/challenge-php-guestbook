<?php

class Post{
    private string $title;
    private string $date;
    private string $content;
    private string $author_name;

    /**
     * Posts constructor.
     * @param string $title
     * @param string $date
     * @param string $content
     * @param string $author_name
     */
    public function __construct(string $title, string $date, string $content, string $author_name)
    {
        $this->title = $title;
        $this->date = $date;
        $this->content = $content;
        $this->author_name = $author_name;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @return string
     */
    public function getAuthorName(): string
    {
        return $this->author_name;
    }

}