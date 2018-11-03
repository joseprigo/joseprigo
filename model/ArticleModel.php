<?php
require_once 'core/BaseModel.php';
/**
 * Description of NoticiesModel
 *
 * @author josep
 */
class ArticleModel extends BaseModel{
     
    public function __construct(){
        parent::__construct("news", "Article");
    }
    
    /**
     * Gets one article given its id and a language
     * @return boolean
     */
    public function selectOne($a_params){
        $query = "SELECT news.id_article, news.creation, news.edit, news_lang.text FROM news
                left join news_lang USING(id_article)
                WHERE news_lang.id_lang = ?
                AND id_article = ?";
        $article = $this->select($query,$a_params);
        return $article;
    }
    
    public function selectMany($a_params){
//        $str_type = "i";
//        $lang_id = 94;
//        $a_params = array($str_type, $lang_id);
        $query="SELECT news.id_article, news.creation, news.edit, news_lang.text FROM news
                left join news_lang USING(id_article)
                WHERE news_lang.id_lang = ?";
        $noticies=$this->select($query, $a_params);
        return $noticies;
    }
    public function selectAll(){
        $str_type = "i";
        $lang_id = 94;
        $a_params = array($str_type, $lang_id);
        $query = "SELECT news.id_article, news.edit, news_lang.text_utf8 FROM `news`
        LEFT JOIN news_lang USING(id_article)
        WHERE id_lang = ?";
        $news=$this->select($query, $a_params);
        return $news;
        
    }
}
?>