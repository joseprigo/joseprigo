<?php

require_once 'core/BaseEntity.php';

/**
 * Description of Noticia
 *
 * @author josep
 */
class Article extends BaseEntity{
    protected $id_article;
    protected $edit;
    protected $text_utf8;
    function __construct($id_article,$edit,$text_utf8) {
        $this->id_article = $id_article;
        $this->edit = $edit;
        $this->text_utf8 = $text_utf8;
        parent::__construct();
    }
    function setId_article($id_article) {
        $this->id_article = $id_article;
    }

    function setEdit($edit) {
        $this->edit = $edit;
    }

    function setText_utf8($text_utf8) {
        $this->text_utf8 = $text_utf8;
    }
    function getId_article() {
        return $this->id_article;
    }

    function getEdit() {
        return $this->edit;
    }

    function getText_utf8() {
        return $this->text_utf8;
    }



}
